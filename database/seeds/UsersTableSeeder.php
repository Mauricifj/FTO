<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $this->createAdmins();
        $this->createMembers();
    }

    private function createAdmins()
    {
        User::create([
            'name' => 'Maurici Ferreira Junior',
            'email' => 'maurici@fto.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'is_active' => true,
        ]);
        $this->command->info('User maurici@fto.com created');

        User::create([
            'name' => 'Jefferson Oliveira',
            'email' => 'jefferson@fto.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'is_active' => true,
        ]);
        $this->command->info('User jefferson@fto.com created');

        User::create([
            'name' => 'Júlio Takeda',
            'email' => 'julio@fto.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'is_active' => true,
        ]);
        $this->command->info('User julio@fto.com created');
    }

    private function createMembers()
    {
        $max = rand(1, 10);
        for($i=0; $i < $max; $i++):
            $this->createMember($i);
        endfor;
        $this->command->info($max . ' demo members created');
    }

    private function createMember($index)
    {
        return User::create([
            'name' => 'Usuário ' . $index,
            'email' => 'usuario' . $index . '@fto.com',
            'password' => bcrypt('123456'),
            'role' => 'member',
            'is_active' => true,
        ]);
    }
}
