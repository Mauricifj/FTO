<?php

use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class ContactTypes_RefferenceTableSeeder extends Seeder
{
    public function run()
    {
        $user_id = User::all()->first()->id;

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Telefone',
            'acronym' => 'tel',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Celular',
            'acronym' => 'mobile',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Whatsapp',
            'acronym' => 'whatsapp',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Email',
            'acronym' => 'email',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Linkedin',
            'acronym' => 'linkedin',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Facebook',
            'acronym' => 'facebook',
            'id_user' => $user_id,
        ]);

        Refference::create([
            'type' => 'contact_type',
            'description' => 'Instagram',
            'acronym' => 'instagram',
            'id_user' => $user_id,
        ]);

        $this->command->info('Contact types created');
    }
}
