<?php

namespace App\repo\classes;
use App\repo\interfaces\service as serviceInterface;
use App\Models\service as ModelsService;
class service  implements serviceInterface{


    public function getAllService()
    {

        return ModelsService::all();

    }


    public function store($request)
    {

        ModelsService::create([
            "name"=>$request->name,
            "detail"=>$request->detail
        ]);

    }


    public function delete($id)
    {
        $service=ModelsService::find($id);
        $service->delete();
    }


    public function update($request)
    {
        $service=ModelsService::find($request->id);
        $service->name=$request->name;
        $service->detail=$request->detail;
        $service->save();
    }



}
