<?php

namespace App\Http\Controllers;

use App\City;
use App\Contact;
use App\District;
use App\Http\Requests\SupplierRequest;
use App\Refference;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = supplier::all();

        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('supplier.index', compact('suppliers', 'user', 'message', 'error'));
    }

    public function create()
    {
        $states = Refference::all()->where('type', 'state');
        $cities = City::all();
        $districts = District::all();

        return view ('supplier.create', compact('states', 'cities', 'districts'));
    }

    public function store(SupplierRequest $request)
    {
        $request['id_user'] = auth()->user()->getAuthIdentifier();
        $supplier = Supplier::create($request->all());

        if ($supplier != null)
            $request->session()->flash('message', "{$supplier->company_name} adicionado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('supplier');
    }

    public function show(Supplier $supplier)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());

        return view ('supplier.show', compact('supplier', 'user'));
    }

    public function edit(Supplier $supplier)
    {
        $states = Refference::all()->where('type', 'state');
        $cities = City::all();
        $districts = District::all();

        return view ('supplier.edit', compact('supplier', 'states', 'cities', 'districts'));
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        if ($supplier->update($request->all()))
            $request->session()->flash('message', "{$supplier->company_name} alterado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar.");

        return redirect('supplier');
    }

    public function destroy(Request $request, Supplier $supplier)
    {
        if (Supplier::destroy($supplier->id))
            $request->session()->flash('message', "{$supplier->company_name} excluído(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir.");

        return redirect('supplier');
    }
}
