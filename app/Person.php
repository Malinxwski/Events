<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Person extends Model
{
    protected $fillable = ['name','surname','email','event_id'];
    /**
     * @var mixed
     */

    /**
     * @var mixed
     */

    public function events()
    {
         return $this->belongsTo(Event::class);
    }




}
