<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppSigninDuty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AppSigninRec;
use App\Models\YouthUser;
use App\Models\Role;

class SigninController extends Controller
{
    /**
     * @params $records 当日所有签到记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $records = AppSigninRec::whereDate('created_at', date('Y-m-d'))->orderBy('updated_at', 'desc')->get();
        return view('app.signin.index', compact('records'));
    }

    /**
     * @request String $sdut_id 签到学号
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'sdut_id' => 'required|exists:youth_users'
        ]);
        $sdut_id = request('sdut_id');
        $user = YouthUser::where('sdut_id', $sdut_id)->first();
        $record = AppSigninRec::whereDate('created_at', date('Y-m-d'))->where('sdut_id', $sdut_id)->orderBy('updated_at', 'desc')->first();
        // 若退站，直接标记签退
        if ($user->status == 2) {
            $record->status = 4;
            $record->duration = 0;
            $record->save();
            return back();
        }

        if (!$record || $record->status != 0) {
            AppSigninRec::create(['sdut_id' => $sdut_id]);
        } elseif ($record->created_at == $record->updated_at) {
            /**
             * @params $timer 值班成功需满足的时间
             * @params $duration 值班时间
             * @params $dutys 值班任务时间数组
             * @params $is_today 当天是否当值
             * @params $duty_interval 当值时间段
             * @params $start_at 规定值班开始时间
             * @params $end_at 规定值班结束时间
             * @params $status 值班签退状态
             */
            $timer = 70;
            $is_today = false;
            $duration = ceil((time() - strtotime($record->created_at)) / 60);
            // 判断签退同学是否有值班任务
            if ($record->dutys) {
                preg_match_all('/\d:\d/', $record->dutys->duty_at, $dutys);
                // 判断是否今天值班
                foreach ($dutys[0] as $duty) {
                    if (substr($duty, 0, 1) == date('w')) {
                        $is_today = true;
                        $duty_interval = substr($duty, 2, 1);
                        break;
                    }
                }
            }

            if ($is_today) {
                // 当值，判断值班时间段
                switch ($duty_interval) {
                    case 1:$start_at=strtotime('08:00');$end_at=strtotime('09:50');break;
                    case 2:$start_at=strtotime('10:10');$end_at=strtotime('12:00');break;
                    case 3:$start_at=strtotime('14:00');$end_at=strtotime('15:50');break;
                    case 4:$start_at=strtotime('16:00');$end_at=strtotime('17:50');break;
                    case 5:$start_at=strtotime('19:00');$end_at=strtotime('21:00');
                }
                if (strtotime($record->created_at) < $start_at && time() < $end_at && time() > $start_at) {
                    // 签到时间比规定时间早，签退时间比规定时间早
                    $duration = ceil((time() - $start_at) / 60);
                } elseif (strtotime($record->created_at) < $start_at && time() >= $end_at) {
                    // 签到时间比规定时间早，签退时间比规定时间晚
                    $duration = ceil(($end_at - $start_at) / 60);
                } elseif (strtotime($record->created_at) >= $start_at && time() >= $end_at && strtotime($record->created_at) < $end_at) {
                    // 签到时间比规定时间晚，签退时间比规定时间晚
                    $duration = ceil(($end_at - strtotime($record->created_at)) / 60);
                } elseif (strtotime($record->created_at) >= $start_at && time() < $end_at) {
                    // 签到时间比规定时间晚，签退时间比规定时间早
                    $duration = ceil((time() - strtotime($record->created_at)) / 60);
                }
                if (strtotime($record->created_at) >= $end_at || time() < $start_at) {
                    $status = $duration >= $timer ? 2 : 3;
                } else {
                    $status = $duration >= $timer ? 1 : 3;
                }
            } else {
                // 0未签退 1正常值班 2多余值班 3早退 4无效值班
                $status = $duration >= $timer ? 2 : 4;
            }
            $record->status = $status;
            $record->duration = $duration;
            $record->save();
        }
        return back();
    }

    public function export()
    {
        $signinRecords = AppSigninRec::where('updated_at', '>', strtotime("-1 month"))->whereIn('status', [0,1,2,3])->get();

        foreach ($signinRecords as $rec) {
            if ($rec->dutys) {
                $n = 0;
                $btime = strtotime('-1 month');
                $etime = strtotime('now');
                preg_match_all('/(\d):\d/', $rec->user->dutys->duty_at, $dutys);
                for ($i=$btime; $i<$etime; $i+=86400) {
                    if (date('w', $i) == $dutys[1][0] || date('w', $i) == $dutys[1][1]) {
                        $n++;
                    }
                }
            } else {
                continue;
            }
            $all_data[$rec->sdut_id]['name'] = $rec->user->name;
            $all_data[$rec->sdut_id]['sdut_id'] = $rec->user->sdut_id;
            $all_data[$rec->sdut_id]['department'] = $rec->user->department;
            $all_data[$rec->sdut_id]['origin'] = $n; //本应签到次数，未除去节假日
            $all_data[$rec->sdut_id]['unsignout'] = isset($all_data[$rec->sdut_id]['unsignout']) ? $all_data[$rec->sdut_id]['unsignout'] : 0; //未签退
            $all_data[$rec->sdut_id]['normal'] = isset($all_data[$rec->sdut_id]['normal']) ? $all_data[$rec->sdut_id]['normal'] : 0; //正常签退
            $all_data[$rec->sdut_id]['normal_at'] = isset($all_data[$rec->sdut_id]['normal_at']) ? $all_data[$rec->sdut_id]['normal_at'] : 0; //正常签到时长
            $all_data[$rec->sdut_id]['surplus'] = isset($all_data[$rec->sdut_id]['surplus']) ? $all_data[$rec->sdut_id]['surplus'] : 0; //额外签到
            $all_data[$rec->sdut_id]['surplus_at'] = isset($all_data[$rec->sdut_id]['surplus_at']) ? $all_data[$rec->sdut_id]['surplus_at'] : 0; //额外签到时长
            $all_data[$rec->sdut_id]['early'] = isset($all_data[$rec->sdut_id]['early']) ? $all_data[$rec->sdut_id]['early'] : 0; //早退

            switch ($rec->status) {
                case 0:
                    $all_data[$rec->sdut_id]['unsignout'] += 1;
                    break;
                case 1:
                    $all_data[$rec->sdut_id]['normal'] += 1;
                    $all_data[$rec->sdut_id]['normal_at'] += intval($rec->duration);
                    break;
                case 2:
                    $all_data[$rec->sdut_id]['surplus'] += 1;
                    $all_data[$rec->sdut_id]['surplus_at'] += intval($rec->duration);
                    break;
                case 3:
                    $all_data[$rec->sdut_id]['early'] += 1;
                    break;
            }
        }

        Excel::create(iconv('UTF-8', 'GBK', 'signin_records'),function($excel) use ($all_data){
            $excel->sheet('signin_records', function($sheet) use ($all_data){
                $sheet->fromArray($all_data);
            });
        })->store('xls')->export('xls');
    }

    public function import()
    {
        $DutyFilePath = 'storage/excel/'.iconv('UTF-8', 'GBK', 'app_signin_dutys').'.xls';

        Excel::load($DutyFilePath, function ($reader) {
            $data = $reader->all();// $data 即为表格导入的数据
            DB::statement('truncate table app_signin_dutys');

            $data->each(function ($item, $key) {
                $item = $item->toArray();
                $item['sdut_id'] = strval($item['sdut_id']);
                $item['duty_at'] = strval($item['duty_at']);
                $user = AppSigninDuty::create($item);
            });
        });
    }
}
