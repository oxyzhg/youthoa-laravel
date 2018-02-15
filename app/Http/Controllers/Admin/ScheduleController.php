<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthUser;
use App\Models\AppSchedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = AppSchedule::where('datetime', '>', date('Y-m-d'))->orderBy('datetime', 'asc')->get();
        return view('app.schedule.index', compact('schedules'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'location' => 'required|min:2',
            'datetime' => 'required|date',
            'sdut_id' => 'required||exists:youth_users,sdut_id'
        ]);

        $name = request('name');
        $location = request('location');
        $datetime = request('datetime');
        $sdut_id = request('sdut_id');

        AppSchedule::create(compact('name', 'location', 'datetime', 'sdut_id'));

        return back();
    }

    public function update(AppSchedule $schedule)
    {
        $schedule->status = !$schedule->status;
        $schedule->save();
        return back();
    }

    public function destroy(AppSchedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
