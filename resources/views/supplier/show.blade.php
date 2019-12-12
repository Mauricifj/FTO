@extends('layouts.app')
@section('title','Detalhes de Fornecedor')
@section('content')
    <div class="d-flex justify-content-between">
        <a href="/supplier" class="btn btn-outline-info mb-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <ul class="list-group">
                @if(sizeof($supplier->products) != 0)
                    @foreach($supplier->products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $product->description }}</span>
                            @if ($user->isAdmin() || $user->isManager())
                                <span class="d-flex">
{{--                                    <a href="/product/{{ $product->id }}" class="btn btn-outline-info btn-sm mr-1">--}}
{{--                                        Ver mais <i class="fas fa-external-link-alt"></i>--}}
{{--                                    </a>--}}
                                    <a href="/product/{{ $product->id }}/edit" class="btn btn-outline-warning btn-sm mr-1">
                                        Editar <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="post" action="/supplier/{{ $product->id }}"
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
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Contatos</h5>
            <ul class="list-group">
                @if(sizeof($supplier->contacts) != 0)
                    @foreach($supplier->contacts as $contact)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong>{{ $contact->refference->description }}:</strong> {{ $contact->description }}</span>
                            @if ($user->isAdmin() || $user->isManager())
                                <span class="d-flex">
                                    <a href="/contact/{{ $contact->id }}/edit" class="btn btn-outline-warning btn-sm mr-1">
                                        Editar <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="post" action="/contact/{{ $contact->id }}"
                                          onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($contact->description) }} de {{ $supplier->company_name  }}?')">
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
                        <span>Nenhum contato cadastrado</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endsection