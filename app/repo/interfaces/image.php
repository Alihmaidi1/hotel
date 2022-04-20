<?php

namespace App\repo\interfaces;

interface image{


    public function imageStore($request,$type,$disk);
    public function deleteImage($path,$url);
    public function store($url,$room);

}
