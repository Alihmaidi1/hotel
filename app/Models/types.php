<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    use HasFactory;

    public $fillable=["name","information"];


    public function rooms(){


        return $this->hasMany("App\Models\\room","type_id");


    }
}
