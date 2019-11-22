<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Supplier - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name  : description)
// 	    id_SUP(PK)  : id for table Supplier, 
//      id_USU(FK)  : user id who signed up,
//      corp_SUP    : supplier corporate name, 
//      fant_SUP    : supplier fantasy name,
//      cnpj_SUP    : supplier document, 
//      address_SUP : supplier address, 
//      num_SUP     : supplier address number, 
//      comp_SUP    : supplier address complement, 
//      cep_SUP     : supplier address cep, 
//      id_REF(FK)  : set state for supplier,	 
//      id_CIT(FK)  : set City for supplier,
//      id_DIS(FK)  : set District for supplier, 
//      extra_SUP   : extra information
//
////////////////////////////////////////////////////////////////////
class Supplier extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected  $fillable=['corp_SUP', 'fant_SUP', 'cnpj_SUP', 'address_SUP', 'num_SUP', 'comp_SUP', 'cep_SUP', 'extra_SUP','id_USU','id_REF','id_CIT','id_DIS'];

    // Hidden attributes but will have a user friendly name on the form
    protected  $hidden = ['id_USU','id_REF','id_CIT','id_DIS'];

 /* PUBLIC --------------------------------------------------------*/

    public  $timestamps=false;  

    /* hasMany functions ---------------------------*/  

    public function getAllSupplierReceipts()
    {
        return $this->hasMany('App\Receipt','id_SUP');
    }  


    /* belongsTo functions --------------------------*/   

    public function getSupplierRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }  

    public function getSupplierCity()
    {
        return $this->belongsTo('App\City','id_CIT','id_CIT');
    }   

    public function getSupplierDistrict()
    {
        return $this->belongsTo('App\District','id_DIS','id_DIS');
    } 

    /* belongsToMany functions ----------------------*/ 

    public function getProductsBySupplier()
    {
        return $this->belongsToMany('App/Product');
    }     

}
