<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroAcopio extends Model
{
    //

    //protected $guarded = 'id';
    protected $fillable = ['nombre', 'provincia_id', 'direccion_exacta','telefono','estado'];

    public function canjeMaterialReciclable()
    {
        return $this->belongsTo('App\CanjeMaterialReciclable');

    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function provincia() {
      return $this->belongsTo('App\Provincias');
    }
}
