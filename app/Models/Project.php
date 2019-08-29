<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    public function webhooks() {
        return $this->hasMany('App\Models\Webhooks');
    }
}
