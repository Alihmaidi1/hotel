<?php

namespace App\repo\interfaces;

interface room{


    public function getAllRoom();

    public function getCountCapacity($capacity);
    public function store($request);
    public function update($request);
    public function delete($id);


}
