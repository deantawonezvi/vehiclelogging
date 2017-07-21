<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function crane()
    {
        return $this->belongsTo(Crane::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }
}
