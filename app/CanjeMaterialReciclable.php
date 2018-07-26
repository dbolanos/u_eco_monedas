<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanjeMaterialReciclable extends Model
{
    //

    public function centroAcopio(){
        return $this->belongsTo('App\CentroAcopio');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function detallesCanjeMaterialReciclable(){
        return $this->belongsToMany('App\DetallesCanjeMaterialReciclable');
    }
}
