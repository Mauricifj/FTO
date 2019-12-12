@extends('layouts.app')
@section('title','Recibos')
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
        <a href="receipt/create" class="btn btn-outline-primary mb-2">
            Adicionar <i class="fas fa-plus"></i>
        </a>
    </div>
    <ul class="list-group">
        @if(sizeof($receipts) != 0)
            @foreach($receipts as $receipt)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $receipt->invoice }}
                            @if ($receipt->situation == 'canceled')
                                <span class="badge badge-pill badge-danger"> Cancelado </span>
                            @endif
                    </span>
                    @if (($user->isAdmin() || $user->isManager()) && $receipt->situation != 'canceled')
                        <span class="d-flex">
                            <a href="/receipt/{{ $receipt->id }}" class="btn btn-outline-info btn-sm mr-1">
                                Ver mais <i class="fas fa-external-link-alt"></i>
                            </a>
                            <form method="post" action="/receipt/{{ $receipt->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($receipt->invoice) }}?')">
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
                <span>Nenhum recibo cadastrado</span>
            </li>
        @endif
    </ul>
@endsection