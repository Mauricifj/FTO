<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use App\Http\Requests\SaleRequest;
use App\Refference;
use App\Item;
use App\SaleSituation;
use App\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $sales = Sale::all();

        $user = User::find(auth()->user()->getAuthIdentifier());

        $situations = SaleSituation::allTypes();

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');
        $minimum_warnings = $request->session()->get('minimum_warnings');

        return view('sale.index', compact('sales', 'user', 'message', 'error', 'minimum_warnings', 'situations'));
    }

    public function create()
    {
        $situations = SaleSituation::allTypes();
        $products = Product::all();
        $customers = Customer::all();
        $payment_methods = Refference::all()->where('type', 'payment_method');
        return view('sale.create', compact('payment_methods', 'products', 'customers', 'situations'));
    }

    public function store(SaleRequest $request)
    {
        $request['id_user'] = $request->user()->id;

        $request['invoice'] = uniqid('invoice_');

        if ($request['discount'] == null) $request['discount'] = 0;

        $sale = Sale::create($request->all());

        if ($sale != null) {

            foreach ($request['products'] as $product) {
                $sale->products()->attach($product['id']);

                $prod = Product::find($product['id']);

                Item::create([
                    'id_product' => $prod->id,
                    'price' => $prod->price,
                    'quantity' => $product['quantity'],
                    'total' => $prod->price * $product['quantity'],
                    'description' => $prod->description,
                    'id_sale' => $sale->id
                ]);
            }

            $minimum_warnings = $this->updateProductsQuantity($request['products']);

            if ($minimum_warnings != null)
                $request->session()->flash('minimum_warnings', $minimum_warnings);

            $request->session()->flash('message', "{$sale->invoice} adicionada com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('sale');
    }

    public function show(Sale $sale)
    {
        $index = 0;
        $situations = SaleSituation::allTypes();
        return view ('sale.show', compact('sale', 'situations', 'index'));
    }

    public function edit(Sale $sale)
    {
        $index = 0;
        $situations = SaleSituation::allTypes();
        $products = Product::all();
        $customers = Customer::all();
        $payment_methods = Refference::all()->where('type', 'payment_method');
        return view('sale.edit', compact('sale', 'payment_methods', 'situations', 'customers', 'products', 'index'));
    }

    public function update(SaleRequest $request, Sale $sale)
    {
        if ($sale->update($request->all()))
            $request->session()->flash('message', "{$sale->invoice} alterada com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar.");

        return redirect('sale');
    }

    public function destroy(Request $request, Sale $sale)
    {
        $sale->situation = 'canceled';
        $sale->save();

        if ($sale->type == 'sale')
            foreach ($sale->items as $item) {
                $product = Product::find($item->product->id);

                $product->quantity += $item->quantity;

                $product->save();
            }

        return redirect('sale');
    }

    private function updateProductsQuantity(array $products)
    {
        $minimum_warnings = array();
        foreach ($products as $product)
        {
            $prod = Product::find($product['id']);

            $prod->quantity -= $product['quantity'];

            $prod->save();

            if ($prod->quantity <= $prod->minimum_quantity) {
                array_push($minimum_warnings, $prod->description . " atingiu a quantidade mínima.");
            }
        }
        if (sizeof($minimum_warnings) != 0)
            return $minimum_warnings;
        return null;
    }
}
