<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppUsage;

class UsageController extends Controller
{
    public function index()
    {
        $usages = AppUsage::where('updated_at', '>', date('Y-m-d', strtotime('-1 week')))->orderBy('updated_at', 'desc')->get();
        return view('app.usage.index', compact('usages'));
    }

    public function store()
    {
        $this->validate(request(), [
            'machine' => 'required',
            'activity' => 'required|min:2',
            'datetime' => 'required|date',
            'borrower_id' => 'required|exists:youth_users,sdut_id',
            'memo_id' => 'required|exists:youth_users,sdut_id|different:borrower_id'
        ]);

        $machine = request('machine');
        $activity = request('activity');
        $datetime = request('datetime');
        $borrower_id = request('borrower_id');
        $memo_id = request('memo_id');

        AppUsage::create(compact('machine', 'activity', 'datetime', 'borrower_id', 'memo_id'));

        return back();
    }

    public function update(AppUsage $usage)
    {
        $this->validate(request(), ['rememo_id' => 'required|exists:youth_users,sdut_id']);
        if (request('rememo_id') == $usage->borrower_id) {
            return back()->with('status', '备忘人学号不能是'.$usage->borrower_id);
        } elseif($usage->rememo_id) {
            return back()->with('status', '设备已归还，无需再操作！');
        } else {
            $usage->rememo_id = request('rememo_id');
            $usage->status = !$usage->status;
            $usage->save();
            return back();
        }
    }

    public function destory(AppUsage $usage)
    {
        $this->validate(request(), ['rememo_id' => 'required|exists:youth_users,sdut_id']);
        if (request('rememo_id') == $usage->borrower_id) {
            return back()->with('status', '备忘人学号不能是'.$usage->borrower_id);
        } elseif($usage->borrower_id) {
            return back()->with('status', '设备已归还，无需再操作！');
        } else {
            $usage->delete();
            return back();
        }
    }
}
