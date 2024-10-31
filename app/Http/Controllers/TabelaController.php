<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classe;
use App\Models\Tabela;

class TabelaController extends Controller
{
    public function index()
    {
        $tabelas = DB::table('tabelas')
        ->orderBy('classes.classe')
        ->join('classes', 'tabelas.id_classe', '=', 'classes.id')
        ->select('tabelas.*', 'classes.classe',)
        ->get();

        $classes = Classe::all();
        return view('tabela', compact('tabelas','classes'));  
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $tempo = (($_POST['horas'] * 60) + $_POST['minutos']);  
        $preco = $_POST['preco']; 
        $idclasse = $_POST['idclasse1']; 
        $tabela = $request->all();
        $tabela['tempo'] = $tempo;
        $tabela['preco'] = $preco;
        $tabela['id_classe'] = $idclasse;
        Tabela::Create($tabela);

        return redirect()->route('tabela.index')->with('sucesso', 'Tabela cadastrada com sucesso !');
    }

    public function show(Tabela $tabela)
    {
        
    }

    public function edit(Tabela $tabela)
    {
        
    }

    public function update(Request $request, Tabela $tabela)
    {
        $tabela = Tabela::find($request['id']);
        $tabela->tempo = ($request['horas'] * 60) + $request['minutos']; 
        $tabela->preco = $request['preco']; 
        $tabela->id_classe = $request['idclasse2']; 
        $tabela->save();
        return redirect()->route('tabela.index')->with('sucesso', 'Tabela atualizada com sucesso !');        
    }

    public function destroy(Request $request)
    {
        Tabela::destroy($request->id);
        return redirect()->route('tabela.index')->with('sucesso', 'Tabela excluida com sucesso !');          
    }
}