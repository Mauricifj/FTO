<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Sale - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
// 	  id_SAL(PK)   : id for table Sale, 
//      id_USU(FK) : user id who signed up,
//      date_SAL   : sale date,
//      hour_SAL   : sale hour,
//      invo_SAL   : sale invoice,
//      desc_SAL   : sale description, 
//      type_SAL   : sale type (sale or budget),
//      situa_SAL  : sale situation,
//      id_REF(FK) : set form for payment for sale,	
//      datef_SAL  : sale finalization date, 
//      hourf_SAL  : sale finalization hour,
//      disco_SAL  : discount amount,
//      total_SAl  : total sale   LIGACAO MANY TO MANY
//
//////////////////////////////////////////////////////////////////
class Sale extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected  $fillable=['date_SAL', 'hour_SAL', 'invo_SAL', 'desc_SAL', 'type_SAL', 'situa_SAL', 'datef_SAL', 'hourf_SAL', 'disco_SAL', 'total_SAL','id_USU','id_REF','id_CST'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_REF','id_CST'];

 /* PUBLIC --------------------------------------------------------*/

    public $timestamps=false;   

    /* belongsTo functions --------------------------*/   

    public function getSaleRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }   

    public function getSaleCustomer()
    {
        return $this->belongsTo('App\Customer','id_CST','id_CST');
    }    

    /* belongsToMany functions ----------------------*/ 

    public function getSaleItems()
    {
        return $this->belongsToMany('App/Product');
    }        

}
