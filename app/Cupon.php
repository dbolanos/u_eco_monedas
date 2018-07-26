<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    //
    protected $guarded = 'id';

    public function canjeCupon(){
        return $this->belongsTo('App\CanjeCupon');
    }
}
