@extends('layoult')
@section('title', 'Classes')
@section('conteudo')

<h5 class="center">CLASSIFICAÇÃO DE TIPOS DE VEICULOS</h5>

<!-- MSG SUCESSO -->
@if ($mensagem = Session::get('sucesso'))    
<div class="card green">
    <div class="card-content white-text">
      <span class="card-title">Sucesso</span>
      <p>{{$mensagem}}</p>
    </div>
</div>  
@endif
   
<!-- MSG VAZIO -->
@if($classes->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhuma classe cadastrada.</p>
    </div>
</div> 
@endif

<br>
<!-- BOTAO ADD CLASSES -->
<a class="waves-effect waves-light btn green modal-trigger" href="#modalAdicionar"><i class="material-icons left">add</i>ADICIONAR</a>

<!-- MODAL NOVA CLASSE -->
<div id="modalAdicionar" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Adicionar classe:</h5>  
    <form class="col s12" action="{{route('classe.adicionar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <label for="classe">Nome da classe</label>
          <input name="classe" id="classe" type="text" class="validate"> 
        </div>    
        <button type="submit" class="waves-effect waves-green btn green right">CADASTRAR<i class="material-icons right">arrow_forward</i></button>
        <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
        <br>
      </div>
    </form>
  </div>
</div>

<!-- TABELA DE CLASSES -->
@if($classes->count() >= 1)
<br>
<table class="responsive-table striped centered">
    <thead>
      <tr>
          <th>#ID</th>
          <th>CLASSE</th>
          <th>ALTERAR</th>
          <th>EXCLUIR</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($classes as $classe)
      <tr>           
        <td>{{$classe->id}}</td>
        <td>{{$classe->classe}}</td>
          <input type="hidden" name="id" value="{{$classe->id}}">
          <td><a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$classe->id}}"><i class="material-icons">refresh</i></a></td>
        <form action="{{route('classe.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$classe->id}}">
          <td><button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></button></td>
        </form>
      </tr> 

      <!-- MODAL ATUALIZAR CLASSE -->
      <div id="modalAtualizar-{{$classe->id}}" class="modal">
        <div class="modal-content">
          <h5><i class="material-icons">refresh</i>Atualizar classe:</h5> 
          <form class="col s12" action="{{route('classe.atualizar', $classe->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="input-field col s12">
                <input type="hidden" name="id" id="id" value="{{$classe->id}}">
                <input name="classe" id="classe" type="text" class="validate" value="{{$classe->classe}}"> 
              </div>    
              <button type="submit" class="waves-effect waves-green btn orange right">ATUALIZAR<i class="material-icons right">refresh</i></button>
              <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
              <br>
            </div>
          </form>
        </div>
      </div>
      @endforeach 
    </tbody>
</table>
@endif
@endsection