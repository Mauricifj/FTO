<?php

use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class States_RefferenceTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        Refference::create([
            'type' => 'state',
            'description' => 'Acre',
            'acronym' => 'AC',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Alagoas',
            'acronym' => 'AL',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Amapá',
            'acronym' => 'AC',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Amazonas',
            'acronym' => 'AM',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Bahia',
            'acronym' => 'BA',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Ceará',
            'acronym' => 'CE',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Distrito Federal',
            'acronym' => 'DF',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Espiríto Santos',
            'acronym' => 'ES',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Goiás',
            'acronym' => 'GO',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Maranhão',
            'acronym' => 'MA',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Mato Grosso',
            'acronym' => 'MT',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Mato Grosso do Sul',
            'acronym' => 'MS',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Minas Gerais',
            'acronym' => 'BA',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Pará',
            'acronym' => 'PA',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Paraíba',
            'acronym' => 'PB',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Paraná',
            'acronym' => 'PR',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Pernambuco',
            'acronym' => 'PE',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Piauí',
            'acronym' => 'PI',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Rio de Janeiro',
            'acronym' => 'RJ',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Rio Grande do Norte',
            'acronym' => 'RN',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Rio Grande do Sul',
            'acronym' => 'RS',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Rondônia',
            'acronym' => 'RO',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Roraima',
            'acronym' => 'RR',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Santa Catarina',
            'acronym' => 'SC',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'São Paulo',
            'acronym' => 'SP',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Sergipe',
            'acronym' => 'SE',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'state',
            'description' => 'Tocantins',
            'acronym' => 'TO',
            'id_user' => $user_id,
        ]);

        $this->command->info('States created');
    }
}
