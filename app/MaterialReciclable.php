<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialReciclable extends Model
{
    //
    protected $guarded = 'id';

    public function detalleCanjeMaterialReciclable(){
        return $this->belongToMany('App\DetalleCanjeMaterialReciclable');
    }
}
