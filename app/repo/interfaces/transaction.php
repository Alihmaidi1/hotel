<?php

namespace App\repo\interfaces;

interface transaction{

    public function getAllTransaction();
    public function getTransactionsExpired();
    public function store($request);


}
