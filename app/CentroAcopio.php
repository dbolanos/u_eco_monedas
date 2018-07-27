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

    public function user(){
        return $this->belongsTo('App\User');
    }
}
