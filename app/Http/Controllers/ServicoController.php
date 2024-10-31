<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Servico;
use App\Models\Classe;

class ServicoController extends Controller
{
    // LISTAR TODOS OS SERVICOS.
    public function index()
    {
        $classes = Classe::all();
        $servicos = DB::table('servicos')
            ->join('classes', 'servicos.id_classe', '=', 'classes.id')
            ->select('servicos.*', 'classes.classe',)
            ->get();
        return view('servico', compact('servicos','classes'));  
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $idclasse = $_POST['idclasse1'];        
        $servico = $request->all();
        $servico['id_classe'] = $idclasse;
        Servico::Create($servico);

        return redirect()->route('servico.index')->with('sucesso', 'Serviço cadastrado com sucesso !');
    }

    public function show(Servico $servico)
    {
        
    }

    public function edit(Servico $servico)
    {
        
    }

    public function update(Request $request, Servico $servico)
    {
        $servico = Servico::find($request['id']);
        $servico->descricao = $request['descricao'];
        $servico->preco = $request['preco'];    
        $servico->id_classe = $request['idclasse2'];
        $servico->save();
        return redirect()->route('servico.index')->with('sucesso', 'Servico atualizado com sucesso !');
    }

    // EXCLUIR SERVICO SELECIONADO.
    public function destroy(Request $request)
    {
        Servico::destroy($request->id);
        return redirect()->route('servico.index')->with('sucesso', 'Servico excluido com sucesso !');
    }
}
