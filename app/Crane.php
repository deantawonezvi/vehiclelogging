<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crane extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }
    public function defect(){
        return $this->belongsTo(Defect::class);
    }
}
