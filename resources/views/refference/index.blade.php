<?php $title = 'Referência'; ?>

@foreach ($types as $type)
    @if($queryString == $type->value)
        <?php $title = $type->description; ?>
    @endif
@endforeach

@extends('layouts/app')
@section('title', $title)
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
        <a href="refference/create" class="btn btn-outline-primary mb-2">
            Adicionar <i class="fas fa-plus"></i>
        </a>
    </div>
    <ul class="list-group">
        @if (sizeof($refferences) != 0)
            @foreach($refferences as $refference)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $refference->description }}
                        @foreach($types as $type)
                            @if ($refference->type == $type->value)
                                ({{$type->description}})
                            @endif
                        @endforeach
                    </span>
                    @if ($user->isAdmin() || $user->isManager())
                        <span class="d-flex">
                    <a href="/refference/{{ $refference->id }}/edit" class="btn btn-outline-warning btn-sm mr-1">
                        Editar <i class="fas fa-edit"></i>
                    </a>
                    <form method="post" action="/refference/{{ $refference->id }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($refference->description) }}?')">
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
                <span>Nenhuma referência cadastrada</span>
            </li>
        @endif
    </ul>
@endsection