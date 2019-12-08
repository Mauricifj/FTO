@extends('layouts.app')
@section('title','Editar Cidade')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-1">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/city/{{$city->id}}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $city->name }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $city->extra }}">
        </div>
        <div class="form-group">
            <label for="id_refference">Referência</label>
            <select name="id_refference" class="form-control" id="id_refference">
                <option value="">Selecione...</option>
                @foreach($states as $state)
                    <option value="{{$state->id}}" {{ ($city->id_refference == $state->id) ? 'selected' : '' }}>{{$state->description}}</option>
                @endforeach
            </select>
        </div>
        <a href="/city" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Alterar <i class="fas fa-plus"></i>
        </button>
    </form>

    </form>
@endsection