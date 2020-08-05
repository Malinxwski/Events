<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name','surname','email','event_id'];

    public function events()
    {
         return $this->belongsTo(Event::class);
    }
}
