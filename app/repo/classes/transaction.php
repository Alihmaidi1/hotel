<?php

namespace App\repo\classes;

use App\Models\transaction as ModelsTransaction;
use App\repo\interfaces\transaction as transactionInterface;
class transaction implements transactionInterface{


    public function getAllTransaction()
    {
        return ModelsTransaction::all();
    }
    public function getTransactionsExpired()
    {
        return ModelsTransaction::where("check_out","<",date("Y-m-d"))->get();
    }
    public function store($request)
    {
        $transaction=ModelsTransaction::create([
            "customer_id"=>$request->customer_id,
            "room_id"=>$request->room_id,
            "check_in"=>$request->check_in,
            "check_out"=>$request->check_out,
            "status"=>"processing",
            "total"=>$request->total_price
        ]);

        return $transaction;

    }

}
