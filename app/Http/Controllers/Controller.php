<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//////////////////////////////////////////////////////////////////
//  Name:   Controller (class)
//
//  Author: Larevel (Jefferson Rodrigues de Oliveira)
//
//  Date:   04/11/2019
//
//////////////////////////////////////////////////////////////////
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
