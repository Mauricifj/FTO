<?php

use App\Customer;
use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        $state = Refference::all()->where('acronym', 'SP')->first();

        $city = $state->cities->first();

        $district = $city->districts->first();

        Customer::create([
            'name' => 'Pedro Paulo',
            'gender' => 'm',
            'birthdate' => '1991-01-01',
            'cpf' => '99999999901',
            'address' => 'Rua Pedro Paulo',
            'number' => '111',
            'complement' => '',
            'zipcode' => '1179901',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Maria Beatriz',
            'gender' => 'f',
            'birthdate' => '1992-02-02',
            'cpf' => '99999999902',
            'address' => 'Rua Maria Beatriz',
            'number' => '222',
            'complement' => '',
            'zipcode' => '1179902',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Bruno Henrique',
            'gender' => 'm',
            'birthdate' => '1993-03-03',
            'cpf' => '99999999903',
            'address' => 'Rua Bruno Henrique',
            'number' => '333',
            'complement' => '',
            'zipcode' => '1179903',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Ana Laura',
            'gender' => 'f',
            'birthdate' => '1994-04-04',
            'cpf' => '99999999904',
            'address' => 'Rua Ana Laura',
            'number' => '444',
            'complement' => '',
            'zipcode' => '1179904',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Miguel Rodrigo',
            'gender' => 'm',
            'birthdate' => '1995-05-05',
            'cpf' => '99999999905',
            'address' => 'Rua Miguel Rodrigo',
            'number' => '555',
            'complement' => '',
            'zipcode' => '1179905',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Bruna Isabela',
            'gender' => 'f',
            'birthdate' => '1996-06-06',
            'cpf' => '99999999906',
            'address' => 'Rua Bruna Isabela',
            'number' => '666',
            'complement' => '',
            'zipcode' => '1179906',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Diego Leonardo',
            'gender' => 'm',
            'birthdate' => '1997-07-07',
            'cpf' => '99999999907',
            'address' => 'Rua Diego Leonardo',
            'number' => '777',
            'complement' => '',
            'zipcode' => '1179907',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Lara Julia',
            'gender' => 'f',
            'birthdate' => '1998-08-08',
            'cpf' => '99999999908',
            'address' => 'Rua Lara Julia',
            'number' => '888',
            'complement' => '',
            'zipcode' => '1179908',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Rafael Vitor',
            'gender' => 'm',
            'birthdate' => '1999-09-09',
            'cpf' => '99999999909',
            'address' => 'Rua Rafael Vitor',
            'number' => '999',
            'complement' => '',
            'zipcode' => '1179909',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        Customer::create([
            'name' => 'Yasmin Mariana',
            'gender' => 'f',
            'birthdate' => '1990-10-10',
            'cpf' => '99999999910',
            'address' => 'Rua Yasmin Mariana',
            'number' => '100',
            'complement' => '',
            'zipcode' => '1179910',
            'extra' => '',
            'id_user' => $user_id,
            'id_refference' => $state->id,
            'id_city' => $city->id,
            'id_district' => $district->id,
        ]);

        $this->command->info('Customers created');
    }
}