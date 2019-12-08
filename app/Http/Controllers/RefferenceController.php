<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefferenceRequest;
use App\ReferenceType;
use App\Refference;
use App\User;
use Illuminate\Http\Request;

class RefferenceController extends Controller
{
    public function index(Request $request)
    {
        $queryString = $request->query('type');
        if ($queryString != null)
            $refferences = Refference::all()->where('type', $queryString);
        else
            $refferences = Refference::all();

        $types = ReferenceType::allTypes();

        $user = User::find(auth()->user()->getAuthIdentifier());

        $message = $request->session()->get('message');
        $error = $request->session()->get('error');

        return view('refference.index', compact('refferences', 'user', 'types', 'message', 'error', 'queryString'));
    }

    public function create(Request $request)
    {
        $types = ReferenceType::allTypes();
        return view ('refference.create', compact('types'));
    }

    public function store(RefferenceRequest $request)
    {
        $request['id_user'] = auth()->user()->getAuthIdentifier();
        $refference = Refference::create($request->all());

        if ($refference != null)
            $request->session()->flash('message', "{$refference->description} adicionado(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível adicionar.");

        return redirect('refference?type=' . $request->type);
    }

    public function edit(Refference $refference)
    {
        $types = ReferenceType::allTypes();
        return view('refference.edit', compact('refference', 'types'));
    }

    public function update(RefferenceRequest $request, Refference $refference)
    {
        $refference->update($request->all());
        return redirect('refference'); 
    }

    public function destroy(Request $request, Refference $refference)
    {
        if (Refference::destroy($refference->id))
            $request->session()->flash('message', "{$refference->description} excluído(a) com sucesso.");
        else
            $request->session()->flash('error', "Não foi possível excluir.");

        return redirect('refference');
    }
}
