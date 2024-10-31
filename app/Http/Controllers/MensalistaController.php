<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mensalista;
use App\Models\Classe;

class MensalistaController extends Controller
{
    public function index()
    {
        $mensalistas = DB::table('mensalistas')
        ->join('classes', 'mensalistas.id_classe', '=', 'classes.id')
        ->select('mensalistas.*', 'classes.classe',)
        ->get();

    $classes = Classe::all();
    return view('mensalista', compact('mensalistas','classes'));  
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $idclasse = $_POST['idclasse1'];        
        $mensalista = $request->all();
        $mensalista['id_classe'] = $idclasse;
        $mensalista['status'] = 'ativo';
        Mensalista::Create($mensalista);

        return redirect()->route('mensalista.index')->with('sucesso', 'Mensalista cadastrado com sucesso !');
    }

    public function show(Mensalista $mensalista)
    {
        
    }

    public function edit(Mensalista $mensalista)
    {
        
    }

    public function update(Request $request, Mensalista $mensalista)
    {
        $mensalista = Mensalista::find($request['id']);
        $mensalista->placa = $request['placa'];
        $mensalista->nome = $request['nome']; 
        $mensalista->sobrenome = $request['sobrenome'];
        $mensalista->telefone = $request['telefone'];
        $mensalista->email = $request['email'];
        $mensalista->status = $request['status'];;
        $mensalista->id_classe = $request['idclasse2'];
        $mensalista->save();
        return redirect()->route('mensalista.index')->with('sucesso', 'Mensalista atualizado com sucesso !');
    }

    public function destroy(Request $request)
    {
        Mensalista::destroy($request->id);
        return redirect()->route('mensalista.index')->with('sucesso', 'Mensalista excluido com sucesso !');
    }
}