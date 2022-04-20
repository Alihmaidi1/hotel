<?php   

namespace  App\repo\classes;

use App\Models\transaction;
use App\repo\interfaces\chart as chartInterface;
use Carbon\Carbon;

class chart implements chartInterface{


    public function getchartperweek(){


        for($i=0;$i<=6;$i++){

            $arr[]=Carbon::now()->subDays($i)->format("Y-m-d");
            
        }


        foreach($arr as $element){

           $arr2[]=transaction::where("check_in",$element)->count(); 
            


        }

        return $arr2;



    }





}