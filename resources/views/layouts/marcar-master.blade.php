<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Marcar Consulta — Centro Ressence</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

<!-- Plugins -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

<link rel="stylesheet" href="{{ asset('assets/modules/fullcalendar/core/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/fullcalendar/daygrid/main.css') }}">



<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">


</head>

<body>
    <div id="app" class="container">
        <section class="section row mt-5">
            @yield('conteudo')
        </section>

    </div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/modules/fullcalendar/core/main.js') }}"></script>
<script src='{{ asset('assets/modules/fullcalendar/daygrid/main.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/interaction/main.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/bootstrap/main.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/core/locales-all.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/core/locales/pt-br.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/moment/main.js')}}'></script>
<script src='{{ asset('assets/modules/fullcalendar/moment-timezone/main.js')}}'></script>




<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    var calendarEl;
    var calendar;
    var calendario_consulta = {!! json_encode($consultas->toArray()) !!}
    var consultas = new Array();
    var ultima = 0;
    var plano;

    // Função Responsável por Abrir o Calendário
    function abrirCalendario(){
        calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            titleFormat: 'MMMM YYYY',
            fixedWeekCount: false,
            customButtons: {
                myCustomButton: {
                text: 'Limpar Consultas',
                click: function() {
                    if(calendar.getEventById( "marcacao" )){
                        while(calendar.getEventById( "marcacao" )){
                            calendar.getEventById( "marcacao" ).remove();
                            ultima = 0;
                            consultas=[];
                            alert("Remarque suas consultas");
                            $('#tooltip-body').text("As marcações que você realizou foram removidas.");
                            }
                    }else{
                        alert("Você não tem consulta marcada.");
                    }
                    }
                }
            },
            header:{
                left: '',
                center: 'title',
                right:  'myCustomButton'
            },
            footer:{
                left:   'prev',
                center: '',
                right:  'next'
            },
            titleFormat: {
                year: 'numeric',
                month: 'long',
            },
            plugins: [ 'dayGrid' , 'interaction' , 'bootstrap'],
            defaultDate: {!! '\''.date('Y-m-d'). '\''; !!},
            defaultView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            hiddenDays: [ 0, 6 ],
            locale: 'pt-br',
            timeZone: 'UTC-3',
            aspectRatio: 2,
            editable: true,
            selectable: true,
            selectHelper: true,
            eventClick: function(info){
                info.jsEvent.preventDefault(); // don't let the browser navigate
                $('#visualizar #title').text(info.event.title)
                $('#visualizar #start').text(calendar.formatDate(info.event.start,{
                    month: 'numeric',
                    year: 'numeric',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric'
                }));
                $('#visualizar').modal('show');
            },
            select: function(info){
                //Pegar data atual
                var date = new Date();
                var timestamp = date.getTime();

                //pegar data clicada
                var dateStamp=new Date(info.start).getTime();

                //Verificar se a data é já passou
                if((dateStamp) > ( timestamp )){
                    var contador_hides=0;
                    document.getElementById("selectdefault").selected=true;

                    $('#cadastrar #oito').show();
                    $('#cadastrar #nove').show();
                    $('#cadastrar #dez').show();
                    $('#cadastrar #onze').show();
                    $('#cadastrar #doze').show();
                    $('#cadastrar #treze').show();
                    $('#cadastrar #quatorze').show();
                    $('#cadastrar #quize').show();
                    $('#cadastrar #dezesseis').show();
                    $('#cadastrar #dezessete').show();
                    $('#cadastrar #dezoito').show();
                    $('#cadastrar #dezenove').show();
                    $('#cadastrar #vinte').show();
                    for(var i = 0; i<calendario_consulta.length;i++){
                        var datasplit = calendario_consulta[i].start.split(" ");


                        if(info.startStr == datasplit[0]){
                            switch(datasplit[1]) {
                                case $('#cadastrar #oito').val():
                                    $('#cadastrar #oito').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #nove').val():
                                    $('#cadastrar #nove').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #dez').val():
                                    $('#cadastrar #dez').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #onze').val():
                                    $('#cadastrar #onze').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #doze').val():
                                    $('#cadastrar #doze').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #treze').val():
                                    $('#cadastrar #treze').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #quatorze').val():
                                    $('#cadastrar #quatorze').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #quize').val():
                                    $('#cadastrar #quize').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #dezesseis').val():
                                    $('#cadastrar #dezesseis').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #dezessete').val():
                                    $('#cadastrar #dezessete').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #dezoito').val():
                                    $('#cadastrar #dezoito').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #dezenove').val():
                                    $('#cadastrar #dezenove').hide();
                                    contador_hides++;
                                    break;
                                case $('#cadastrar #vinte').val():
                                    $('#cadastrar #vinte').hide();
                                    contador_hides++;
                                    break;
                                default:

                                }
                        }
                    }
                    $('#cadastrar #start').val(calendar.formatDate(info.startStr,{
                        month: 'numeric',
                        year: 'numeric',
                        day: 'numeric'
                    }));
                    if(contador_hides <13)
                        $('#cadastrar').modal('show');
                    else{
                        alert("Esse dia não possui horários disponíveis!")
                    }
                    $('#cadastrar #end').val(info.endStr);
                }else{
                    alert("Você não deve tentar marcar uma consulta no passado.");
                }

            },
            showNonCurrentDates: false,
            eventLimit: true, // allow "more" link when too many events

        });


        calendar.addEventSource( calendario_consulta );

        calendar.render();
    }

    // Mascara para data e hora
    function DataHora(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
                    campo = eval (objeto);
                    if (campo.value == '00/00/0000'){
                        campo.value=""
                    }

                    caracteres = '0123456789';
                    separacao1 = '/';
                    separacao2 = ' ';
                    separacao3 = ':';
                    conjunto1 = 2;
                    conjunto2 = 5;
                    conjunto3 = 10;
                    conjunto4 = 13;
                    conjunto5 = 16;
                    if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
                        if (campo.value.length == conjunto1 )
                        campo.value = campo.value + separacao1;
                        else if (campo.value.length == conjunto2)
                        campo.value = campo.value + separacao1;
                        else if (campo.value.length == conjunto3)
                        campo.value = campo.value + separacao2;
                        else if (campo.value.length == conjunto4)
                        campo.value = campo.value + separacao3;
                        else if (campo.value.length == conjunto5)
                        campo.value = campo.value + separacao3;
                    }else{
                        event.returnValue = false;
                    }
    }

    // Verifica e valida se os campos foram definidos ao cadastrar consulta
    function valida() {
        var comboHora = document.getElementById("hora");

        if (comboHora.options[comboHora.selectedIndex].value == "" ){
            alert("Selecione uma hora antes de prosseguir");
            return false;
        }else{
            return true;
        }
    }

     //Cria Listener para quando clicar no primeiro passador renderizar o calendário. Isso garante que ele terá o tamanho certo.
    if(document.getElementById("datas").clicked)
        document.getElementById("datas").addEventListener('click', abrirCalendario());


    var clicou = false;

    // Função Passar Collapses
    function to_next(item_id){
        var quantidade_consultas = 0;
        if(document.getElementById("defaultGroupExample1").checked){
            quantidade_consultas = 12;
        }else if(document.getElementById("defaultGroupExample2").checked){
            quantidade_consultas = 6;
        }else{
            quantidade_consultas = 1;
        }
        if('datas' == item_id){
            $('#collapseTwo').collapse('show');
            if(!clicou){
                document.getElementById("datas").removeEventListener("click", abrirCalendario()); // Remove Listener ao renderizar calendario
                clicou=true;
            }
        }else if('pagamento' == item_id){
            if(consultas.length < quantidade_consultas)
                alert("Você precisa marcar todas suas consultas. Faltam " + (quantidade_consultas-consultas.length));
            else
                $('#collapseThree').collapse('show');
        }
    }

    // Função Voltar Collapses
    function to_prev(item_id){
        if('plano' == item_id){
            $('#collapseOne').collapse('show');

        }else if('datas' == item_id){
            alert("Limpando marcações");
            $('#collapseTwo').collapse('show');
        }
    }

    function pre_marcar_data(){
        hora = $("#hora :selected").val();
        var timeParts   = hora.split(':'),
        data = document.getElementById("start").value,
        dateParts = data.split('/'),
        date;

        date = new Date(dateParts[2], parseInt(dateParts[1], 10) - 1, dateParts[0], timeParts[0], timeParts[1]);
        alert(data);
        if((date.getTime()/1000) > ultima+2592000){
            ultima = (date.getTime()/1000);
            consultas.push(date.getTime()/1000);
            var newEvent = new Object();
            newEvent.title = 'Consulta ' + consultas.length;
            var dataSplit = document.getElementById("start").value.split('/');
            dataSplit.reverse();
            var dataStr = dataSplit.join("-");
            newEvent.start = dataStr + " " + hora;
            newEvent.color = "#ffa500";
            newEvent.id= "marcacao";

            calendar.addEvent(newEvent);

        }
        else{
            alert("É necessário que se selecione uma data com um mês de distância da ultima consulta");
        }
    }

    function submit_by_id(){
        if (valida()) // Chama Função de Validação
        {
            alert(document.getElementById("start").value);
            if(document.getElementById("defaultGroupExample1").checked && consultas.length < 12){
                plano = 0; // Plano Anual
                pre_marcar_data();
            }else if(document.getElementById("defaultGroupExample2").checked && consultas.length < 6){
                plano = 1 // Plano Semestral
                pre_marcar_data();
            }else if(document.getElementById("defaultGroupExample3").checked && consultas.length < 1){
                plano = 2; // Plano Diário
                pre_marcar_data();
            }else{
                alert("Você já marcou todas suas consultas. Vá para o próximo passo!")
            }

        }
        else{
            alert('Preencha todos os campos');
        }

    }

    function pagar_consulta(){
        document.getElementById("post_id").value = {!! json_encode($id) !!};
        document.getElementById("planoselected").value = plano;
        document.getElementById("passar_consultas").value = json_encode(consultas);
        document.getElementById("title").value = "Paciente: ";

        alert(document.getElementById("passar_consultas").value);
        document.marcar_consulta.submit();
    }


</script>

<!-- Modal -->
<div class="modal fade" id="cadastrar" class="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Marcar Consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form_class" name="theForm" id="form_id" method="POST" action=""> <!-- Formulário de Datas -->

                    <div class="form-group">
                        <label for="titulo">Data</label>
                        <input type="text" readonly class="form-control" onKeyPress="DataHora(event,this)" id="start" name="start">
                        <input type="hidden" class="form-control" onKeyPress="DataHora(event,this)" id="end" name="end">

                    </div>
                    <div class="form-group">
                        <label for="titulo" class="control-label">Hora</label>
                        <select name="hora" class="form-control" id="hora">
                            <option value="" id="selectdefault">Selecione</option>
                            <option value="08:00:00" id="oito">08h</option>
                            <option value="09:00:00" id="nove">09h</option>
                            <option value="10:00:00" id="dez">10h</option>
                            <option value="11:00:00" id="onze">11h</option>
                            <option value="12:00:00" id="doze">12h</option>
                            <option value="13:00:00" id="treze">13h</option>
                            <option value="14:00:00" id="quatorze">14h</option>
                            <option value="15:00:00" id="quize">15h</option>
                            <option value="16:00:00" id="dezesseis">16h</option>
                            <option value="17:00:00" id="dezessete">17h</option>
                            <option value="18:00:00" id="dezoito">18h</option>
                            <option value="19:00:00" id="dezenove">19h</option>
                            <option value="20:00:00" id="vinte">20h</option>

                        </select>
                    </div>

                    <input type='hidden' id="post_id" name="post_id" value="{!! $id !!}">
                    <button type="button" data-dismiss="modal" id="submit_btn" name="marcar" onclick="submit_by_id(this.start)" class="btn btn-success">Guardar Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                </form>
            </div>

        </div>
    </div>
</div>

    <!-- Modal Visualizar -->
    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detalhes da Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Titulo</dt>
                        <dd class="col-sm-9" id="title">Data Removida</dd>
                        <dd class="col-sm-9" id="start"></dd>

                    </dl>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
