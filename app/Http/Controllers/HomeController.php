<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Classe;
use App\Models\Mensalista;
use App\Models\Servico;
use App\Models\Vaga;

class HomeController extends Controller
{
    public function index(){
        $totClasses = count(Classe::all());
        $totServicos = count(Servico::all());
        $totVagas = (Vaga::all()->sum('qtd_vagas'));
        $totMensalistas = count(Mensalista::all());
        return view('home', compact('totClasses','totServicos','totVagas','totMensalistas'));        
    }
}
