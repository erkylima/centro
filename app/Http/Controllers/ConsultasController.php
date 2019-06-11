<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\WpAssinaturas;
use App\Models\WpConsultas;

class ConsultasController extends Controller
{
    public function consulta(){
        $id = Auth::id();
        $consultas = WpConsultas::orderBy('start','DESC')->get();
        $assinaturas = WpAssinaturas::all()->where('id_usuario',$id);

        return view('admin.dashboard.consultas')->with(['consultas' => $consultas,'assinaturas'=>$assinaturas]);
    }
}
