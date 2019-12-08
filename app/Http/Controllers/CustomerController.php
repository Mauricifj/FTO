<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\District;
use App\Http\Requests\CustomerRequest;
use App\Refference;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('customer.index', compact('customers', 'user', 'message', 'error'));
    }

    public function create()
    {
        $states = Refference::all()->where('type', 'state');
        $cities = City::all();
        $districts = District::all();
        return view ('customer.create', compact('states', 'cities', 'districts'));
    }

    public function store(CustomerRequest $request)
    {
        $request['id_user'] = $request->user()->id;
        $customer = Customer::create($request->all());

        if ($customer != null) {
            $request->session()->flash('message', "{$customer->name} adicionado(a) com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar {$customer->name}.");

        return redirect('customer');
    }

    public function edit(Customer $customer)
    {
        $states = Refference::all()->where('type', 'state');
        $cities = City::all();
        $districts = District::all();
        return view ('customer.edit', compact('customer', 'states', 'cities', 'districts'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        if ($customer->update($request->all()))
            $request->session()->flash('message', "{$customer->name} alterado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar {$customer->name}.");

        return redirect('customer');
    }

    public function destroy(Request $request, Customer $customer)
    {
        if (Customer::destroy($customer->id))
            $request->session()->flash('message', "{$customer->name} excluído(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir {$customer->name}.");

        return redirect('customer');
    }
}
