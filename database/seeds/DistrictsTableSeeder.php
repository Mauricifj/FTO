<?php

use App\City;
use App\District;
use App\User;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        $praia_grande_id = City::all()->where('name',  'Praia Grande')->first()->id;
        $santos_id = City::all()->where('name',  'Santos')->first()->id;
        $rio_id = City::all()->where('name',  'Rio de Janeiro')->first()->id;
        $sao_paulo_id = City::all()->where('name',  'São Paulo')->first()->id;

        $this->createCitiesForPraiaGrande($praia_grande_id, $user_id);
        $this->createCitiesForSantos($santos_id, $user_id);
        $this->createCitiesForSaoPaulo($sao_paulo_id, $user_id);
        $this->createCitiesForRioDeJaneiro($rio_id, $user_id);
    }

    private function createCitiesForPraiaGrande(int $praia_grande_id, int $user_id)
    {
        District::create([
            'name' => 'Boqueirão',
            'id_city' => $praia_grande_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Forte',
            'id_city' => $praia_grande_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Guilhermina',
            'id_city' => $praia_grande_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Tude Bastos',
            'id_city' => $praia_grande_id,
            'id_user' => $user_id
        ]);

        $this->command->info('Praia Grande districts created');
    }

    private function createCitiesForSantos(int $santos_id, int $user_id)
    {
        District::create([
            'name' => 'Aparecida',
            'id_city' => $santos_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Boqueirão',
            'id_city' => $santos_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Embaré',
            'id_city' => $santos_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Gonzaga',
            'id_city' => $santos_id,
            'id_user' => $user_id
        ]);

        $this->command->info('Santos districts created');
    }

    private function createCitiesForSaoPaulo(int $sao_paulo_id, int $user_id)
    {
        District::create([
            'name' => 'Bela Vista',
            'id_city' => $sao_paulo_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Moema',
            'id_city' => $sao_paulo_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Paraíso',
            'id_city' => $sao_paulo_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Perdizes',
            'id_city' => $sao_paulo_id,
            'id_user' => $user_id
        ]);

        $this->command->info('São Paulo districts created');
    }

    private function createCitiesForRioDeJaneiro(int $rio_id, int $user_id)
    {
        District::create([
            'name' => 'Barra de Tijuca',
            'id_city' => $rio_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Copacabana',
            'id_city' => $rio_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Gávea',
            'id_city' => $rio_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Lapa',
            'id_city' => $rio_id,
            'id_user' => $user_id
        ]);

        District::create([
            'name' => 'Leblon',
            'id_city' => $rio_id,
            'id_user' => $user_id
        ]);

        $this->command->info('Rio de Janeiro districts created');
    }
}