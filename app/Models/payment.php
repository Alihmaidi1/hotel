<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    public $fillable=["transaction_id","price"];

    public function transaction(){


        return $this->belongsTo("App\Models\\transaction","transaction_id");

    }
}
