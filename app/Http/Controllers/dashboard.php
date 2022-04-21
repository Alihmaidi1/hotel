<?php

namespace App\Http\Controllers;

use App\Models\notification;
use App\Models\transaction;
use Illuminate\Http\Request;

class dashboard extends Controller
{

    public function index(){

        $transactions=transaction::all();
        $notification_count=notification::count();
        $notifications=notification::where("status","unread")->get();
        return view("dashboard.index",compact("transactions","notification_count","notifications"));

    }


}
