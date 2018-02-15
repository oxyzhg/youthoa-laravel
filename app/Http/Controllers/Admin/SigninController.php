<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AppSigninRec;
use App\Models\YouthUser;

class SigninController extends Controller
{
    public function index()
    {
        $users = YouthUser::all();
        $records = AppSigninRec::whereDate('created_at', date('Y-m-d'))->orderBy('updated_at', 'desc')->get();
        return view('app.signin.index', compact('users', 'records'));
    }
    
    public function store()
    {
        $this->validate(request(), [
            'sdut_id' => 'required|exists:youth_users'
        ]);
        $sdut_id = request('sdut_id');
        $record = AppSigninRec::whereDate('created_at', date('Y-m-d'))->where('sdut_id', $sdut_id)->orderBy('updated_at', 'desc')->first();

        if (!$record || $record->status != 0) {
            // 没有数据则新建
            AppSigninRec::create(['sdut_id' => $sdut_id]);
        } elseif ($record->created_at == $record->updated_at) {
            /**
             * @params $timer 值班成功需满足指定时间
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
            preg_match_all('/\d:\d/', $record->dutys->duty_at, $dutys);
            // 判断是否今天值班
            foreach ($dutys[0] as $duty) {
                if (substr($duty, 0, 1) == date('w')) {
                    $is_today = true;
                    $duty_interval = substr($duty, 2, 1);
                    break;
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
        $cellData = [
            [
                'sdut_id' => '15110302217',
                'name' => '张强',
                'department' => '程序部'
            ],
            [
                'sdut_id' => '15110302217',
                'name' => '张强',
                'department' => '程序部'
            ]
        ];
        Excel::create(iconv('UTF-8', 'GBK', 'score'),function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->fromArray($cellData);
            });
        })->store('xls')->export('xls');
    }

    public function import()
    {
        $filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', 'test').'.xlsx';
        Excel::load($filePath, function ($reader) {
            $data = $reader->all();// $data 即为导入的数据，可以输出一下看看
            dd($data);
        });
    }
}
