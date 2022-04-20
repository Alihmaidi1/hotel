<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\customer as ModelsCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\repo\interfaces\customer as customerInterface;
use App\repo\interfaces\image as imageInterface;
class customer extends Controller
{

    public $customer;

    public $image;
    public function __construct(customerInterface $customer,imageInterface $image)
    {
        $this->customer=$customer;
        $this->image=$image;
    }

    public function index(){

        $customers=$this->customer->getAllCustomer();
        return view("customer.index",compact("customers"));
    }

    public function create(){

        return view("customer.create");
    }


    public function store(Request $request){

        $name=$this->image->imageStore($request,"avatar","customer");
        $customer=$this->customer->store($request,$name);
        return redirect()->route("customer.index")->with("success","the Customer Was Added Successfully");

    }



    public function edit($id){

        $customer=ModelsCustomer::find($id);
        return view("customer.edit",compact("customer"));

    }



    public function update(Request $request){

        $this->customer->update($request);
        return redirect()->route("customer.index")->with("success","The Customer Data Was Updated Successfully");
    
    }


    public function delete($id){

        $this->customer->delete($id);
        return redirect()->back()->with("success","the Customer Was Deleted Successfully");
    }



    public function show($id){
        $customer=ModelsCustomer::find($id);
        return view("customer.show",compact("customer"));
    }



}
