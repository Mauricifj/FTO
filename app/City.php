<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'extra', 'id_user', 'id_refference'];

    protected $hidden = ['id_user', 'id_refference'];

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany('App\District', 'id_city');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer', 'id_city');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier', 'id_city');
    }

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
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