<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webhooks extends Model {

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
