<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppSigninRec;

class HomeController extends Controller
{
    public function index()
    {
        $records = AppSigninRec::whereDate('created_at', date('Y-m-d'))
            ->where('status', 0)
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        return view('admin.home.index', compact('records'));
    }
}
