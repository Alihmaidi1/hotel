<?php

namespace App\Http\Controllers\charts;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\repo\interfaces\chart as chartInterface;
class chart extends Controller
{

    public $chart;
    public function __construct(chartInterface $chart)
    {
        $this->chart=$chart;
    }

    public function getchartperweek(){

        $arr=$this->chart->getchartperweek();
        return response()->json($arr);

    }



}



