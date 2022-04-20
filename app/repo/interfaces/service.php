<?php

namespace App\repo\interfaces;

interface service{

    public function getAllService();
    public function store($request);
    public function update($request);
    public function delete($id);


}
