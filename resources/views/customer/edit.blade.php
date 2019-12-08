@extends('layouts.app')
@section('title','Editar cliente')
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
    <form method="post" action="/customer/{{$customer->id}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}">
        </div>
        <div class="form-group">
            <label for="gender">Sexo</label>
            <select name="gender" class="form-control" id="gender">
                <option value="m" {{ ($customer->gender == 'm') ? 'selected' : '' }}>Masculino</option>
                <option value="f" {{ ($customer->gender == 'f') ? 'selected' : '' }}>Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="birthdate">Data de nascimento</label>
            <input type="date" class="form-control" name="birthdate" id="birthdate" min="1900-01-01"
                   max="<?= date('Y-m-d');?>" value="{{ $customer->birthdate }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $customer->cpf }}">
        </div>
        <div class="form-group">
            <label for="id_refference">Estado</label>
            <select name="id_refference" class="form-control" id="id_refference" onchange="refference_changed()">
                <option value="">Selecione...</option>
                @foreach($states as $state)
                    <option value="{{$state->id}}" {{ ($state->id == $customer->refference->id) ? 'selected' : '' }}>
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
                            id="{{$city->id . "_" . $city->refference->id}}"
                            {{ ($city->id == $customer->city->id) ? 'selected' : '' }}>
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
                            id="{{$district->id . "_" . $district->city->id}}"
                            {{ ($district->id == $customer->district->id) ? 'selected' : '' }}>
                        {{$district->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="address">Rua</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $customer->address }}">
        </div>
        <div class="form-group">
            <label for="number">Número</label>
            <input type="text" class="form-control" name="number" id="number" value="{{ $customer->number }}">
        </div>
        <div class="form-group">
            <label for="complement">Complemento</label>
            <input type="text" class="form-control" name="complement" id="complement"
                   value="{{ $customer->complement }}">
        </div>
        <div class="form-group">
            <label for="zipcode">CEP</label>
            <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{ $customer->zipcode }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $customer->extra }}">
        </div>
        <a href="/customer" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Alterar <i class="fas fa-plus"></i>
        </button>
    </form>


@endsection

@section('scripts')
    <script>
        function refference_changed() {
            var id_refference = $('#id_refference').val();

            $('#id_city').get(0).selectedIndex = 0;

            $('#div_city').show();

            var select_options = $('#id_city').children();

            for (var i = 1; i < select_options.length; i++) {
                if (!select_options.get(i).id.endsWith('_' + id_refference)) {
                    $('#' + select_options.get(i).id).hide();
                } else {
                    $('#' + select_options.get(i).id).show();
                }
            }
        }

        function city_changed() {
            var id_city = $('#id_city').val();

            $('#div_district').show();

            $('#id_district').get(0).selectedIndex = 0;

            var select_options = $('#id_district').children();

            for (var i = 1; i < select_options.length; i++) {
                if (!select_options.get(i).id.endsWith('_' + id_city)) {
                    $('#' + select_options.get(i).id).hide();
                } else {
                    $('#' + select_options.get(i).id).show();
                }
            }
        }
    </script>
@endsection