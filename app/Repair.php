<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public function garage(){
        return $this->belongsTo(Garage::class);
    }
    public function crane(){
        return $this->belongsTo(Crane::class);
    }
    public function driver(){
        return $this->belongsTo(Driver::class);
    }
}
