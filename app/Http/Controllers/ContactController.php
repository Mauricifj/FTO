<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

//////////////////////////////////////////////////////////////////
//  Name:   ContactController (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   04/11/2019
//
//  Functions:
//    Name    : Description
//    index   : Get all registered contacts and pass them to view
//    create  :
//    store   :
//    show    :
//    edit    :
//    update  :
//    destroy :
//
//////////////////////////////////////////////////////////////////
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all registered contacts and pass them to view
        $contacts = contact::all();
        return view('contact.index')->with('contacts',$contacts);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Aluno::create($request->all());
        return redirect('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit')->with('contact',$contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect('contact'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
