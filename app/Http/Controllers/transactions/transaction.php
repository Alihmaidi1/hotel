<?php

namespace App\Http\Controllers\transactions;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\payment;
use App\Models\room;
use App\Models\transaction as ModelsTransaction;
use DateTime;
use Illuminate\Http\Request;
use App\repo\interfaces\transaction as transactionInterface;
use App\repo\interfaces\customer as customerInterface;
use App\repo\interfaces\room as roomInterface;
use App\repo\interfaces\payment as paymentInterface;
class transaction extends Controller
{

    public $transaction;

    public $customer;
    public $room;
    public $payment;
    public function __construct(transactionInterface $transaction,customerInterface $customer,roomInterface $room,paymentInterface $payment)
    {
        $this->transaction=$transaction;
        $this->customer=$customer;
        $this->room=$room;
        $this->payment=$payment;
    }
    public function index(){
        $transactions=$this->transaction->getAllTransaction();
        $transactionsExpired=$this->transaction->getTransactionsExpired();
        return view("transaction.index",compact("transactions","transactionsExpired"));
    }

    public function create(){
        $customers=$this->customer->getAllCustomer();
        return view("transaction.reservation.pickFromCustomer",compact("customers"));
    }
    public function viewCountPerson($id){
        $customer=customer::find($id);
        return view("transaction.reservation.viewCountPerson",compact("customer"));
    }
    public function chooseRoom(Request $request){
        $roomsCount=$this->room->getCountCapacity($request->count_person);
        $customer=customer::find($request->customer);
        $rooms=$this->room->getAllRoom();
        return view("transaction.reservation.chooseRoom",compact("roomsCount","customer","rooms"));
    }

    public function confirm($customer,$room,$from,$to){

        $room=room::find($room);
        $customer=customer::find($customer);
        return view("transaction.reservation.confirmation",compact("room","customer","from","to"));

    }



    public function store(Request $request){
        $transaction=$this->transaction->store($request);
        $this->payment->store($transaction->id,$request->downPayment);
        return redirect()->route("transaction.index")->with("success","The Process was Created Successfully");
    }
    public function storePayment($id){
        $transaction=ModelsTransaction::find($id);
        return view("transaction.payment.create",compact("transaction"));
    }

    public function storePayment1(Request $request){
        $this->payment->store($request->transation_id,$request->payment);
        return redirect()->route("transaction.index")->with("success","The Processing Was Work Successfully");
    }

}
