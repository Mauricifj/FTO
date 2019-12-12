<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductClass;
use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = product::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('product.index', compact('products', 'user', 'message', 'error'));
    }

    public function create()
    {
        $types = Refference::all()->where('type', 'type');

        $classes = ProductClass::allClasses();

        $suppliers = Supplier::all();

        return view ('product.create', compact('types', 'classes', 'suppliers'));
    }

    public function store(ProductRequest $request)
    {
        $request['id_user'] = auth()->user()->getAuthIdentifier();
        $product = Product::create($request->all());

        if ($product != null)
            $request->session()->flash('message', "{$product->description} adicionado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('product');
    }

    public function edit(Product $product)
    {
        $types = Refference::all()->where('type', 'type');

        $classes = ProductClass::allClasses();

        $suppliers = Supplier::all();

        return view('product.edit', compact('product', 'types', 'classes', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->update($request->all()))
            $request->session()->flash('message', "{$product->description} alterado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar.");

        return redirect('product'); 
    }

    public function destroy(Request $request, Product $product)
    {
        if (Product::destroy($product->id))
            $request->session()->flash('message', "{$product->description} excluído(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir.");

        return redirect('product');
    }
}
