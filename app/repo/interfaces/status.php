<?php

namespace App\repo\interfaces;

interface status{


    public function getAllStatus();
    public function store($request);
    public function update($request);
    public function delete($id);


}
