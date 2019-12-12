@extends('layouts.app')
@section('title','Vendas')
@section('content')
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif

    @if(!empty($error))
        <div class="alert alert-danger">{{$error}}</div>
    @endif

    @if(!empty($minimum_warnings))
        <div class="alert alert-danger">
            @foreach($minimum_warnings as $minimum_warning)
                <li>{{$minimum_warning}}</li>
            @endforeach
        </div>
    @endif

    <div class="d-flex justify-content-between">
        <a href="/" class="btn btn-outline-info mb-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <a href="sale/create" class="btn btn-outline-primary mb-2">
            Adicionar <i class="fas fa-plus"></i>
        </a>
    </div>
    <ul class="list-group">
        @if(sizeof($sales) != 0)
            @foreach($sales as $sale)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $sale->invoice }}
                            @foreach($situations as $situation)
                                @if ($situation->value == $sale->situation)
                                    <span class="badge badge-pill badge-{{ $situation->badge }}"> {{ $situation->description }} </span>
                                @endif
                            @endforeach
                    </span>
                    @if (($user->isAdmin() || $user->isManager()) && $sale->situation != 'canceled')
                        <span class="d-flex">
                            <a href="/sale/{{ $sale->id }}" class="btn btn-outline-info btn-sm mr-1">
                                Ver mais <i class="fas fa-external-link-alt"></i>
                            </a>
                            <a href="/sale/{{ $sale->id }}/edit" class="btn btn-outline-warning btn-sm mr-1">
                                Editar <i class="fas fa-edit"></i>
                            </a>
                            <form method="post" action="/sale/{{ $sale->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($sale->invoice) }}?')">
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
                <span>Nenhuma venda cadastrada</span>
            </li>
        @endif
    </ul>
@endsection