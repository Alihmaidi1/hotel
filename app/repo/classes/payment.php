<?php

namespace App\repo\classes;

use App\Models\payment as ModelsPayment;
use App\repo\interfaces\payment as paymentInterface;
class payment implements paymentInterface{


    public function store($transaction_id, $price)
    {
        ModelsPayment::create([
            "transaction_id"=>$transaction_id,
            "price"=>$price
        ]);

    }


}
