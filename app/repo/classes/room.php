<?php

namespace App\repo\classes;

use App\Models\room as ModelsRoom;
use App\repo\interfaces\room as roomInterface;
class room implements roomInterface{


    public function getAllRoom()
    {
        return ModelsRoom::all();
    }

    public function getCountCapacity($capacity)
    {

        return ModelsRoom::where("capacity",">=",$capacity)->count();

    }

    public function store($request)
    {

        $room=modelsRoom::create([
            "type_id"=>$request->type_id,
            "number"=>$request->number,
            "capacity"=>$request->capacity,
            "price"=>$request->price,
            "room_status_id"=>$request->room_status_id,
            "view"=>$request->view
        ]);

        return $room;

    }


    public function update($request)
    {

        $room=modelsRoom::find($request->id);
        $room->type_id=$request->type_id;
        $room->number=$request->number;
        $room->capacity=$request->capacity;
        $room->price=$request->price;
        $room->room_status_id=$request->room_status_id;
        $room->view=$request->view;
        $room->save();
        return $room;

    }


    public function delete($id)
    {

        $room=modelsRoom::find($id);
        $room->delete();


    }











}
