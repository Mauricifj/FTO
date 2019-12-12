<?php

use App\City;
use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        $sao_paulo_id = Refference::all()->where('acronym',  'SP')->first()->id;
        $rio_id = Refference::all()->where('acronym',  'RJ')->first()->id;

        $this->createCitiesForSaoPaulo($sao_paulo_id, $user_id);
        $this->createCitiesForRioDeJaneiro($rio_id, $user_id);
    }

    private function createCitiesForSaoPaulo(int $sao_paulo_id, int $user_id)
    {
        City::create([
            'name' => 'Praia Grande',
            'id_refference' => $sao_paulo_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'Santos',
            'id_refference' => $sao_paulo_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'São Paulo',
            'id_refference' => $sao_paulo_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'São Vicente',
            'id_refference' => $sao_paulo_id,
            'id_user' => $user_id,
        ]);

        $this->command->info('São Paulo cities created');
    }

    private function createCitiesForRioDeJaneiro(int $rio_id, int $user_id)
    {
        City::create([
            'name' => 'Duque de Caxias',
            'id_refference' => $rio_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'Niterói',
            'id_refference' => $rio_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'Nova Iguaçu',
            'id_refference' => $rio_id,
            'id_user' => $user_id,
        ]);

        City::create([
            'name' => 'Rio de Janeiro',
            'id_refference' => $rio_id,
            'id_user' => $user_id,
        ]);

        $this->command->info('Rio de Janeiro cities created');
    }
}