<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        DB::table('products')->truncate();
        DB::table('receipts')->truncate();
        DB::table('product_receipt')->truncate();

        DB::table('sales')->truncate();
        DB::table('reports')->truncate();

        DB::table('contacts')->truncate();
        DB::table('customers')->truncate();
        DB::table('suppliers')->truncate();

        DB::table('districts')->truncate();
        DB::table('cities')->truncate();

        DB::table('refferences')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(UsersTableSeeder::class);

        $this->call(States_RefferenceTableSeeder::class);

        $this->call(CitiesTableSeeder::class);

        $this->call(DistrictsTableSeeder::class);

        $this->call(PaymentMethod_RefferenceTableSeeder::class);

        $this->call(ContactTypes_RefferenceTableSeeder::class);

        $this->call(CustomersTableSeeder::class);

        $this->call(SuppliersTableSeeder::class);

        $this->call(Customers_ContactsTableSeeder::class);

        $this->call(Suppliers_ContactsTableSeeder::class);

        $this->call(Type_RefferenceTableSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(SalesTableSeeder::class);
    }
}