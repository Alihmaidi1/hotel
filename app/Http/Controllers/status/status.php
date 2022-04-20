<?php

namespace App\Http\Controllers\status;

use App\Http\Controllers\Controller;
use App\Models\room_status;
use Illuminate\Http\Request;
use App\repo\interfaces\status as statusInterface;
class status extends Controller
{

    public $status;
    public function __construct(statusInterface $status)
    {
        $this->status=$status;
    }

    public function index(){
        $roomstatuses=$this->status->getAllStatus();
        return view("roomstatus.index",compact("roomstatuses"));
    }

    public function create(){

        return view("roomstatus.create");
    }

    public function store(Request $request){
        $this->status->store($request);
        return redirect()->route("status.index")->with("success","the Room Status Was Created Successfully");
    }

    public function edit($id){
        $roomstatus=room_status::find($id);
        return view("roomstatus.edit",compact("roomstatus"));
    }

    public function destroy($id){
        $this->status->delete($id);
        return redirect()->back()->with("success","the Room Status Was Deleted Successfully ");
    }

    public function update(Request $request){
        $this->status->update($request);
        return redirect()->route("status.index")->with("success","The Room Status Was Updated Successfully");
    }

}
