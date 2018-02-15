<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppWorkload;

class WorkloadController extends Controller
{
    public function index()
    {
        $workloads = AppWorkload::where('updated_at', '>', date('Y-m-d', strtotime('-1 month')))->orderBy('created_at', 'desc')->get();
        return view('app.workload.index', compact('workloads'));
    }

    public function store()
    {
        $this->validate(request(), [
            'member_id' => 'required|exists:youth_users,sdut_id',
            'description' => 'required',
            'workload' => 'numeric',
            'handler_id' => 'required|exists:youth_users,sdut_id'
        ]);

        $member_id = request('member_id');
        $description = request('description');
        $workload = request('workload');
        $handler_id = request('handler_id');

        AppWorkload::create(compact('member_id', 'description', 'workload', 'handler_id'));

        return back();
    }

    public function destory(AppWorkload $workload)
    {
        $this->validate(request(), ['handler_id' => 'required|exists:youth_users,sdut_id']);
        $workload->delete();
        return back();
    }
}
