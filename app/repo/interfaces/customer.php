<?php 

namespace App\repo\interfaces;

interface customer{

    public function getAllCustomer();

    public function store($request,$name);

    public function update($request);

    public function delete($id);

}