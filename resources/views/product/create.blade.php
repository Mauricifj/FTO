@extends('layouts.app')
@section('title','Novo produto')
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

    <form method="post" action="/product">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="measurement_unit">Unidade de medida</label>
            <input type="text" class="form-control" name="measurement_unit" id="measurement_unit">
        </div>
        <div class="form-group">
            <label for="cost">Valor de custo</label>
            <input type="text" class="form-control" name="cost" id="cost">
        </div>
        <div class="form-group">
            <label for="price">Valor de venda</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="text" class="form-control" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="minimum_quantity">Quantidade mínima de estoque</label>
            <input type="text" class="form-control" name="minimum_quantity" id="minimum_quantity">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra">
        </div>
        <div class="form-group">
            <label for="class">Classe</label>
            <select name="class" class="form-control" id="class">
                <option value="">Selecione...</option>
                @foreach($classes as $class)
                    <option value="{{$class->value}}">{{$class->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_refference">Tipo</label>
            <select name="id_refference" class="form-control" id="id_refference">
                <option value="">Selecione...</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_supplier">Fornecedor</label>
            <select name="id_supplier" class="form-control" id="id_supplier">
                <option value="">Selecione...</option>
                @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->company_name}} ({{ $supplier->fantasy_name }})</option>
                @endforeach
            </select>
        </div>
        <a href="/product" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Adicionar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection