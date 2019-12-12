<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = contact::all();

        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('contact.index', compact('contacts', 'user', 'message', 'error'));
    }

    public function create()
    {
        return view ('contact.create');
    }

    public function store(ContactRequest $request)
    {
        $request['id_user'] = $request->user()->id;
        Contact::create($request->all());
        return redirect('contact');
    }

    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect('contact'); 
    }

    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect('contact.index');
    }
}
