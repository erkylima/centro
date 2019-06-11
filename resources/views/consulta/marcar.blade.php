@extends('layouts.marcar-master')

@section('header')
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
@endsection

@section('conteudo')
    <div class="container mb-5 mt-5" onload = "checkscope();">
        <div class="row">
        <blockquote class="blockquote">
            <p class="mb-0">Selecione o plano de consultoria que você deseja.</p>
            <footer class="blockquote-footer">Somos os melhores no que fazemos</footer>
        </blockquote>

        </div>
        <div class="row">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <blockquote class="blockquote">Planos</blockquote>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                                <div class="row align-content-center">

                                        <div class="col-sm-12 col-lg-4 mb-5">

                                        <div class="card shadow-sm">
                                            <label for="defaultGroupExample1">
                                                <img class="card-img-top" src="https://setecursos.com.br/site/upload/course/curso-tecnico-em-nutricao-e-dietetica-slide-1-1542986387.jpg" alt="mão usando celular">
                                            </label>
                                            <div class="card-body">
                                            <label for="defaultGroupExample1">
                                                <h5 class="card-title mb-4">
                                                    Plano Anual
                                                </h5>
                                            </label>
                                            <!-- Group of default radios - option 1 -->
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
                                            <label class="custom-control-label" for="defaultGroupExample1">Plano Anual</label>
                                            </div>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="col-sm-12 col-lg-4 mb-5">

                                            <div class="card shadow-sm">
                                            <label for="defaultGroupExample2">
                                            <img class="card-img-top" src="https://setecursos.com.br/site/upload/course/curso-tecnico-em-nutricao-e-dietetica-slide-1-1542986387.jpg" alt="mão usando celular">
                                            </label>
                                            <div class="card-body">
                                                <label for="defaultGroupExample2">
                                                    <h5 class="card-title mb-4">
                                                    Plano Semestral
                                                    </h5>
                                                </label>
                                                <!-- Group of default radios - option 2 -->
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios">
                                                <label class="custom-control-label" for="defaultGroupExample2">Plano Semestral</label>
                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-lg-4 mb-5">

                                        <div class="card shadow-sm">
                                            <label for="defaultGroupExample3">
                                                <img class="card-img-top" src="https://setecursos.com.br/site/upload/course/curso-tecnico-em-nutricao-e-dietetica-slide-1-1542986387.jpg" alt="mão usando celular">
                                            </label>
                                            <div class="card-body">
                                            <label for="defaultGroupExample3">
                                                <h5 class="card-title mb-4">
                                                    Consulta Única
                                                </h5>
                                            </label>
                                            <!-- Group of default radios - option 3 -->
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                            <label class="custom-control-label" for="defaultGroupExample3">Consulta Única</label>
                                            </div>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                            <p class="text-left">
                                <button type="button" class="btn btn-info" id="datas" onclick="to_next(this.id)">PROXIMO</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <blockquote class="blockquote">Escolher Datas</blockquote>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="container-fluid">

                                <div class="row">
                                    <div id='calendar' class="mb-3"></div>
                                    <div>
                                        <p class="text-c">
                                            <button type="button" class="btn btn-info " id="plano" onclick="to_prev(this.id)">ANTERIOR</button>
                                            <button type="button" class="btn btn-info " id="pagamento" onclick="to_next(this.id)">PRÓXIMO</button>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <blockquote class="blockquote">Pagamento</blockquote>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p class="mb-3">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            <p class="text-left">

                                <form enctype="multipart/form-data" class="form-horizontal form_class" name="marcar_consulta" id="marcar_consulta" method="POST" action="finalizar"> <!-- Formulário de Datas -->
                                    {{ csrf_field() }}
                                    <input type='hidden' id="post_id" name="post_id">
                                    <input type='hidden' id="id_assinatura" name="id_assinatura">
                                    <input type='hidden' id="passar_consultas" name="passar_consultas">
                                    <input type='hidden' id="planoselected" name="planoselected">
                                    <input type='hidden' id="title" name="title">
                                    <button type="button" class="btn btn-info " id="datas" onclick="to_prev(this.id)">ANTERIOR</button>
                                    <input type="button" form="marcar_consulta" onclick="pagar_consulta()"class="btn btn-info " value="PAGAR">
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





@endsection
