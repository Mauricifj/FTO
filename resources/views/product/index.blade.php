@extends('layouts.app')
@section('title','Produtos')
@section('content')
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif

    @if(!empty($error))
        <div class="alert alert-danger">{{$error}}</div>
    @endif

    <div class="d-flex justify-content-between">
        <a href="/" class="btn btn-outline-info mb-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <a href="product/create" class="btn btn-outline-primary mb-2">
            Adicionar <i class="fas fa-plus"></i>
        </a>
    </div>
    <ul class="list-group">
        @if(sizeof($products) != 0)
            @foreach($products as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $product->description }} ({{ $product->refference->description }})</span>
                    @if ($user->isAdmin() || $user->isManager())
                        <span class="d-flex">
                    <a href="/product/{{ $product->id }}/edit" class="btn btn-outline-warning btn-sm mr-1">
                        Editar <i class="fas fa-edit"></i>
                    </a>
                    <form method="post" action="/product/{{ $product->id }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($product->description) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">
                            Excluir <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
                    @endif
                </li>
            @endforeach
        @else
            <li class="list-group-item text-center">
                <span>Nenhum produto cadastrado</span>
            </li>
        @endif
    </ul>
@endsection