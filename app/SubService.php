<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    public function services()
    {
        return $this->belongsToMany('App\Service', 'sub_service_service');
    }

    public function references()
    {
        return $this->belongsToMany('App\Reference');
    }
}
