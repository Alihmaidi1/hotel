<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Models\service as ModelsService;
use Illuminate\Http\Request;
use App\repo\interfaces\service as serviceInterface;

class service extends Controller
{

    public $service;

    public function __construct(serviceInterface $service)
    {
        $this->service=$service;
    }
    public function index(){
        $services=$this->service->getAllService();
        return view("services.index",compact("services"));
    }

    public function create(){

        return view("services.create");

    }

    public function store(Request $request){

        $this->service->store($request);
        return redirect()->route("service.index")->with("success","The Room Service Was Added Successfully");

    }

    public function edit($id){

        $service=ModelsService::find($id);
        return view("services.edit",compact("service"));

    }



    public function destroy($id){

        $this->service->delete($id);
        return redirect()->back()->with("success","The Service Was Deleted Successfully");

    }


    public function update(Request $request){

        $this->service->update($request);
        return redirect()->route("service.index")->with("success","The Service Was Updated Successfully");
    }

}
