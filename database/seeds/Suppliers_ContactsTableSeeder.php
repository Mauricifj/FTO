<?php

use App\Contact;
use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Database\Seeder;

class Suppliers_ContactsTableSeeder extends Seeder
{
    private $user_id;

    private $suppliers;

    public function run()
    {
        $this->user_id = User::all()->first()->id;

        $this->suppliers = Supplier::all();

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
        for ($id = 0; $id < $this->suppliers->count(); $id++)
            Contact::create([
                'description' => $this->generatePhoneNumber(),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $tel_id,
                'id_supplier' => $this->suppliers[$id]->id,
                'id_customer' => null,
            ]);

        $this->command->info($this->suppliers->count() . ' contacts of ' . $type . ' type for suppliers created');
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
        for ($id = 0; $id < $this->suppliers->count(); $id++)
            Contact::create([
                'description' => 'contact@' . strtolower(str_replace(' ', '', $this->suppliers[$id]->fantasy_name))  . '.com',
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $email_id,
                'id_supplier' => $this->suppliers[$id]->id,
                'id_customer' => null,
            ]);

        $this->command->info($this->suppliers->count() . ' contacts of email type for suppliers created');
    }

    private function createLinkedInContacts(int $linkedIn_id)
    {
        for ($id = 0; $id < $this->suppliers->count(); $id++)
            Contact::create([
                'description' => 'https://www.linkedin.com/in/' . strtolower(str_replace(' ', '-', $this->suppliers[$id]->fantasy_name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $linkedIn_id,
                'id_supplier' => $this->suppliers[$id]->id,
                'id_customer' => null,
            ]);

        $this->command->info($this->suppliers->count() . ' contacts of LinkedIn type for suppliers created');
    }

    private function createFacebookContacts(int $facebook_id)
    {
        for ($id = 0; $id < $this->suppliers->count(); $id++)
            Contact::create([
                'description' => 'https://www.facebook.com/' . strtolower(str_replace(' ', '.', $this->suppliers[$id]->fantasy_name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $facebook_id,
                'id_supplier' => $this->suppliers[$id]->id,
                'id_customer' => null,
            ]);

        $this->command->info($this->suppliers->count() . ' contacts of Facebook type for suppliers created');
    }

    private function createInstagramContacts(int $facebook_id)
    {
        for ($id = 0; $id < $this->suppliers->count(); $id++)
            Contact::create([
                'description' => 'https://www.instagram.com/' . strtolower(str_replace(' ', '.', $this->suppliers[$id]->fantasy_name)),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $facebook_id,
                'id_supplier' => $this->suppliers[$id]->id,
                'id_customer' => null,
            ]);

        $this->command->info($this->suppliers->count() . ' contacts of Instagram type for suppliers created');
    }
}
