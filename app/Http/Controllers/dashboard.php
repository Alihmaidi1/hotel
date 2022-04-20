<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class dashboard extends Controller
{

    public function index(){

        $transactions=transaction::all();
        return view("dashboard.index",compact("transactions"));

    }


}
