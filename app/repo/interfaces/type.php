<?php

namespace App\repo\interfaces;

interface type{


    public function getAllType();
    public function store($request);
    public function delete($id);
    public function update($request);

}
