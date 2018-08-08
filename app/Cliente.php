<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $guarded = 'id';

    public function canjesMaterialReciclable(){
        return $this->belongToMany('App\CanjeMaterialReciclable');
    }

    public function canjeCupon(){
        return $this->belongsTo('App\CanjeCupon');
    }

    /**
     * Get the user record associated with the client
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
