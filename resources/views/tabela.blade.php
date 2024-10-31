@extends('layoult')
@section('title', 'Tabela')
@section('conteudo')

<h5 class="center">TABELA DE PREÇO ESTACIONAMENTO</h5>

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
@if($tabelas->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhum preço cadastrado.</p>
    </div>
</div> 
@endif

<br>
<!-- BOTAO ADD TABELA -->
<a class="waves-effect waves-light btn green modal-trigger" href="#modalAdicionar"><i class="material-icons left">add</i>ADICIONAR</a>

<!-- MODAL NOVA TABELA -->
<div id="modalAdicionar" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Adicionar tabela:</h5>  
    <form class="col s12" action="{{route('tabela.adicionar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <label for="horas">Quantidade de horas</label>
          <input name="horas" id="horas" type="number" min="0" class="validate"> 
        </div>   
        <div class="input-field col s6">
            <label for="minutos">Quantidade de minutos</label>
            <input name="minutos" id="minutos" type="number" min="0" class="validate"> 
        </div>  
        <div class="input-field col s12">
            <label for="preco">Preço</label>
            <input class="white center" min="1" type="number" name="preco" id="preco">
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

<!-- TABELA DE PREÇO -->
@if($tabelas->count() >= 1)
<br>
<table class="responsive-table striped centered">
  <thead>
    <tr>
      <th>#ID</th>
      <th>TEMPO</th>
      <th>PREÇO</th>
      <th>CLASSE</th>
      <th>ALTERAR</th>
      <th>EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tabelas as $tabela)
    <tr>           
      <td>{{$tabela->id}}</td>
      <td>{{$tabela->tempo}}</td>
      <td>R$ {{ number_format($tabela->preco, 2, ',','.')}}
      <td>{{$tabela->classe}}</td>
      <td>
        <a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$tabela->id}}"><i class="material-icons">refresh</i></a>
      </td>
      <td>
        <form action="{{route('tabela.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$tabela->id}}">
          <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></button>
        </form>
      </td>
    </tr> 
    @endforeach 
  </tbody>
</table>

<!-- MODAL ATUALIZAR TABELA -->
@foreach ($tabelas as $tabela)
<div id="modalAtualizar-{{$tabela->id}}" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">refresh</i>Atualizar tabela:</h5> 
    <form class="col s12" action="{{route('tabela.atualizar', $tabela->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <input type="hidden" name="id" id="id" value="{{$tabela->id}}">
          <label for="horas">Quantidade de horas</label>
          <input name="horas" id="horas" type="number" min="0" class="validate"> 
        </div>   
        <div class="input-field col s6">
          <label for="minutos">Quantidade de minutos</label>
          <input name="minutos" id="minutos" type="number" min="0" class="validate"  value="{{$tabela->tempo}}" value=""> 
        </div>  
        <div class="input-field col s12">
          <label for="preco">Preço</label>
          <input class="white center" min="1" type="number" name="preco" id="preco" value="{{$tabela->preco}}">
        </div>
        <div class="input-field col s12">
          <select id="idclasse2" name="idclasse2">
            <option value="" disabled selected>Selecione...</option>
              @foreach($classes as $classe)
                <option value="{{$classe->id}}">{{$classe->classe}}</option>
              @endforeach
          </select>
          <label>Classe de veiculo</label>
        </div>    
        <button type="submit" class="waves-effect waves-green btn orange right">ATUALIZAR<i class="material-icons right">refresh</i></button>
        <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
        <br>
      </div>
    </form>
  </div>
</div>
@endforeach

@endif

@endsection