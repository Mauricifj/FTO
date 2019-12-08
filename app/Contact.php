<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['desc_CON', 'extra_CON','id_USU','id_REF','id_CST','id_SUP'];

    protected $hidden = ['id_USU','id_REF','id_CST','id_SUP'];

    public $timestamps=false;

    public function getContactRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }  

    public function getContactCustomer()
    {
        return $this->belongsTo('App\Customer','id_CST','id_CST');
    }      

    public function getContactSupplier()
    {
        return $this->belongsTo('App\Supplier','id_SUP','id_SUP');
    }      

}
