<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    public $fillable=["room_id","url"];


    public function room(){


        return $this->belongsTo("App\Models\\room","room_id");


    }

}
