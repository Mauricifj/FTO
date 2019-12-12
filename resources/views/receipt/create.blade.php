@extends('layouts.app')
@section('title','Nova venda')
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
    <form method="post" action="/receipt">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="extra">Extra</label>
            <input type="text" class="form-control" name="extra" id="extra">
        </div>
        <div class="form-group">
            <label for="id_supplier">Fornecedor</label>
            <select name="id_supplier" class="form-control" id="id_supplier">
                <option value="">Selecione...</option>
                @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->company_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="products_select">Produtos</label>
            <div class="input-group">
                <select class="custom-select" id="products_select">
                    <option value="">Selecione...</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->description }}</option>
                    @endforeach
                </select>
                @foreach($products as $product)
                    <input type="hidden" id="description_{{ $product->id }}" value="{{ $product->description }}">
                    <input type="hidden" id="measurement_unit_{{ $product->id }}" value="{{ $product->measurement_unit }}">
                @endforeach
                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="button" onclick="addProduct()">Adicionar</button>
                </div>
            </div>
        </div>
        <table class="table mb-2">
            <thead>
            <tr>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody id="products_list">
            <tr id="placeholder_empty_products">
                <td class="text text-center" colspan="5">Nenhum produto neste recibo</td>
            </tr>
            </tbody>
        </table>
        <a href="/receipt" class="btn btn-outline-info mt-2 mr-2">
            <i class="fas fa-long-arrow-alt-left"></i> Voltar
        </a>
        <button class="btn btn-outline-primary mt-2">
            Adicionar <i class="fas fa-plus"></i>
        </button>
    </form>
@endsection

@section('scripts')
    <script>
        function addProduct() {
            let product_id = $('#products_select option:selected').val();

            if (product_id === '') {
                alert("Por favor, informe um produto");
                return
            }

            if ($('#' + product_id).val() === product_id)
            {
                alert('Este produto já existe nesse recibo');
                return
            }

            let products_list = $('#products_list');
            let product_description = $('#description_' + product_id).val();
            let product_measurement_unit = $('#measurement_unit_' + product_id).val();

            $('#placeholder_empty_products').hide();

            products_list.append(
                `<tr class="justify-content-between align-items-center" id="product_row_${product_id}">
                    <td>${product_description}</td>
                    <td>
                        <select name="products[${product_id}][quantity]" id="quantity_options_${product_id}"">
                        </select> ${product_measurement_unit}
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="return removeProduct(${product_id})">Remover <i class="fas fa-trash-alt"></i></button>
                    </td>
                    <input type="hidden" id="${product_id}" name="products[${product_id}][id]" value="${product_id}">
                </tr>`);

            for(var i = 1; i <= 5000; i++) {
                $('#quantity_options_' + product_id).append(`<option value="${i}">${i}</option>`);
            }
        }

        function removeProduct(product_id) {
            let tr = $('#product_row_' + product_id);

            if (confirm('Deseja remover este produto deste recibo?')) {
                tr.remove();
            }

            if (tr.parent().children().length <= 0)
                $('#placeholder_empty_products').show();

            return false;
        }
    </script>
@endsection