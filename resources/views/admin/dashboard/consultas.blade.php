@extends('layouts.admin-master')

@section('title')
Inicio
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Inicio</h1>
    </div>

    <div class="section-body">
        <!-- card wrapper -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
            <!-- card title -->
            <h4>Suas Consultas Marcadas</h4>
            </div>
            <!-- card body -->
            <div class="card-body">

                    @php
                        $count = 0;
                    @endphp
                        @foreach ($assinaturas as $assinatura)
                            @foreach ($consultas as $consulta)
                                @if ($consulta->id_assinatura == $assinatura->id)
                                    @php
                                        $count+=1;
                                        $newDate = date("m/d/Y", strtotime($consulta->start));
                                        $newHora = date("H:i", strtotime($consulta->start));
                                        $endHora = date("H:i", strtotime($consulta->end));
                                    @endphp
                                    @if ($count==1)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Titulo</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Hora (Início)</th>
                                                    <th scope="col">Hora (Fim)</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                    @endif

                                        <tr>
                                            <th scope="row">{{ $count }}</th>
                                            <td>{{ $consulta->title }}</td>
                                            <td>{{ $newDate }}</td>
                                            <td>{{ $newHora }}</td>
                                            <td>{{ $endHora }}</td>
                                            <td>
                                                @if ($assinatura->status==1)
                                                    <button type="button" class="btn btn-success">Pago</button>
                                                @else
                                                    <button type="button" class="btn btn-danger">Pendente</button>
                                                @endif
                                            </td>
                                        </tr>

                                @endif
                            @endforeach
                        @endforeach
                    @if ($count==0)
                        <p class="section-lead">
                            Você não possui nenhuma consulta marcada! <button type="button" class="btn btn-warning">Marque Uma Agora</button>
                        </p>

                    @else
                        </tbody>
                    </table>
                    @endif
            </div>
        </div>
        <p class="section-lead">
            Fique atento ao dia e horário de sua consulta!
        </p>
    </div>
</section>
@endsection
