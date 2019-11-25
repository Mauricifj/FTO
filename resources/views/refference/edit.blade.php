@extends('layouts.app')
@section('title','Editar referência')
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
    <form method="post" action="/refference/{{ $refference->id }}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $refference->description }}">
        </div>
        <div class="form-group">
            <label for="acronym">Sigla</label>
            <input type="text" class="form-control" name="acronym" id="acronym" value="{{ $refference->acronym }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $refference->extra }}">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" class="form-control" id="type">
                <option value="">Selecione...</option>
                @foreach($types as $type => $value)
                    <option value="{{$type}}" {{ ($type == $refference->type) ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <a href="/refference" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Alterar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection