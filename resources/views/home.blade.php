@extends('layouts.app')

@section('title','Página inicial')

@section('content')

    @guest

        <a class="btn btn-outline-primary" href="/login">Entrar</a>
        <a class="btn btn-outline-secondary" href="/register">Registrar</a>

    @else

        <div class="container text-center align-middle pt-5" style="height: 100px;">
            <h1 class="display-4 mt-5">FTO Solutions</h1>
            <p class="">A solução do seu sistema de gestão de estoque</p>
        </div>

    @endguest

@endsection