<?php

use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class Type_RefferenceTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        Refference::create([
            'type' => 'type',
            'description' => 'Eletrônico',
            'acronym' => 'eletronic',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'type',
            'description' => 'Celular',
            'acronym' => 'cellphone',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'type',
            'description' => 'Impressora',
            'acronym' => 'printer',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'type',
            'description' => 'Carro',
            'acronym' => 'car',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'type',
            'description' => 'Notebook',
            'acronym' => 'laptop',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'type',
            'description' => 'Roteador',
            'acronym' => 'router',
            'id_user' => $user_id,
        ]);

        $this->command->info('Type of refferences created');
    }
}
