<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    public function Vehiculos()
    {
        return $this->hasMany('App\Vehiculo');
    }
}
