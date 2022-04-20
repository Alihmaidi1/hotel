<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    public $fillable=["type_id","number","capacity","price","room_status_id","view"];



    public function type(){


        return $this->belongsTo("App\Models\\types","type_id");
    }


    public function roomStatus(){


        return $this->belongsTo("App\Models\\room_status","room_status_id");

    }


    public function images(){


        return $this->hasMany("App\Models\image","room_id");

    }


    public function transaction(){

        return $this->hasMany("App\Models\\transaction","room_id");


    }



}
