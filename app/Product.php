<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Product - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   04/11/2019
//
//  Description:
//    Columns(Name : description)
// 	    id_PRO(PK) : id for table Contact, 
//      id_USU(FK) : user id who signed up,
//      type_PRO   : product type (product, material or service)
//      id_REF(FK) : set class for product,	
//      id_SUP(FK) : set product supplier,
//      desc_PRO   : product description, 
//      umea_PRO   : product unit of measurement
//      cost_PRO   : product cost,
//      value_PRO  : product value (desnormalized),
//      min_PRO    : minimum stock quantity,
//      stoc_PRO   : quantity in stock,
//      extra_CON  : extra information    LIGACAO MANY TO MANY
//
//////////////////////////////////////////////////////////////////
class Product extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['type_PRO', 'desc_PRO', 'umea_PRO', 'cost_PRO', 'value_PRO', 'min_PRO', 'stoc_PRO', 'extra_PRO','id_USU','id_REF'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_REF'];

 /* PUBLIC ---------------------------------------------------------- */

    public $timestamps=false;    

    /* belongsTo functions --------------------------*/   

    public function getProductRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }     

    /* belongsToMany functions ----------------------*/ 

    public function getSalesByProduct()
    {
        return $this->belongsToMany('App/Sale');
    } 

    public function getReceiptsByProduct()
    {
        return $this->belongsToMany('App/Receipt');
    }    

    public function getSuppliersByProduct()
    {
        return $this->belongsToMany('App/Supplier');
    }          

}