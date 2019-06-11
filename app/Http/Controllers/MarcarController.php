<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WpConsultas;

class MarcarController extends Controller
{

    public function finalizar(Request $request){
        $consultas = json_encode($request->passar_consultas);
        $consultas = json_encode($consultas);

        if (is_array($consultas) || is_object($consultas)){
            echo $consultas;
            foreach ($consultas as $consulta){
                $nova = new WpConsultas();
                $nova->id_assinatura = Input::get('username');
                $nova->post_id = Input::get('post_id');
                $nova->password = Hash::make(Input::get('password'));
                $nova->save();
                }
        }


        return view('consulta.finalizar')->with(['request'=>$request]);
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
