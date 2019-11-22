<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Contact - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
// 	    id_CON(PK) : id for table Contact, 
//      id_USU(FK) : user id who signed up,
//      id_REF(FK) : set Contact type(tel, e-mail, etc),	
//      desc_CON   : contact description, 
//      extra_CON  : extra information 
//
//////////////////////////////////////////////////////////////////
class Contact extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['desc_CON', 'extra_CON','id_USU','id_REF','id_CST','id_SUP'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_REF','id_CST','id_SUP'];    

 /* PUBLIC --------------------------------------------------------*/    

    public $timestamps=false;    

    /* belongsTo functions --------------------------*/   

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
