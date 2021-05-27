<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    public function send()
    {
        return $this->hasOne('App\send');
    }
}
