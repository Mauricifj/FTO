<?php

use App\Product;
use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    private $user_id;

    public function run()
    {
        $this->user_id = User::all()->first()->id;

        $eletronic = Refference::all()->where('acronym', 'eletronic')->first();
        $scott_eletronics_cnpj = '00959046000132';
        $eletronic_product_names = ['905 SMA Ceramic Nose', 'Cabo RJ45', 'Fibra ótica', 'Heatshrink tube'];
        $this->createProducts($eletronic->id, $scott_eletronics_cnpj, $eletronic_product_names);

        $cellphone = Refference::all()->where('acronym', 'cellphone')->first();
        $motorola_cnpj = '10652730000120';
        $cellphone_product_names = ['Moto G8 Plus', 'Motorola One', 'Motorola Razr', 'Moto X'];
        $this->createProducts($cellphone->id, $motorola_cnpj, $cellphone_product_names);

        $printer = Refference::all()->where('acronym', 'printer')->first();
        $multilaser_cnpj = '59717553000102';
        $printer_product_names = ['Papel fotográfico', 'Refil de tinta', 'Cartucho toner', 'Papel A4 comum'];
        $this->createProducts($printer->id, $multilaser_cnpj, $printer_product_names);

        $car = Refference::all()->where('acronym', 'car')->first();
        $chevrolet_cnpj = '59275792003175';
        $car_product_names = ['Celta', 'Agile', 'Montana', 'Spin'];
        $this->createProducts($car->id, $chevrolet_cnpj, $car_product_names);

        $laptop = Refference::all()->where('acronym', 'laptop')->first();
        $positivo_cnpj = '81243735000148';
        $laptop_product_names = ['Notebook gamer', 'Notebook básico', 'Notebook ultrafino', 'Ultrabook'];
        $this->createProducts($laptop->id, $positivo_cnpj, $laptop_product_names);

        $router = Refference::all()->where('acronym', 'router')->first();
        $dlink_cnpj = '04677565000320';
        $router_product_names = ['DIR-X6060', 'DWR-910', 'DSL-2740E', 'DIR-615'];
        $this->createProducts($router->id, $dlink_cnpj, $router_product_names);

        $this->command->info('Products created');
    }

    private function createProducts(int $refference_id, string $cnpj, array $product_names)
    {
        $supplier_id = Supplier::all()->where('cnpj', $cnpj)->first()->id;

        for ($i = 0; $i < count($product_names); $i++) {
            $product = Product::create([
                'class' => 'product',
                'description' => $product_names[$i],
                'measurement_unit' => 'unidades',
                'cost' => rand(1000, 1800),
                'price' => rand(1850, 2000),
                'minimum_quantity' => rand(1000, 1500),
                'quantity' => rand(2000, 3000),
                'extra' => '',
                'id_user' => $this->user_id,
                'id_refference' => $refference_id,
            ]);
            $product->suppliers()->attach([
                1 => [
                    'id_supplier' => $supplier_id,
                    'id_product' => $product->id
                ],
            ]);
        }
    }
}