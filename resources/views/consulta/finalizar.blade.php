@extends('layouts.especialidade-master')
@section('conteudo')
@php
    header('refresh:2;location: http://localhost:3000/admin/consultas');
@endphp
<div class="conteudo">
    <h2 class="titulo">{{ $msg }}</h2>
</div>
@endsection
