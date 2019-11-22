<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Receipt - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_REC(PK) : id for table Receipts, 
//      id_USU(FK) : user id who signed up,
//      date_REC   : receipt date,
//      hour_REC   : receipt hour,
//      id_SUP     : receipt supplier,
//      invo_REC   : receipt invoice,
//      desc_REC   : receipt description, 
//      situa_REC  : receipt situation,
//      id_REF(FK) : set the payment method of the receipt, 
//      datef_REC  : receipt finalization date, 
//      hourf_REC  : receipt finalization hour,
//      disco_REC  : discount amount,
//      total_REC  : total receipt  
//      extra_REC  : extra information   many to many
//
////////////////////////////////////////////////////////////////////
class Receipt extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['date_REC', 'hour_REC', 'invo_REC', 'desc_REC', 'situa_REC', 'id_REF', 'datef_REC', 'hourf_REC', 'disco_REC', 'total_REC', 'extra_REC','id_USU','id_SUP','id_REF'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_SUP','id_REF'];

 /* PUBLIC ---------------------------------------------------------- */

    public $timestamps=false;    

    /* belongsTo functions --------------------------*/  

    public function getReceiptSupplier()
    {
        return $this->belongsTo('App\Supplier','id_SUP','id_SUP');
    }  

    /* belongsToMany functions ----------------------*/ 

    public function getReceiptItems()
    {
        return $this->belongsToMany('App/Product');
    }          

}
