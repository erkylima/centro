/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


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
        ultima = 0;
        consultas=[];
        $('#collapseOne').collapse('show');

    }else if('datas' == item_id){
        $('#collapseTwo').collapse('show');
    }
}
