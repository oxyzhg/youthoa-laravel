<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthUser;
use App\Models\AppSchedule;
use App\Models\AppWorkload;
use App\Models\AppSigninRec;

class HomeController extends Controller
{
    /**
     * @params $youth_users_count 数据库表网站成员数量
     * @params $records_today_count 当天签到数量
     * @params $schedule_count 待办事项数量
     * @params $workload_count 当月工作量总计
     * @params $records 当日签到记录，只列出5条
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $youth_users_count = YouthUser::count();
        $records_today_count = AppSigninRec::whereDate('created_at', date('Y-m-d'))->count();
        $schedule_count = AppSchedule::whereIn('status', [0])->count();
        $workload_count = AppWorkload::where('updated_at', '>', strtotime("-1 month"))->sum('workload');
        $records = AppSigninRec::whereDate('created_at', date('Y-m-d'))->where('status', 0)->orderBy('updated_at', 'desc')->limit(5)->get();
        $schedules = AppSchedule::whereIn('status', [0])->limit(6)->get();

        return view('admin.home.index', compact('youth_users_count', 'records_today_count', 'schedule_count','workload_count',  'records', 'schedules'));
    }
}
