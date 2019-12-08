<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Http\Requests\CityRequest;
use App\Refference;
use App\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('city.index', compact('cities', 'user', 'message', 'error'));
    }

    public function create()
    {
        $refferences = Refference::all()->where('type', 'state');
        return view ('city.create', compact('refferences'));
    }

    public function store(CityRequest $request)
    {
        $request['id_user'] = $request->user()->id;
        $city = City::create($request->all());

        if ($city != null) {
            District::create([
                'name' => 'Centro',
                'id_city' => $city->id,
                'id_user' => $request->user()->id
            ]);
            $request->session()->flash('message', "{$city->name} adicionada com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('city');
    }

    public function edit(City $city)
    {
        $states = Refference::all()->where('type', 'state');
        return view ('city.edit', compact('city', 'states'));
    }

    public function update(CityRequest $request, City $city)
    {
        if ($city->update($request->all()))
            $request->session()->flash('message', "{$city->name} alterada com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar.");

        return redirect('city'); 
    }

    public function destroy(Request $request, City $city)
    {
        if (City::destroy($city->id))
            $request->session()->flash('message', "{$city->name} excluída com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir.");

        return redirect('city');
    }
}
