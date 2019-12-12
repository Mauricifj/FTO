@extends('layouts.app')
@section('title','Detalhes da Venda')
@section('content')
    <div class="d-flex justify-content-between">
        <a href="/receipt" class="btn btn-outline-info mb-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
    </div>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Detalhes</h5>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $receipt->description }}" readonly>
            </div>
            <div class="form-group">
                <label for="extra">Extra</label>
                <input type="text" class="form-control" name="extra" id="extra" value="{{ $receipt->extra }}" readonly>
            </div>
            <div class="form-group">
                <label for="invoice">Fatura</label>
                <input type="text" class="form-control" name="invoice" id="invoice" value="{{ $receipt->invoice }}" readonly>
            </div>
            <div class="form-group">
                <label for="id_supplier">Fornecedor</label>
                <input type="text" class="form-control" name="id_supplier" id="id_supplier" value="{{ $receipt->supplier->company_name }}" readonly>
            </div>
        </div>
    </div>


    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table mb-2">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>
                    @if(sizeof($receipt->items) != 0)
                        @foreach($receipt->items as $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text text-center" colspan="5">Nenhum produto nesta venda</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection