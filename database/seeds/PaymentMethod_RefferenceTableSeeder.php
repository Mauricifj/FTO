<?php

use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class PaymentMethod_RefferenceTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        Refference::create([
            'type' => 'payment_method',
            'description' => 'Débito',
            'acronym' => 'debit',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'payment_method',
            'description' => 'Crédito Parcelado',
            'acronym' => 'credit',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'payment_method',
            'description' => 'Crédito à vista',
            'acronym' => 'credit1x',
            'id_user' => $user_id,
        ]);

        $this->command->info('Payment methods created');
    }
}
