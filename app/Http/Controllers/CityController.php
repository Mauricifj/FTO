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
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('city.index', compact('cities', 'user', 'message', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refferences = Refference::all()->where('type', 'estado');
        return view ('city.create', compact('refferences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $request['id_user'] = $request->user()->id;
        $city = City::create($request->all());

        if ($city != null) {
            $district = new District();
            $district->name = 'Centro';
            $district->id_city = $city->id;
            $district->id_user = $request->user()->id;
            $district->save();
            $request->session()->flash('message', "{$city->name} adicionada com sucesso.");
        } else
            $request->session()->flash('error', "Não foi possível adicionar {$city->name}.");

        return redirect('city');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $refferences = Refference::all()->where('type', 'estado');
        return view ('city.edit', compact('city', 'refferences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        if ($city->update($request->all()))
            $request->session()->flash('message', "{$city->name} alterada com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível alterar {$city->name}.");

        return redirect('city'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {
        if (City::destroy($city->id))
            $request->session()->flash('message', "{$city->name} excluída com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir {$city->name}.");

        return redirect('city');
    }
}
