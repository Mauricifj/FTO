<?php

namespace App\Http\Controllers;

use App\Refference;
use App\User;
use Illuminate\Http\Request;

class RefferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refferences = refference::all();
        $user = User::find(auth()->user()->getAuthIdentifier());
        return view('refference.index', compact('refferences', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ['estado' => 'Estado', 'forma_pagamento' => 'Forma de pagamento', 'forma_contato' => 'Forma de contato', 'forma_relatorio' => 'Forma de relatório'];
        return view ('refference.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refference = new Refference($request->all());
        $refference->id_user = $request->user()->id;
        $refference->save();

        return redirect('refference');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refference  $refference
     * @return \Illuminate\Http\Response
     */
    public function show(Refference $refference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refference  $refference
     * @return \Illuminate\Http\Response
     */
    public function edit(Refference $refference)
    {
        $types = ['estado' => 'Estado', 'forma_pagamento' => 'Forma de pagamento', 'forma_contato' => 'Forma de contato', 'forma_relatorio' => 'Forma de relatório'];
        return view('refference.edit', compact('refference', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Refference $refference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refference $refference)
    {
        $refference->update($request->all());
        return redirect('refference'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Refference::destroy($id);
        return redirect('refference');
    }
}
