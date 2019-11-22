<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   District - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_DIS(PK) : id for table District, 
//      id_USU(FK) : user id who signed up,
//      id_CIT(FK) : set citie for District, 
//      name_DIS   : district name, 
//      extra_DIS  : extra information
//
//  Extra specifications:
//    When you enter a new city, the system will automatically 
//    register adowntown district named "Centro" for it.
//
////////////////////////////////////////////////////////////////////
class District extends Model
{
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['name_DIS', 'extra_DIS','id_USU','id_CIT'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_USU','id_CIT'];

 /* PUBLIC --------------------------------------------------------*/   

    public $timestamps=false; 

    /* belongsTo functions --------------------------*/   

    public function getDistrictCity()
    {
        return $this->belongsTo('App\City', 'id_CIT', 'id_CIT');
    }
}
