<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acesso;
use App\Models\Classe;

class AcessoController extends Controller
{

    public function index()
    {
        $acessos = Acesso::all();
        $classes = Classe::all();
        return view('acesso', compact('acessos','classes'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Acesso $acesso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acesso $acesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acesso $acesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acesso $acesso)
    {
        //
    }
}
