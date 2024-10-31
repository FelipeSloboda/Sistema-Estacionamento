<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\TabelaController;
use App\Http\Controllers\MensalistaController;
use App\Http\Controllers\AcessoController;

// ESTACIONAMENTO - ROTAS

// AUTENTICACAO LOGIN
Route::view('/login', 'login')->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// HOME :
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// CLASSES: 
Route::get('/classe/listar', [ClasseController::class, 'index'])->name('classe.index');
Route::post('/classe/atualizar', [ClasseController::class, 'update'])->name('classe.atualizar');
Route::post('/classe/excluir', [ClasseController::class, 'destroy'])->name('classe.excluir');
Route::post('/classe/adicionar', [ClasseController::class, 'store'])->name('classe.adicionar');

// SERVIÇOS: 
Route::get('/servico/listar', [ServicoController::class, 'index'])->name('servico.index');
Route::post('/servico/atualizar', [ServicoController::class, 'update'])->name('servico.atualizar');
Route::post('/servico/excluir', [ServicoController::class, 'destroy'])->name('servico.excluir');
Route::post('/servico/adicionar', [ServicoController::class, 'store'])->name('servico.adicionar');

// VAGAS: 
Route::get('/vaga/listar', [VagaController::class, 'index'])->name('vaga.index');
Route::post('/vaga/atualizar', [VagaController::class, 'update'])->name('vaga.atualizar');
Route::post('/vaga/excluir', [VagaController::class, 'destroy'])->name('vaga.excluir');
Route::post('/vaga/adicionar', [VagaController::class, 'store'])->name('vaga.adicionar');

// TABELA: 
Route::get('/tabela/listar', [TabelaController::class, 'index'])->name('tabela.index');
Route::post('/tabela/atualizar', [TabelaController::class, 'update'])->name('tabela.atualizar');
Route::post('/tabela/excluir', [TabelaController::class, 'destroy'])->name('tabela.excluir');
Route::post('/tabela/adicionar', [TabelaController::class, 'store'])->name('tabela.adicionar');

// MENSALISTA: 
Route::get('/mensalista/listar', [MensalistaController::class, 'index'])->name('mensalista.index');
Route::post('/mensalista/atualizar', [MensalistaController::class, 'update'])->name('mensalista.atualizar');
Route::post('/mensalista/excluir', [MensalistaController::class, 'destroy'])->name('mensalista.excluir');
Route::post('/mensalista/adicionar', [MensalistaController::class, 'store'])->name('mensalista.adicionar');

// ACESSO : 
Route::get('/acesso/listar', [AcessoController::class, 'index'])->name('acesso.index');
Route::post('/acesso/atualizar', [AcessoController::class, 'update'])->name('acesso.atualizar');
Route::post('/acesso/excluir', [AcessoController::class, 'destroy'])->name('acesso.excluir');
Route::post('/acesso/adicionar', [AcessoController::class, 'store'])->name('acesso.adicionar');