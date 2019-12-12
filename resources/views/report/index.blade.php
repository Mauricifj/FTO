@extends('layouts.app')
@section('title','Vendas')
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
        <a href="sale/create" class="btn btn-outline-primary mb-2">
            Adicionar <i class="fas fa-plus"></i>
        </a>
    </div>

    <input type="hidden" id="money3Months" value="{{ $money3Months }}">
    <input type="hidden" id="money2Months" value="{{ $money2Months }}">
    <input type="hidden" id="money1Months" value="{{ $money1Months }}">
    <input type="hidden" id="moneyThisMonth" value="{{ $moneyThisMonth }}">
    <input type="hidden" id="quantity3Months" value="{{ $quantity3Months }}">
    <input type="hidden" id="quantity2Months" value="{{ $quantity2Months }}">
    <input type="hidden" id="quantity1Months" value="{{ $quantity1Months }}">
    <input type="hidden" id="quantityThisMonth" value="{{ $quantityThisMonth }}">

    <div class="card align-self-center mb-2">
        <div class="card-body text-center">
            <h5 class="card-title">Quantidade vendida (R$)</h5>
            <div style="width:100%;">
                <canvas id="moneyCanvas"></canvas>
            </div>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Quantidade vendida (número de vendas)</h5>
            <div style="width:100%;">
                <canvas id="quantityCanvas"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var money3Months = $('#money3Months').val();
        var money2Months = $('#money2Months').val();
        var money1Months = $('#money1Months').val();
        var moneyThisMonth = $('#moneyThisMonth').val();

        var quantity3Months = $('#quantity3Months').val();
        var quantity2Months = $('#quantity2Months').val();
        var quantity1Months = $('#quantity1Months').val();
        var quantityThisMonth = $('#quantityThisMonth').val();

        var MONTHS = ['Agosto', 'Setembro', 'Novembro', 'Dezembro'];

        var configMoneyCanvas = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: 'Vendas',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        money3Months,
                        money2Months,
                        money1Months,
                        moneyThisMonth
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Relatório de vendas'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Mês'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'R$'
                        }
                    }]
                }
            }
        };

        var configQuantityCanvas = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: 'Vendas',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        quantity3Months,
                        quantity2Months,
                        quantity1Months,
                        quantityThisMonth
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Relatório de vendas'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Mês'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Quantidade'
                        }
                    }]
                }
            }
        };

        window.onload = function () {
            let moneyCanvasContext = document.getElementById('moneyCanvas').getContext('2d');
            window.myLine = new Chart(moneyCanvasContext, configMoneyCanvas);

            let quantityCanvasContext = document.getElementById('quantityCanvas').getContext('2d');
            window.myLine = new Chart(quantityCanvasContext, configQuantityCanvas);
        };
    </script>
@endsection