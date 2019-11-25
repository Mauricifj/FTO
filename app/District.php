<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'extra', 'id_user', 'id_city'];

    protected $hidden = ['id_user', 'id_city'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\City', 'id_city');
    }
}
