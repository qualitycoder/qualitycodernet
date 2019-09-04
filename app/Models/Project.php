<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $fillable = [
      'name', 'language', 'stub', 'description'
    ];

    public function webhooks() {
        return $this->hasMany('App\Models\Webhook');
    }
}
