@extends('layoult')
@section('title', 'Acesso')
@section('conteudo')

<h5 class="center">CONTROLE DE ACESSOS E PATIO</h5>

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
@if($acessos->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhum acesso cadastrado.</p>
    </div>
</div> 
@endif

<br>
<div class="row">
    <div class="left">
        <!-- BOTAO ACESSO ENTRADA -->
        <a class="waves-effect waves-light btn green modal-trigger" href="#modalEntrada"><i class="material-icons left">add</i>ENTRADA</a>
    </div>
    <div class="right">
        <!-- BOTAO ACESSO SAIDA -->
        <a class="waves-effect waves-light btn orange modal-trigger" href="#modalSaida"><i class="material-icons right">input</i>SAIDA</a>
    </div>
</div>

<!-- MODAL ACESSO ENTRADA -->
<div id="modalEntrada" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Entrada de veiculo:</h5>  
    <form class="col s12" action="{{route('acesso.adicionar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <label for="placa">Placa</label>
                <input name="placa" id="palca" type="text" class="validate"> 
            </div> 
            <div class="input-field col s12">
                <select id="idclasse1" name="idclasse1">      
                <option value="" disabled selected>Selecione...</option>
                @foreach($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->classe}}</option>                        
                @endforeach   
                </select>
                <label>Classe de veiculo</label>
            </div> 
            <button type="submit" class="waves-effect waves-green btn green right">CADASTRAR<i class="material-icons right">arrow_forward</i></button>
            <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
            <br>
      </div>
    </form>
  </div>
</div>

<!-- MODAL ACESSO ENTRADA -->
<div id="modalSaida" class="modal">
    <div class="modal-content">
        <h5><i class="material-icons">input</i>Saida de veiculo:</h5>  
        <form class="col s12" action="{{route('acesso.adicionar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <label for="placa">Placa</label>
                <input name="placa" id="palca" type="text" class="validate"> 
            </div> 
            <button type="submit" class="waves-effect waves-green btn orange right">CADASTRAR<i class="material-icons right">input</i></button>
            <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
            <br>
        </div>
        </form>
    </div>
</div>

<!-- TABELA DO PATIO -->
@if($acessos->count() >= 1)
<br>
<table class="responsive-table striped centered">
    <thead>
      <tr>
          <th>#ID</th>
          <th>PLACA</th>
          <th>ENTRADA</th>
          <th>MODELO</th>
          <th>COR</th>
          <th>OBSERVAÇÕES</th>
          <th>ALTERAR</th>
          <th>EXCLUIR</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($acessos as $acesso)
      <tr>           
        <td>{{$acesso->id}}</td>
        <td>{{$acesso->placa}}</td>
        <td>{{$acesso->entrada}}</td>
        <td>{{$acesso->modelo}}</td>
        <td>{{$acesso->cor}}</td>
        <td>{{$acesso->obs}}</td>

          <input type="hidden" name="id" value="{{$acesso->id}}">
          <td><a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$acesso->id}}"><i class="material-icons">refresh</i></a></td>
        <form action="{{route('acesso.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$acesso->id}}">
          <td><button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></button></td>
        </form>
      </tr> 

      <!-- MODAL ATUALIZAR CLASSE -->
      <div id="modalAtualizar-{{$acesso->id}}" class="modal">
        <div class="modal-content">
          <h5><i class="material-icons">refresh</i>Atualizar classe:</h5> 
          <form class="col s12" action="{{route('classe.atualizar', $acesso->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="input-field col s12">
                <input type="hidden" name="id" id="id" value="{{$acesso->id}}">
                <input name="classe" id="classe" type="text" class="validate" value="{{$acesso->id}}"> 
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