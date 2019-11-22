<?php

namespace App\Http\Controllers;

use App\Refference;
use Illuminate\Http\Request;

//////////////////////////////////////////////////////////////////
//  Name:   RefferenceController (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   04/11/2019
//
//  Functions:
//    Name    : Description
//    index   : Get all registered refferences and pass them to view
//    create  :
//    store   :
//    show    :
//    edit    :
//    update  :
//    destroy :
//
//////////////////////////////////////////////////////////////////
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
        return view('refference.index')->with('refferences',$refferences);
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
        $refference->id_user = auth()->user()->id;
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
        return view('refference.edit')->with('refference',$refference);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refference  $refference
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
     * @param  \App\Refference  $refference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refference $refference)
    {
        //
    }
}
