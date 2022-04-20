<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    public $fillable=["email","password","avatar","name","address","gender","job","birthDate"];

    public function transaction(){


        return $this->hasMany("App\Models\\transaction","customer_id");

    }

}
