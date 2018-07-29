<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{

  public function centroacopio(){
    return $this->hasMany('App\CentroAcopio');
  }

}
