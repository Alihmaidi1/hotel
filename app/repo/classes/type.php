<?php

namespace App\repo\classes;
use App\Models\types as ModelsType;
use App\repo\interfaces\type as typeInterface;
class type implements typeInterface{


    public function getAllType()
    {
        return ModelsType::all();
    }

    public function store($request)
    {

        modelsType::create([

            "name"=>$request->name,
            "information"=>$request->information
        ]);

    }


    public function delete($id)
    {
        $type=modelsType::find($id);
        $type->delete();
    }

    public function update($request)
    {
        $type=modelsType::find($request->id);
        $type->name=$request->name;
        $type->information=$request->information;
        $type->save();
    }



}
