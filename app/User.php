<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'centro_acopio_id', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function canjeMaterialReciclable(){
        return $this->belongsTo('App\CanjeMaterialReciclable');
    }

    public function canjeCupon(){
        return $this->belongsTo('App\CanjeCupon');
    }

    public function centroAcopio(){
        return $this->belongsTo('App\CentroAcopio');
    }

    /**
     * Get the client that owns the user.
     */
    public function cliente()
    {
        return $this->hasOne('App\Cliente');
    }
}
