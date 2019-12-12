<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Http\Requests\DistrictRequest;
use App\User;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $districts = District::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('district.index', compact('districts', 'user', 'message', 'error'));
    }

    public function create()
    {
        $cities = City::all();
        return view ('district.create', compact('cities'));
    }

    public function store(DistrictRequest $request)
    {
        $district = new District($request->all());
        $district->id_user = $request->user()->id;

        if ($district->save())
            $request->session()->flash('message', "{$district->name} adicionado com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível adicionar {$district->name}.");

        return redirect('district');
    }

    public function edit(District $district)
    {
        $cities = City::all();
        return view ('district.edit', compact('district', 'cities'));
    }

    public function update(DistrictRequest $request, District $district)
    {
        if ($district->update($request->all()))
            $request->session()->flash('message', "{$district->name} alterado com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar {$district->name}.");

        return redirect('district');
    }

    public function destroy(Request $request, District $district)
    {
        if (District::destroy($district->id))
            $request->session()->flash('message', "{$district->name} excluído com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir {$district->name}.");

        return redirect('district');
    }
}
