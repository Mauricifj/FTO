<?php

use App\Contact;
use App\Customer;
use App\Refference;
use App\User;
use Illuminate\Database\Seeder;

class Customers_ContactsTableSeeder extends Seeder
{
    private $user_id;

    private $customers;

    public function run()
    {
        $this->user_id = User::all()->first()->id;

        $this->customers = Customer::all();

        $tel = Refference::all()->where('acronym', 'tel')->first();
        $mobile = Refference::all()->where('acronym', 'mobile')->first();
        $whatsapp = Refference::all()->where('acronym', 'whatsapp')->first();
        $email = Refference::all()->where('acronym', 'email')->first();
        $linkedin = Refference::all()->where('acronym', 'linkedin')->first();
        $facebook = Refference::all()->where('acronym', 'facebook')->first();
        $instragram = Refference::all()->where('acronym', 'instagram')->first();

        $this->createTelContacts($tel->id, 'tel');
        $this->createTelContacts($mobile->id, 'mobile');
        $this->createTelContacts($whatsapp->id, 'whatsapp');
        $this->createEmailContacts($email->id);
        $this->createLinkedInContacts($linkedin->id);
        $this->createFacebookContacts($facebook->id);
        $this->createInstagramContacts($instragram->id);
    }

    private function createTelContacts(int $tel_id, string $type) {
        for ($id = 0; $id < $this->customers->count(); $id++)
            Contact::create([
                'description' => $this->generatePhoneNumber(),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $tel_id,
                'id_customer' => $this->customers[$id]->id,
                'id_supplier' => null,
            ]);

        $this->command->info($this->customers->count() . ' contacts of ' . $type . ' type for customers created');
    }

    private function generatePhoneNumber() {
        // 11 digits
        $number = rand(11111111111, 99999999999);

        // 9999999-9999 style
        $number = substr_replace($number, '-', '7', '0');

        // (99)99999-9999 style
        $number = '(' . substr_replace($number, ')', 2, 0);

        // (99)99999-9999 style
        $number = substr_replace($number, ' ', 4, 0);

        return $number;
    }

    private function createEmailContacts(int $email_id) {
        for ($id = 0; $id < $this->customers->count(); $id++)
            Contact::create([
                'description' => strtolower(str_replace(' ', '_', $this->customers[$id]->name) . $this->generateEmail()),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $email_id,
                'id_customer' => $this->customers[$id]->id,
                'id_supplier' => null,
            ]);

        $this->command->info($this->customers->count() . ' contacts of email type for customers created');
    }

    private function generateEmail() {
        $providers = [
            '@outlook.com',
            '@hotmail.com',
            '@gmail.com',
            '@icloud.com',
        ];

        return $providers[rand(0, 3)];
    }

    private function createLinkedInContacts(int $linkedIn_id)
    {
        for ($id = 0; $id < $this->customers->count(); $id++)
            Contact::create([
                'description' => 'https://www.linkedin.com/in/' . strtolower(str_replace(' ', '-', $this->customers[$id]->name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $linkedIn_id,
                'id_customer' => $this->customers[$id]->id,
                'id_supplier' => null,
            ]);

        $this->command->info($this->customers->count() . ' contacts of LinkedIn type for customers created');
    }

    private function createFacebookContacts(int $facebook_id)
    {
        for ($id = 0; $id < $this->customers->count(); $id++)
            Contact::create([
                'description' => 'https://www.facebook.com/' . strtolower(str_replace(' ', '.', $this->customers[$id]->name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $facebook_id,
                'id_customer' => $this->customers[$id]->id,
                'id_supplier' => null,
            ]);

        $this->command->info($this->customers->count() . ' contacts of Facebook type for customers created');
    }

    private function createInstagramContacts(int $facebook_id)
    {
        for ($id = 0; $id < $this->customers->count(); $id++)
            Contact::create([
                'description' => 'https://www.instagram.com/' . strtolower(str_replace(' ', '.', $this->customers[$id]->name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $facebook_id,
                'id_customer' => $this->customers[$id]->id,
                'id_supplier' => null,
            ]);

        $this->command->info($this->customers->count() . ' contacts of Instagram type for customers created');
    }
}
