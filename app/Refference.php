<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//////////////////////////////////////////////////////////////////
//  Name:   Refference - model (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
// 	    id_REF(PK) : id for table Refference, 
//      id_USU(FK) : user id who signed up,
//      type_REF   : refference type(State, form of payment, etc)
//      desc_REF   : refference description, 
//      acro_REF   : refference acronym, 
//      extra_REF  : extra information
//
//////////////////////////////////////////////////////////////////
class Refference extends Model
{	
 /* PROTECTED ----------------------------------------------------*/

    // Attributes
    protected $fillable=['type', 'description', 'acronym', 'extra','id_user'];

    // Hidden attributes but will have a user friendly name on the form
    protected $hidden = ['id_user'];

 /* PUBLIC ---------------------------------------------------------- */

    public $timestamps=false;  

    /* 
      Given a Reference object, the function below makes it possible to obtain a collection of Cities objects to which the Reference is associated.
      The "hasMany" function of the "Model" class (inherited) implements association where reference has multiple associated cities.
      The last parameter of "hasMany" match the foreign key in the "cities" table.
      Usage example: suppose variable $ R referencing object "Refferencia", to get all cities of the reference we would use the instruction: "$ C = $ R-> cities () -> get ();".
      Here, "get" is required to generate the cities object collection. 
    */

    /* hasMany functions -------------------------- */    
    
	public function getAllRefferenceCities()
	{
  		return $this->hasMany('App\City','id_refference');
    }    

    public function getAllRefferenceContacts()
	{
  		return $this->hasMany('App\Contact','id_refference');
    } 

	public function getAllRefferenceCustomers()
	{
  		return $this->hasMany('App\Customer','id_refference');
    } 

	public function getAllRefferenceProducts()
	{
  		return $this->hasMany('App\Product','id_refference');
    } 

	public function getAllRefferenceReceipts()
	{
  		return $this->hasMany('App\Receipt','id_refference');
    }     

	public function getAllRefferenceReports()
	{
  		return $this->hasMany('App\Report','id_refference');
    } 

	public function getAllRefferenceSales()
	{
  		return $this->hasMany('App\Sale','id_refference');
    } 

	public function getAllRefferenceSuppliers()
	{
  		return $this->hasMany('App\Supplier','id_refference');
    }                           

} 

    /* Dado um objeto Refferencia, a função abaixo possibilita obter uma coleção de objetos Cidades ao qual a Refferencia está associada. 
      A funçao "hasMany" da classe "Model" (herdada) implementa associação em que refferencia possui várias cidades associadas. 
      O último parâmetro de "hasMany" correspondem a chave estrangeira na tabela "cidades". 
      Exemplo de uso: suponha variável $R referenciando objeto "Refferencia", para se obter todas as cidades da refferencia usaríamos a instrução: "$C = $R->cidades()->get();". 
      Aqui, "get" é necessário para gerar a coleção de objetos cidades.*/

   