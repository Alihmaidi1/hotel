<?php

namespace App\repo\classes;

use App\Models\payment as ModelsPayment;
use App\repo\interfaces\payment as paymentInterface;
use App\Events\payment as paymentEvent;
use App\Models\notification;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;

class payment implements paymentInterface{


    public function store($transaction_id, $price)
    {
        ModelsPayment::create([
            "transaction_id"=>$transaction_id,
            "price"=>$price
        ]);
        $transaction=transaction::find($transaction_id);
        $message="Room ".$transaction->room->number." reservated by".$transaction->customer->name.".Payment Rp.".$price;
        $notification=notification::create([
            "status"=>"unread",
            "message"=>$message
        ]);
        new paymentEvent($message,Auth::user()->id,$notification->created_at);
    }


}
