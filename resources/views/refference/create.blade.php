@extends('layouts/app')
@section('title','Nova referência')
@section('content')
    <form method="post" action="/refference">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="acronym">Sigla</label>
            <input type="text" class="form-control" name="acronym" id="acronym">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" class="form-control" id="type">
                <option value="">Selecione...</option>
                @foreach($types as $type => $value)
                    <option value="{{$type}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <a href="/refference" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Adicionar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection