<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Customer - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name  : description)
//      id_CST(PK)  : id for table Customer, 
//      id_USU(FK)  : user id who signed up,
//      name_CST    : customer name, 
//      sex_CST     : customer gender, 
//      birth_CST   : customer birth,
//      cpf_CST     : customer document, 
//      address_CST : customer address, 
//      num_CST     : customer address number, 
//      comp_CST    : customer address complement, 
//      cep_CST     : customer address cep, 
//      id_REF(FK)  : set state for customer,    
//      id_CIT(FK)  : set City for customer,
//      id_DIS(FK)  : set District for customer, 
//      extra_CST   : extra information
//
////////////////////////////////////////////////////////////////////
class Customer extends Model
{
 /* PROTECTED ----------------------------------------------------*/

	// Attributes   
    protected $fillable=['name_CST', 'sex_CST', 'birth_CST', 'cpf_CST', 'address_CST', 'num_CST', 'comp_CST', 'cep_CST', 'extra_CST','id_USU','id_REF','id_CIT','id_DIS'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_REF','id_CIT','id_DIS'];

 /* PUBLIC --------------------------------------------------------*/   

    public $timestamps=false;

    /* hasMany functions ---------------------------*/  

	public function getAllCustomerSales()
	{
  		return $this->hasMany('App\Sale','id_CST');
    }   

    /* belongsTo functions --------------------------*/  

    public function getCustomerRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }  

    public function getCustomerCity()
    {
        return $this->belongsTo('App\City','id_CIT','id_CIT');
    }   

    public function getCustomerDistrict()
    {
        return $this->belongsTo('App\District','id_DIS','id_DIS');
    }                    

}
