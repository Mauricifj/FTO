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
    <form method="post" action="/sale">
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
            <label for="type">Tipo</label>
            <select name="type" class="form-control" id="type">
                <option value="">Selecione...</option>
                <option value="sale">Venda</option>
                <option value="quotation">Orçamento</option>
            </select>
        </div>
        <div class="form-group">
            <label for="condition">Parcelas</label>
            <select name="condition" class="form-control" id="condition">
                <option value="">Selecione...</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="id_refference">Tipo de pagamento</label>
            <select name="id_refference" class="form-control" id="id_refference">
                <option value="">Selecione...</option>
                @foreach($payment_methods as $method)
                    <option value="{{$method->id}}">{{$method->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="situation">Situação</label>
            <select name="situation" class="form-control" id="situation">
                <option value="">Selecione...</option>
                @foreach($situations as $situation)
                    <option value="{{ $situation->value }}">{{ $situation->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_customer">Cliente</label>
            <select name="id_customer" class="form-control" id="id_customer">
                <option value="">Selecione...</option>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="products_select">Produtos</label>
            <div class="input-group">
                <select class="custom-select" id="products_select">
                    <option value="">Selecione...</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->description }} -
                            R$ {{ $product->price }}</option>
                    @endforeach
                </select>
                @foreach($products as $product)
                    <input type="hidden" id="description_{{ $product->id }}" value="{{ $product->description }}">
                    <input type="hidden" id="price_{{ $product->id }}" value="{{ $product->price }}">
                    <input type="hidden" id="measurement_unit_{{ $product->id }}" value="{{ $product->measurement_unit }}">
                    <input type="hidden" id="quantity_{{ $product->id }}" value="{{ $product->quantity }}">
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
                <th>Preço unitário</th>
                <th>Quantidade</th>
                <th>Preço total</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody id="products_list">
            <tr id="placeholder_empty_products">
                <td class="text text-center" colspan="5">Nenhum produto nesta venda</td>
            </tr>
            </tbody>
        </table>
        <div class="form-group">
            <label for="amount">Valor</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="amount" id="amount" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="discount">Desconto</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="discount" id="discount" onkeyup="updateTotal()">
            </div>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="total" id="total" readonly>
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
        function addProduct() {
            let product_id = $('#products_select option:selected').val();

            if (product_id === '') {
                alert("Por favor, informe um produto");
                return
            }

            if ($('#' + product_id).val() === product_id)
            {
                alert('Este produto já existe nessa venda');
                return
            }

            let products_list = $('#products_list');
            let product_description = $('#description_' + product_id).val();
            let product_price = $('#price_' + product_id).val();
            let product_measurement_unit = $('#measurement_unit_' + product_id).val();
            let product_quantity = $('#quantity_' + product_id).val();

            $('#placeholder_empty_products').hide();

            products_list.append(
                `<tr class="justify-content-between align-items-center" id="product_row_${product_id}">
                    <td>${product_description}</td>
                    <td>${product_price}</td>
                    <td>
                        <select name="products[${product_id}][quantity]" id="quantity_options_${product_id}" onchange="updateTotalForProduct(${product_id})">
                        </select> ${product_measurement_unit}
                    </td>
                    <td id="productTotalPrice_${product_id}">${product_price}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="return removeProduct(${product_id})">Remover <i class="fas fa-trash-alt"></i></button>
                    </td>
                    <input type="hidden" id="${product_id}" name="products[${product_id}][id]" value="${product_id}">
                    <input type="hidden" name="products[${product_id}][price]" value="${product_price}">
                </tr>`);

            for(var i = 1; i <= product_quantity; i++) {
                $('#quantity_options_' + product_id).append(`<option value="${i}">${i}</option>`);
            }

            updateTotal();
        }

        function updateTotalForProduct(product_id) {
            var quantity = $('#quantity_' + product_id).val();
            var price = $('#price_' + product_id).val();

            $('#productTotalPrice_' + product_id).html((price * quantity).toFixed(2));
            updateTotal();
        }

        function removeProduct(product_id) {
            let tr = $('#product_row_' + product_id);

            if (confirm('Deseja remover este produto desta venda?')) {
                tr.remove();
            }

            if (tr.parent().children().length <= 0)
                $('#placeholder_empty_products').show();

            updateTotal();
            return false;
        }

        function updateTotal() {
            let total_list = $("td[id^='productTotalPrice_']");
            let discount = $('#discount').val();
            let total = $('#total');
            let sum = 0;
            total_list.each(function (index) {
                sum += $(this).text() * 1;
            });

            $('#amount').val(sum.toFixed(2));
            total.val((sum - discount).toFixed(2));
        }
    </script>
@endsection