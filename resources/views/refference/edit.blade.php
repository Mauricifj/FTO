@extends('layouts.app')
@section('title','Editar venda')
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
    <form id="form" method="post" action="/sale/{{ $sale->id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $sale->description }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra" value="{{ $sale->extra }}">
        </div>
        <div class="form-group">
            <label for="invoice">Fatura</label>
            <input type="text" class="form-control" name="invoice" id="invoice" value="{{ $sale->invoice }}">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" class="form-control" id="type">
                <option value="sale" {{ ($sale->type == 'sale') ? 'selected' : '' }}>Venda</option>
                <option value="quotation" {{ $sale->type == 'quotation' ? 'selected' : '' }}>Orçamento</option>
            </select>
        </div>
        <div class="form-group">
            <label for="condition">Parcelas</label>
            <select name="condition" class="form-control" id="condition">
                <option value="">Selecione...</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $sale->condition == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="id_refference">Tipo de pagamento</label>
            <select name="id_refference" class="form-control" id="id_refference">
                <option value="">Selecione...</option>
                @foreach($payment_methods as $method)
                    <option value="{{$method->id}}" {{ $sale->refference->id == $method->id ? 'selected' : '' }}>{{$method->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="situation">Situação</label>
            <select name="situation" class="form-control" id="situation">
                <option value="">Selecione...</option>
                @foreach($situations as $situation)
                    <option value="{{ $situation->value }}" {{ $sale->situation == $situation->value ? 'selected' : '' }}>{{ $situation->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_customer">Cliente</label>
            <select name="id_customer" class="form-control" id="id_customer">
                <option value="">Selecione...</option>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}" {{ $sale->customer->id == $customer->id ? 'selected' : '' }}>{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        <table class="table mb-2">
            <thead>
            <tr>
                <th>Descrição</th>
                <th>Preço unitário</th>
                <th>Quantidade</th>
                <th>Preço total</th>
                <th>Ação</th>
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
        <div class="form-group">
            <label for="amount">Valor</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="amount" id="amount"  value="{{ number_format($sale->amount, 2) }}" readonly>
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
        <a href="/sale" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Adicionar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection

@section('scripts')
    <script>
        $('#form').submit(function () {
            let amount = $('#amount').val();
            $('#amount').val(amount.replace(',', ''));

            let discount = $('#discount').val();
            $('#discount').val(discount.replace(',', ''));

            let total = $('#total').val();
            $('#total').val(total.replace(',', ''));
        });
    </script>
@endsection