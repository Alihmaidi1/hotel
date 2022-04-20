<?php

namespace App\repo\interfaces;

interface user{


    public function getAllUser();
    public function store($request);
    public function update($request);
    public function delete($id);




}
