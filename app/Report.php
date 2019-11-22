<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Report - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
// 	    id_REP(PK) : id for table Report, 
//      id_USU(FK) : user id who signed up,
//      desc_REP   : report description, 
//      id_REF(FK) : set type for report, 
//      date_REP   : report date,  
//      extra_REP  : extra information
//
//////////////////////////////////////////////////////////////////
class Report extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['desc_REP', 'date_REP', 'extra_REP','id_USU','id_REF'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_REF'];

// PUBLIC --------------------------------------------------------*/

    public $timestamps=false;   

    /* belongsTo functions --------------------------*/   

    public function getReportRefference()
    {
        return $this->belongsTo('App\Refference','id_REF','id_REF');
    }        

}

