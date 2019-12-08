<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected  $fillable=['company_name', 'fantasy_name', 'cnpj', 'address', 'number', 'complement', 'zipcode', 'extra', 'id_user', 'id_refference', 'id_city', 'id_district'];

    protected  $hidden = ['id_user', 'id_refference', 'id_city', 'id_district'];

    public  $timestamps=false;

    public function receipts()
    {
        return $this->hasMany('App\Receipt','id_supplier');
    }  

    public function refference()
    {
        return $this->belongsTo('App\Refference','id_refference');
    }  

    public function city()
    {
        return $this->belongsTo('App\City','id_city');
    }   

    public function district()
    {
        return $this->belongsTo('App\District','id_district');
    } 

    public function products()
    {
        return $this->belongsToMany('App/Product');
    }     

}
