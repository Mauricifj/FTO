@extends('layouts.app')
@section('title','Editar bairro')
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
    <form method="post" action="/district/{{$district->id}}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $district->name }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $district->extra }}">
        </div>
        <div class="form-group">
            <label for="id_city">Cidade</label>
            <select name="id_city" class="form-control" id="id_city">
                <option value="">Selecione...</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}" {{ ($district->id_city == $city->id) ? 'selected' : '' }}>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <a href="/district" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Alterar <i class="fas fa-plus"></i>
        </button>
    </form>

    </form>
@endsection