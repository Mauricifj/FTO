<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use App\Receipt;
use App\District;
use App\Http\Requests\ReceiptRequest;
use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $receipts = Receipt::all();

        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('receipt.index', compact('receipts', 'user', 'message', 'error'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view ('receipt.create', compact('products', 'suppliers'));
    }

    public function store(ReceiptRequest $request)
    {
        $request['id_user'] = $request->user()->id;

        $request['invoice'] = uniqid('invoice_');

        $receipt = Receipt::create($request->all());

        if ($receipt != null) {

            foreach ($request['products'] as $product) {
                $prod = Product::find($product['id']);

                Item::create([
                    'id_product' => $prod->id,
                    'quantity' => $product['quantity'],
                    'description' => $prod->description,
                    'id_receipt' => $receipt->id
                ]);
            }

            $this->updateProductsQuantity($request['products']);

            $request->session()->flash('message', "{$receipt->invoice} adicionado com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('receipt');
    }

    public function show(Receipt $receipt)
    {
        $index = 0;
        return view ('receipt.show', compact('receipt', 'index'));
    }

//    public function edit(Receipt $receipt)
//    {
//        return view ('receipt.edit', compact('receipt'));
//    }

//    public function update(ReceiptRequest $request, Receipt $receipt)
//    {
//        if ($receipt->update($request->all()))
//            $request->session()->flash('message', "{$receipt->invoice} alterado com sucesso.");
//        else
//            $request->session()->flash('error', "Não foi possível alterar.");
//
//        return redirect('receipt');
//    }

    public function destroy(Request $request, Receipt $receipt)
    {
        $receipt->situation = 'canceled';
        $receipt->save();

        foreach ($receipt->items as $item) {
            $product = Product::find($item->product->id);

            $product->quantity -= $item->quantity;

            $product->save();
        }

        return redirect('receipt');
    }

    private function updateProductsQuantity(array $products)
    {
        foreach ($products as $product)
        {
            $prod = Product::find($product['id']);

            $prod->quantity += $product['quantity'];

            $prod->save();
        }
    }
}
