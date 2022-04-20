<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use App\Models\image;
use Illuminate\Http\Request;
use App\Models\room as modelsRoom;
use App\Models\room_status;
use App\Models\types;
use Illuminate\Support\Facades\Storage;
use App\repo\interfaces\room as roomInterface;
use App\repo\interfaces\type as typeInterface;
use App\repo\interfaces\status as statusInterface;
use App\repo\interfaces\image as imageInterface;
class room extends Controller
{

    public $room;
    public $image;
    public $type;
    public $status;

    public function __construct(roomInterface $room,typeInterface $type,statusInterface $status,imageInterface $image)
    {

        $this->room=$room;
        $this->type=$type;
        $this->status=$status;
        $this->image=$image;

    }

    public function index(){

        $rooms=$this->room->getAllRoom();
        return view("room.index",compact("rooms"));

    }

    public function create(){

        $types=$this->type->getAllType();
        $roomstatuses=$this->status->getAllStatus();
        return view("room.create",compact("types","roomstatuses"));
    }


    public function store(Request $request){

        $name=$this->image->imageStore($request,"img","room");
        $room=$this->room->store($request);
        $this->image->store($name,$room->id);
        return redirect()->route("room.index")->with("success","the Room Was Added Successfully");

    }


    public function edit($id){

        $room=$this->room->getAllRoom();
        $types=$this->type->getAllType();
        $roomstatuses=$this->status->getAllStatus();
        return view("room.edit",compact("room","types","roomstatuses"));

    }


    public function update(Request $request){

        if($request->file("img")){
            $images=image::where("room_id",$request->id)->get();
            foreach($images as $image){
                $this->image->deleteImage("upload/room/",$image->url);
                $image->delete();
            }
            $name=$this->image->imageStore($request,"img","room");
            $this->image->store($name,$request->id);
        }
        $this->room->store($request);
        return redirect()->route("room.index")->with("success","the Room Was Updated Successfully");

    }



    public function destroy($id){

        $this->room->delete($id);
        return redirect()->back()->with("success","The Room Was Deleted Successfully");
    }



}
