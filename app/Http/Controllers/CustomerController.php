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
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('customer.index', compact('customers', 'user', 'message', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refferences = Refference::all()->where('type', 'estado');
        $cities = City::all();
        $districts = District::all();
        return view ('customer.create', compact('refferences', 'cities', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $request['id_user'] = $request->user()->id;
//        dd($request->all());
        $customer = Customer::create($request->all());

        if ($customer != null) {
            $request->session()->flash('message', "{$customer->name} adicionado(a) com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar {$customer->name}.");

        return redirect('customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $refferences = Refference::all()->where('type', 'estado');
        $cities = City::all();
        $districts = District::all();
        return view ('customer.edit', compact('customer', 'refferences', 'cities', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerRequest $request
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        if ($customer->update($request->all()))
            $request->session()->flash('message', "{$customer->name} alterado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar {$customer->name}.");

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customer $customer)
    {
        if (Customer::destroy($customer->id))
            $request->session()->flash('message', "{$customer->name} excluído(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir {$customer->name}.");

        return redirect('customer');
    }
}
