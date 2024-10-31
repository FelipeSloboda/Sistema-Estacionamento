<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vaga;
use App\Models\Classe;

class VagaController extends Controller
{
    public function index()
    {
        $vagas = DB::table('vagas')
            ->join('classes', 'vagas.id_classe', '=', 'classes.id')
            ->select('vagas.*', 'classes.classe',)
            ->get();

        $classes = Classe::all();
        return view('vaga', compact('vagas','classes')); 
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $qtd_vagas = $_POST['qtd_vagas'];  
        $idclasse = $_POST['idclasse1'];        
        $vaga = $request->all();
        $vaga['qtd_vagas'] = $qtd_vagas;
        $vaga['id_classe'] = $idclasse;
        Vaga::Create($vaga);

        return redirect()->route('vaga.index')->with('sucesso', 'Vaga cadastrada com sucesso !');    
    }

    public function show(Vaga $vaga)
    {
        
    }

    public function edit(Vaga $vaga)
    {
        
    }

    public function update(Request $request, Vaga $vaga)
    {
        $vaga = Vaga::find($request['id']);
        $vaga->qtd_vagas = $request['qtd_vagas']; 
        $vaga->id_classe = $request['idclasse2'];
        $vaga->save();
        return redirect()->route('vaga.index')->with('sucesso', 'Vaga atualizada com sucesso !');
    }

    public function destroy(Request $request)
    {
        Vaga::destroy($request->id);
        return redirect()->route('vaga.index')->with('sucesso', 'Vaga excluida com sucesso !');        
    }
}