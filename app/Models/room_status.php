<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_status extends Model
{
    use HasFactory;

    public $fillable=["name","code","information"];


    public function rooms(){


        return $this->hasMany("App\Models\\room","room_status_id");

    }


}
