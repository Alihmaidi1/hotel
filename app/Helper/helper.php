<?php

function differce_date($from,$to){

    $datetime1 = new DateTime($from);
    $datetime2 = new DateTime($to);
    $interval = $datetime1->diff($datetime2);
    $days = $interval->format('%a');
    return $days;

}

function sum_payment($payments){

    $sum=0;
    foreach($payments as $payment){

        $sum+=$payment->price;

    }

    return $sum;


}
