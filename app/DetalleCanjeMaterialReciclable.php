<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCanjeMaterialReciclable extends Model
{
    //
    protected $guarded = 'id';

    public function materialReciclable(){
        return $this->belongsTo('App\MaterialReciclable');
    }

    public function canjeMaterialReciclable(){
        return $this->belongsTo('CanjeMaterialReciclable');
    }
}
