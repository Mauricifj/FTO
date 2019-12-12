<?php

use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        $state = Refference::all()->where('acronym', 'SP')->first();

        $city = $state->cities->first();

        $district = $city->districts->first();
        
        Supplier::create([
            'company_name' => 'IMAGE EQUIPAMENTOS ELETRONICOS LTDA.',
            'fantasy_name' => 'SCOTT ELECTRONICS',
            'cnpj' => '00959046000132',
            'address' => 'Rua Scott Electronics',
            'number' => '132',
            'complement' => '',
            'zipcode' => '1179901',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'MOTOROLA SOLUTIONS LTDA.',
            'fantasy_name' => 'Motorola',
            'cnpj' => '10652730000120',
            'address' => 'Rua Motorola',
            'number' => '120',
            'complement' => '',
            'zipcode' => '1179902',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'POSITIVO INFORMATICA S/A',
            'fantasy_name' => 'POSITIVO',
            'cnpj' => '81243735000148',
            'address' => 'Rua Positivo',
            'number' => '148',
            'complement' => '',
            'zipcode' => '1179903',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'MULTILASER INDUSTRIAL LTDA',
            'fantasy_name' => 'MULTILASER',
            'cnpj' => '59717553000102',
            'address' => 'Rua Multilaser',
            'number' => '102',
            'complement' => '',
            'zipcode' => '1179904',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'OKI BRASIL INDUST E COMER DE PRODUT E TECNOL EM AUTOM S.A.',
            'fantasy_name' => 'OKI BRASIL',
            'cnpj' => '16564682000103',
            'address' => 'Rua Oki',
            'number' => '103',
            'complement' => '',
            'zipcode' => '1179905',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'ALCATEL‐LUCENT BRASIL S.A',
            'fantasy_name' => 'Alcatel',
            'cnpj' => '46049987000130',
            'address' => 'Rua Alcatel',
            'number' => '130',
            'complement' => '',
            'zipcode' => '1179906',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'BENTLEY DO BRASIL LTDA.',
            'fantasy_name' => 'Bentley',
            'cnpj' => '01128902000251',
            'address' => 'Rua Bentley',
            'number' => '251',
            'complement' => '',
            'zipcode' => '1179907',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'D‐LINK BRASIL LTDA.',
            'fantasy_name' => 'D-Link',
            'cnpj' => '04677565000320',
            'address' => 'Rua D-Link',
            'number' => '320',
            'complement' => '',
            'zipcode' => '1179908',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'BIOSYSTEMS INDUSTRIA, COMERCIO, IMPORTACAO E EXPORTACAO EIRE',
            'fantasy_name' => 'Biosystems',
            'cnpj' => '05236671000170',
            'address' => 'Rua Biosystems',
            'number' => '170',
            'complement' => '',
            'zipcode' => '1179909',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Supplier::create([
            'company_name' => 'GENERAL MOTORS DO BRASIL LTDA.',
            'fantasy_name' => 'Chevrolet',
            'cnpj' => '59275792003175',
            'address' => 'Rua Chevrolet',
            'number' => '175',
            'complement' => '',
            'zipcode' => '1179910',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        $this->command->info('Suppliers created');
    }
}