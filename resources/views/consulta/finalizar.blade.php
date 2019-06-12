@extends('layouts.especialidade-master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
@endsection

@section('conteudo')
@php
    header('refresh:2;location: http://localhost:3000/admin/consultas');
@endphp
<div class="conteudo text-center">
    <h2 class="titulo">{{ $msg }}</h2>
    <a href="{{route('marcar')}}"><button type="button" class="btn btn-success">Finalizar</button>
</div>
@endsection
