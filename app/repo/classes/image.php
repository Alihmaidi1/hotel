<?php

namespace App\repo\classes;

use App\Models\image as ModelsImage;
use App\repo\interfaces\image as imageInterface;
use Illuminate\Support\Facades\Storage;

class image implements imageInterface{


    public function imageStore($request,$type,$disk)
    {
        $extension=$request->file($type)->getClientOriginalExtension();
        $name=rand().".".$extension;
        Storage::disk($disk)->putFileAs("",$request->file("avatar"),$name);
        return $name;
    }

    public function deleteImage($path,$url)
    {
        $name=public_path($path.$url);
        unlink($name);

    }


    public function store($url, $room)
    {
        ModelsImage::create([
            "room_id"=>$room->id,
            "url"=>$url
        ]);

    }



}
