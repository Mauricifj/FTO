@extends('layouts.app')
@section('title','Editar Fornecedor')
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
    <form method="post" action="/supplier/{{ $supplier->id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="company_name">Razão social</label>
            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $supplier->company_name }}">
        </div>
        <div class="form-group">
            <label for="fantasy_name">Nome fantasia</label>
            <input type="text" class="form-control" name="fantasy_name" id="fantasy_name" value="{{ $supplier->fantasy_name }}">
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $supplier->cnpj }}">
        </div>
        <div class="form-group">
            <label for="id_refference">Estado</label>
            <select name="id_refference" class="form-control" id="id_refference" onchange="state_changed()">
                <option value="">Selecione...</option>
                @foreach($states as $state)
                    <option value="{{$state->id}}" {{ ($state->id == $supplier->refference->id) ? 'selected' : '' }}>
                        {{$state->description}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="div_city">
            <label for="id_city">Cidade</label>
            <select name="id_city" class="form-control" id="id_city" onchange="city_changed()">
                <option value="">Selecione...</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}"
                            id="city{{$city->id . "_" . $city->refference->id}}"
                            {{ ($city->id == $supplier->city->id) ? 'selected' : '' }}>
                        {{$city->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="div_district">
            <label for="id_district">Bairro</label>
            <select name="id_district" class="form-control" id="id_district">
                <option value="">Selecione...</option>
                @foreach($districts as $district)
                    <option value="{{$district->id}}"
                            id="district{{$district->id . "_" . $district->city->id}}"
                            {{ ($district->id == $supplier->district->id) ? 'selected' : '' }}>
                        {{$district->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $supplier->address }}">
        </div>
        <div class="form-group">
            <label for="number">Número</label>
            <input type="text" class="form-control" name="number" id="number" value="{{ $supplier->number }}">
        </div>
        <div class="form-group">
            <label for="complement">Complemento</label>
            <input type="text" class="form-control" name="complement" id="complement" value="{{ $supplier->complement }}">
        </div>
        <div class="form-group">
            <label for="zipcode">CEP</label>
            <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{ $supplier->zipcode }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $supplier->extra }}">
        </div>
        <a href="/supplier" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Alterar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection

@section('scripts')
    <script>
        function state_changed() {
            var id_state = $('#id_refference').val();

            var cities = $('#id_city');

            cities.get(0).selectedIndex = 0;

            $('#div_city').show();

            var options = cities.children();

            for (var i = 1; i < options.length; i++) {
                if (!options.get(i).id.endsWith('_' + id_state)) {
                    $('#' + options.get(i).id).hide();
                } else {
                    $('#' + options.get(i).id).show();
                }
            }
        }

        function city_changed() {
            var id_city = $('#id_city').val();

            var districts = $('#id_district');

            $('#div_district').show();

            districts.get(0).selectedIndex = 0;

            var options = districts.children();

            for (var i = 1; i < options.length; i++) {
                if (!options.get(i).id.endsWith('_' + id_city)) {
                    $('#' + options.get(i).id).hide();
                } else {
                    $('#' + options.get(i).id).show();
                }
            }
        }
    </script>
@endsection