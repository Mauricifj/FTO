<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'gender', 'birthdate', 'cpf', 'address', 'number', 'complement', 'zipcode', 'extra', 'id_user', 'id_refference', 'id_city', 'id_district'];

    protected $hidden = ['id_user', 'id_refference', 'id_city', 'id_district'];

    public $timestamps = false;

    public function sales()
    {
        return $this->hasMany('App\Sale', 'id');
    }

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'id_city');
    }

    public function district()
    {
        return $this->belongsTo('App\District', 'id_district');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact', 'id_customer');
    }
}
