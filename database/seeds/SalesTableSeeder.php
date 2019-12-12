<?php

use App\Customer;
use App\Item;
use App\Product;
use App\Refference;
use App\Sale;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    private $user_id;

    public function run()
    {
        $this->user_id = User::all()->first()->id;

        $situations = ['canceled', 'not_paid', 'awaiting_payment', 'paid'];
        $conditions = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

        for ($i = 1; $i <= 100; $i++) {
            $invoice = uniqid('invoice_');

            $products = [
                1 => Product::find(rand(1, 6)),
                2 => Product::find(rand(7, 12)),
                3 => Product::find(rand(13, 18)),
                4 => Product::find(rand(19, 24)),
            ];

            $total = 0;

            foreach ($products as $product) {
                $total += $product->price;
            }

            $credit = Refference::find(29);

            $sale = Sale::create([
                'created_at' => Carbon::now()->subMonths(3)->day(rand(1, 28)),
                'invoice' => $invoice,
                'description' => 'Sale_' . uniqid(),
                'type' => 'sale',
                'situation' => $situations[rand(0, 3)],
                'condition' => $conditions[rand(0, 9)],
                'ended_at' => null,
                'amount' => $total,
                'discount' => 0,
                'total' => $total,
                'id_user' => $this->user_id,
                'id_refference' => $credit->id,
                'id_customer' => Customer::all()->first()->id,
            ]);

            foreach ($products as $product) {
                $quantity = 50;
                Item::create([
                    'id_product' => $product->id,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'total' => $product->price * $quantity,
                    'description' => $product->description,
                    'id_sale' => $sale->id
                ]);

                $product->quantity -= $quantity;

                $product->save();
            }
        }
        $this->command->info('Sales of 3 months ago created');

        for ($i = 1; $i <= 50; $i++) {
            $invoice = uniqid('invoice_');

            $products = [
                1 => Product::find(rand(1, 6)),
                2 => Product::find(rand(7, 12)),
                3 => Product::find(rand(13, 18)),
                4 => Product::find(rand(19, 24)),
            ];

            $total = 0;

            foreach ($products as $product) {
                $total += $product->price;
            }

            $credit = Refference::find(29);

            $sale = Sale::create([
                'created_at' => Carbon::now()->subMonths(2)->day(rand(1, 28)),
                    'invoice' => $invoice,
                'description' => 'Sale_' . uniqid(),
                'type' => 'sale',
                'situation' => $situations[rand(0, 3)],
                'condition' => $conditions[rand(0, 9)],
                'ended_at' => null,
                'amount' => $total,
                'discount' => 0,
                'total' => $total,
                'id_user' => $this->user_id,
                'id_refference' => $credit->id,
                'id_customer' => Customer::all()->first()->id,
            ]);

            foreach ($products as $product) {
                $quantity = 20;
                Item::create([
                    'id_product' => $product->id,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'total' => $product->price * $quantity,
                    'description' => $product->description,
                    'id_sale' => $sale->id
                ]);

                $product->quantity -= $quantity;

                $product->save();
            }
        }
        $this->command->info('Sales of 2 months ago created');

        for ($i = 1; $i <= 350; $i++) {
            $invoice = uniqid('invoice_');

            $products = [
                1 => Product::find(rand(1, 6)),
                2 => Product::find(rand(7, 12)),
                3 => Product::find(rand(13, 18)),
                4 => Product::find(rand(19, 24)),
            ];

            $total = 0;

            foreach ($products as $product) {
                $total += $product->price;
            }

            $credit = Refference::find(29);

            $sale = Sale::create([
                'created_at' => Carbon::now()->subMonths(1)->day(rand(1, 28)),
                'invoice' => $invoice,
                'description' => 'Sale_' . uniqid(),
                'type' => 'sale',
                'situation' => $situations[rand(0, 3)],
                'condition' => $conditions[rand(0, 9)],
                'ended_at' => null,
                'amount' => $total,
                'discount' => 0,
                'total' => $total,
                'id_user' => $this->user_id,
                'id_refference' => $credit->id,
                'id_customer' => Customer::all()->first()->id,
            ]);

            foreach ($products as $product) {
                $quantity = 3;
                Item::create([
                    'id_product' => $product->id,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'total' => $product->price * $quantity,
                    'description' => $product->description,
                    'id_sale' => $sale->id
                ]);

                $product->quantity -= $quantity;

                $product->save();
            }
        }
        $this->command->info('Sales of 1 month ago created');

        for ($i = 1; $i <= 200; $i++) {
            $invoice = uniqid('invoice_');

            $products = [
                1 => Product::find(rand(1, 6)),
                2 => Product::find(rand(7, 12)),
                3 => Product::find(rand(13, 18)),
                4 => Product::find(rand(19, 24)),
            ];

            $total = 0;

            foreach ($products as $product) {
                $total += $product->price;
            }

            $credit = Refference::find(29);

            $sale = Sale::create([
                'created_at' => Carbon::now(),
                'invoice' => $invoice,
                'description' => 'Sale_' . uniqid(),
                'type' => 'sale',
                'situation' => $situations[rand(0, 3)],
                'condition' => $conditions[rand(0, 9)],
                'ended_at' => null,
                'amount' => $total,
                'discount' => 0,
                'total' => $total,
                'id_user' => $this->user_id,
                'id_refference' => $credit->id,
                'id_customer' => Customer::all()->first()->id,
            ]);

            foreach ($products as $product) {
                $quantity = 10;
                Item::create([
                    'id_product' => $product->id,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'total' => $product->price * $quantity,
                    'description' => $product->description,
                    'id_sale' => $sale->id
                ]);

                $product->quantity -= $quantity;

                $product->save();
            }
        }

        $this->command->info('Sales of this month created');
    }
}
