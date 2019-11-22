@extends('layouts/app')
@section('title','Cidades')
@section('content')
    <h3>
        <a href="/refference/create">Nova referência</a>
    </h3>
    @foreach($refferences as $refference)
        <p>
            {{$refference->description}} - {{$refference->type}} - <a href="refference/{{$refference->id}}/edit">Editar</a>
        </p>
    @endforeach
@endsection