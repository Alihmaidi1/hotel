<?php

namespace App\Http\Controllers\types;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\types as modelsType;
use App\repo\interfaces\type as typeInterface;
class type extends Controller
{

    public $type;
    public function __construct(typeInterface $type)
    {
        $this->type=$type;
    }

    public function index(){
        $types=$this->type->getAllType();
        return view("type.index",compact("types"));
    }

    public function create(){
        return view("type.create");
    }

    public function store(Request $request){
        $this->type->store($request);
        return redirect()->route("type.index")->with("success","The Room Type Was Added Successfully");
    }

    public function edit($id){
        $type=modelsType::find($id);
        return view("type.edit",compact("type"));
    }

    public function delete($id){
        $this->type->delete($id);
        return redirect()->back()->with("success","the Room Type Was Deleted successfully");
    }

    public function update(Request $request){
        $this->type->update($request);
        return redirect()->route("type.index")->with("success","The Room Type Was Updated Successfully");
    }



}
