<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   City - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
// 	    id_CIT(PK) : id for table City, 
//      id_USU(FK) : user id who signed up,
//      name_CIT   : city name, 
//      extra_CIT  : extra information,
//      id_REF(FK) : set State(UF) for City	 
//
//////////////////////////////////////////////////////////////////
class City extends Model
{
 /* PROTECTED ----------------------------------------------------*/

	// Attributes
	protected $fillable=['name', 'extra','id_user','id_refference'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_user','id_refference'];

 /* PUBLIC --------------------------------------------------------*/    

    public $timestamps=false;    

    /* hasMany functions -------------------------- */  

	public function getAllCityDistricts()
	{
  		return $this->hasMany('App\District','id_city');
    }   

	public function getAllCityCustomers()
	{
  		return $this->hasMany('App\Customer','id_city');
    }   

	public function getAllCitySuppliers()
	{
  		return $this->hasMany('App\Supplier','id_city');
    } 

    /* belongsTo functions --------------------------*/   

    public function getCityRefference()
    {
        return $this->belongsTo('App\Refference','id_refference','id_refference');
    }    
  
}

/*
 Given a City object, the function below makes it possible to get the Reference (UF) object to which the city belongs.
 The "belongsTo" function of the "Model" class (inherited) implements associations in which city belongs to 1 reference.
 The last two parameters of "belongsTo" correspond to the foreign key in the "cities" table and the primary key in "references".
 Usage example: suppose variable $ C referencing object "City", to get the UF of the city we would use the instruction: "$ R = $ C-> reference () -> first ();".
 Here, "first" is used to extract from the collection returned by the "stroke" function (below) the first and only object "Refferencia".
*/

/*
 Dado um objeto Cidade, a função abaixo possibilita obter o objeto Refferencia (UF) a qual a cidade pertence. 
 A função "belongsTo" da classe "Model" (herdada) implementa associações em que cidade pertence a 1 refferencia. 
 Os dois últimos parâmetros de "belongsTo" correspondem a chave estrangeira na tabela "cidades" e a primária em "refferencias". 
 Exemplo de uso: suponha variável $C referenciando objeto "Cidade", para se obter a UF da cidade usaríamos a instrução: "$R = $C->refferencia()->first();". 
 Aqui, "first" é usado para extrair da coleção retornada pela função "curso" (abaixo) o primeiro e único objeto "Refferencia".
*/

