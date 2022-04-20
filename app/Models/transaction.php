<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    public $fillable=["customer_id","room_id","check_in","check_out","status","total"];


    public function customer(){

        return $this->belongsTo("App\Models\customer","customer_id");
    }


    public function room(){

        return $this->belongsTo("App\Models\\room","room_id");

    }


    public function payments(){


        return $this->hasMany("App\Models\payment","transaction_id");
    }

}
