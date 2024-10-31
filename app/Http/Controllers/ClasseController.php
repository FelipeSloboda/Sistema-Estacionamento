<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{   
    // LISTAR TODAS AS CLASSES.
    public function index()
    {
        $classes = Classe::all();
        return view('classe', compact('classes'));  
    }

    public function create()
    {
        //
    }
    
    // ADICIONAR CLASSE NOVA.
    public function store(Request $request)
    {
        $classe = $request->all();
        Classe::Create($classe);

        return redirect()->route('classe.index')->with('sucesso', 'Classe cadastrado com sucesso !');
    }

    public function show(Classe $classe)
    {
        //
    }

    public function edit(Classe $classe)
    {
        //
    }

    // ATUALIZAR NOME CLASSE SELECIONADA.
    public function update( Request $request, Classe $classe)
    {
        $classe = Classe::find($request['id']);
        $classe->classe = $request['classe'];
        $classe->save();
        return redirect()->route('classe.index')->with('sucesso', 'Classe atualizada com sucesso !');
    }
    
    // EXCLUIR CLASSE SELECIONADA.
    public function destroy(Request $request)
    {
        Classe::destroy($request->id);
        return redirect()->route('classe.index')->with('sucesso', 'Classe excluida com sucesso !');
    }
}
