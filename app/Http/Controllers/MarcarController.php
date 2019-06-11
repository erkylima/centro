<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WpConsultas;
use App\Models\WpAssinaturas;

class MarcarController extends Controller
{

    public function finalizar(Request $request){
        $consultas = explode(",",  $request->passar_consultas);
        $msg = "";
        if (is_array($consultas) || is_object($consultas)){
            try {
                $assinatura = new WpAssinaturas();
                $assinatura->post_id = $request->post_id;
                $assinatura->id_usuario = 3;
                $assinatura->plano = $request->planoselected;
                $assinatura->status = 0;
                $assinatura->save();
                foreach ($consultas as $consulta){
                    $nova = new WpConsultas();
                    $nova->id_assinatura = $assinatura->id;
                    $nova->post_id = $request->post_id;
                    if($request->post_id == 1) $nova->title = 'Consulta Médica';
                    else if($request->post_id == 2) $nova->title = 'Consulta Nutricionista';
                    $nova->start = date('Y-m-d H:i:s', $consulta);
                    $nova->end = date('Y-m-d H:i:s', $consulta+3600);
                    $nova->color = '#356asc';
                    $nova->save();
                }
                $msg = "Consulta Marcada com Sucesso!";
            } catch (\Throwable $th) {
                $assinatura->delete();
                $msg = "Sua consulta já foi marcada! Efetue o pagamento para confirmar o agendamento!";
                echo 'yeha';
            }

        }


        return view('consulta.finalizar')->with(['request'=>$request,'msg'=>$msg]);
    }
    public function marcar(Request $request){
        $id = $request->id;
        $consultas = WpConsultas::all()->where('post_id',$id);

        return view('consulta.marcar',compact('consultas'))->with(['consultas' => $consultas,'id'=>$id]);
    }
    public function index(){

        return view('consulta.medico');

    }
}
