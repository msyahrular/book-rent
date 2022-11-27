<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rentlogs = RentLog::with(['user', 'book'])->get();
        return view('rentlog', ['rent_logs' => $rentlogs]);
    }
}
