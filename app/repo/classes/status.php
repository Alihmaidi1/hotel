<?php

namespace App\repo\classes;
use App\repo\interfaces\status as statusInterface;
use App\Models\room_status as ModelsStatus;
class status implements statusInterface{


    public function getAllStatus()
    {
        return ModelsStatus::all();
    }

    public function store($request)
    {
        ModelsStatus::create([
            "name"=>$request->name,
            "code"=>$request->code,
            "information"=>$request->information
        ]);

    }

    public function delete($id)
    {
        $status=ModelsStatus::find($id);
        $status->delete();
    }


    public function update($request)
    {

        $status=ModelsStatus::find($request->id);
        $status->name=$request->name;
        $status->code=$request->code;
        $status->information=$request->information;
        $status->save();

    }


}
