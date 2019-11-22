@extends('layouts/app')
@section('title','Cidades')
@section('content')
    @if (auth()->check())
      <h3>
          <a href="/city/create">Nova Cidade</a>
      </h3>
    @endif
  @foreach($cities as $city)
  <p>
      {{$city->name}} - {{$city->extra}} @if (auth()->check()) -<a href="city/{{$city->id}}/edit">Editar</a> @endif
  </p>
  @endforeach
@endsection