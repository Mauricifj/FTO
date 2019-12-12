<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleSituation extends Model
{
    protected $fillable = ['value', 'description', 'badge'];

    public static function allTypes()
    {
        return $types = array(
            new SaleSituation(array('value' => 'canceled', 'description' => 'Cancelada', 'badge' => 'danger')),
            new SaleSituation(array('value' => 'not_paid', 'description' => 'Não paga', 'badge' => 'dark')),
            new SaleSituation(array('value' => 'awaiting_payment', 'description' => 'Aguardando pagamento', 'badge' => 'warning')),
            new SaleSituation(array('value' => 'paid', 'description' => 'Paga', 'badge' => 'primary')),
        );
    }
}
