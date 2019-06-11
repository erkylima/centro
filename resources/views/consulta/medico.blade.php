@extends('layouts.especialidade-master')

@section('conteudo')

<div class="conteudo">
    <h2 class="titulo">SELECIONE A ESPECIALIDADE MÉDICA</h2>
    <div class="container">
        <div class="box">
                <a class="ref-box" href="{{route('medico', ['id'=>1])}}">
                <img  src="https://centroressence.com/wp-content/uploads/2019/03/DR-GUILHERME-CHATEAUBRIAND.jpg">
            </a>
            <span class="medicos">Médico</span>
        </div>
        <div class="box">
            <a class="ref-box" href="{{route('medico', ['id'=>2])}}">
                <img  src="https://centroressence.com/wp-content/uploads/2019/03/site-rafael.jpg">
            </a>
            <span >Nutricionista</span>
        </div>
    </div>
</div>





@endsection

