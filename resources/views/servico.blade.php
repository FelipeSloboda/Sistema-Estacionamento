@extends('layoult')
@section('title', 'Serviços')
@section('conteudo')

<h5 class="center">TABELA DE PREÇO DE SERVIÇOS</h5>

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
@if($servicos->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhum serviço cadastrado.</p>
    </div>
</div> 
@endif

<br>
<!-- BOTAO ADD SERVICO -->
<a class="waves-effect waves-light btn green modal-trigger" href="#modalAdicionar"><i class="material-icons left">add</i>ADICIONAR</a>

<!-- MODAL NOVO SERVICO -->
<div id="modalAdicionar" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Adicionar serviço:</h5>  
    <form class="col s12" action="{{route('servico.adicionar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s12">
            <label for="descricao">Descrição do serviço</label>
            <input name="descricao" id="descricao" type="text" class="validate"> 
        </div>
        <div class="input-field col s12">
            <label for="preco">Preço do serviço</label>
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

<!-- TABELA DE SERVICOS -->
@if($servicos->count() >= 1)
<br>
<table class="responsive-table striped centered">
  <thead>
    <tr>
        <th>#ID</th>
        <th>DESCRIÇÃO</th>
        <th>CLASSE</th>
        <th>PREÇO</th>
        <th>ALTERAR</th>
        <th>EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($servicos as $servico)
    <tr>           
      <td>{{$servico->id}}</td>
      <td>{{$servico->descricao}}</td>
      <td>{{$servico->classe}}</td>
      <td>R$ {{ number_format($servico->preco, 2, ',','.')}}</td>
      <td>
          <a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$servico->id}}"><i class="material-icons">refresh</i></a>
      </td>
      <td>
        <form action="{{route('servico.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$servico->id}}">
          <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
        </form>
      </td>
    </tr> 
    @endforeach 
  </tbody>
</table>

<!-- MODAL ATUALIZAR SERVICO --> 
@foreach ($servicos as $servico)
<div id="modalAtualizar-{{$servico->id}}" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">refresh</i>Atualizar serviço:</h5> 
    <form class="col s12" action="{{route('servico.atualizar', $servico->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <input type="hidden" name="id" id="id" value="{{$servico->id}}">
          <label for="descricao">Descrição do serviço</label>
          <input name="descricao" id="descricao" type="text" class="validate" value="{{$servico->descricao}}"> 
        </div>
        <div class="input-field col s12">
          <label for="preco">Preço do serviço</label>
          <input class="white center" min="1" type="number" name="preco" id="preco" value="{{$servico->preco}}">
        </div>
        <div class="input-field col s12">
          <select name="idclasse2" id="idclasse2">
            <option value="" disabled selected>Selecione</option>
            @foreach ($classes as $classe)
              <option value="{{$classe->id}}">{{$classe->classe}}</option>
            @endforeach
            <label >Classe de veiculo</label>
          </select>
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