<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function Propietario() {
        return $this->hasOne('App\Propietario');
    }
}
