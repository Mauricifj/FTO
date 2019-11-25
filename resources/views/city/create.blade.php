@extends('layouts.app')
@section('title','Nova Cidade')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-1">
                @foreach($errors->all() as $error)
                    @if (str_contains($error, "referência"))
                        <li>O campo estado é obrigatório</li>
                    @else
                        <li>{{$error}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/city">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra">
        </div>
        <div class="form-group">
            <label for="id_refference">Estado</label>
            <select name="id_refference" class="form-control" id="id_refference">
                <option value="">Selecione...</option>
                @foreach($refferences as $refference)
                    <option value="{{$refference->id}}">{{$refference->description}}</option>
                @endforeach
            </select>
        </div>
        <a href="/city" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Adicionar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection