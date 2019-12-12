@extends('layouts.app')
@section('title','Detalhes da Venda')
@section('content')
    <div class="d-flex justify-content-between">
        <a href="/sale" class="btn btn-outline-info mb-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
    </div>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Detalhes</h5>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $sale->description }}" readonly>
            </div>
            <div class="form-group">
                <label for="extra">Extra</label>
                <input type="text" class="form-control" name="extra" id="extra" value="{{ $sale->extra }}" readonly>
            </div>
            <div class="form-group">
                <label for="invoice">Fatura</label>
                <input type="text" class="form-control" name="invoice" id="invoice" value="{{ $sale->invoice }}" readonly>
            </div>
            <div class="form-group">
                <label for="type">Tipo</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ ($sale->type == 'sale') ? 'Venda' : 'Orçamento' }}" readonly>
            </div>
            <div class="form-group">
                <label for="condition">Parcelas</label>
                <input type="text" class="form-control" name="condition" id="condition" value="{{ $sale->condition }}" readonly>
            </div>
            <div class="form-group">
                <label for="id_refference">Tipo de pagamentos</label>
                <input type="text" class="form-control" name="id_refference" id="id_refference" value="{{ $sale->refference->description }}" readonly>
            </div>
            <div class="form-group">
                <label for="situation">Situação</label>
                <input type="text" class="form-control" name="situation" id="situation" value="@foreach($situations as $situation){{ $sale->situation == $situation->value ? $situation->description : '' }}@endforeach" readonly>
            </div>
            <div class="form-group">
                <label for="id_customer">Cliente</label>
                <input type="text" class="form-control" name="id_customer" id="id_customer" value="{{ $sale->customer->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Valor</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" name="amount" id="amount" value="{{ number_format($sale->amount, 2) }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="discount">Desconto</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" name="discount" id="discount" value="{{ number_format($sale->discount, 2) }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" name="total" id="total" value="{{ number_format($sale->total, 2) }}" readonly>
                </div>
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
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    @if(sizeof($sale->items) != 0)
                        @foreach($sale->items as $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                <td>{{ number_format($item->total, 2) }}</td>
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