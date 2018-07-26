<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroAcopio extends Model
{
    //

    protected $guarded = 'id';

    public function canjeMaterialReciclable()
    {
        return $this->belongsTo('App\CanjeMaterialReciclable');

    }    
}
