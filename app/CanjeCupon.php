<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanjeCupon extends Model
{
    //
    protected $guarded  = 'id';

    protected $table = 'canje_cupon';

    //public function cupon(){
        //return $this->belongTo('App\Cupon');
    //}

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
