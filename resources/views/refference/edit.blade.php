@extends('master')
@section('title','Nova Cidade')
@section('contents')
  <form method="post" action="/city/{{$city->id}}">
  @csrf
  @method("put")
  <dl>
  	<dt>Nome</dt>
  	<dd><input type="text" name="nome" value="{{$city->nome}}">
    </dd>
  	<dt>Endereco</dt>
  	<dd><input type="text" name="endereco" value="{{$city->endereco}}"></dd>
  </dl>
  <input type="submit" value="Enviar">
  </form>
@endsection