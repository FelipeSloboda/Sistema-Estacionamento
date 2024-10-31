@extends('layoult')
@section('title', 'Vagas')
@section('conteudo')

<h5 class="center">CONTROLE DE QUANTIDADE DE VAGAS</h5>

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
@if($vagas->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhuma vaga cadastrada.</p>
    </div>
</div> 
@endif

<br>
<!-- BOTAO ADD VAGAS -->
<a class="waves-effect waves-light btn green modal-trigger" href="#modalAdicionar"><i class="material-icons left">add</i>ADICIONAR</a>

<!-- MODAL NOVA VAGA -->
<div id="modalAdicionar" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Adicionar vaga:</h5>  
    <form class="col s12" action="{{route('vaga.adicionar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <label for="qtd_vagas">Quantidade de vagas</label>
          <input name="qtd_vagas" id="qtd_vagas" type="number" min="1" class="validate"> 
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

<!-- TABELA DE VAGAS -->
@if($vagas->count() >= 1)
<br>
<table class="responsive-table striped centered">
  <thead>
    <tr>
      <th>#ID</th>
      <th>QTD VAGAS</th>
      <th>CLASSE</th>
      <th>ALTERAR</th>
      <th>EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($vagas as $vaga)
    <tr>           
      <td>{{$vaga->id}}</td>
      <td>{{$vaga->qtd_vagas}}</td>
      <td>{{$vaga->classe}}</td>
      <td>
        <a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$vaga->id}}"><i class="material-icons">refresh</i></a>
      </td>
        <form action="{{route('vaga.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$vaga->id}}">
          <td><button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></button></td>
        </form>
    </tr> 
    @endforeach 
  </tbody>
</table>

<!-- MODAL ATUALIZAR VAGA -->
@foreach ($vagas as $vaga)
<div id="modalAtualizar-{{$vaga->id}}" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">refresh</i>Atualizar vaga:</h5> 
    <form class="col s12" action="{{route('vaga.atualizar', $vaga->id)}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="input-field col s12">
           <input type="hidden" name="id" id="id" value="{{$vaga->id}}">
          <label for="qtd_vagas">Quantidade de vagas</label>
          <input name="qtd_vagas" id="qtd_vagas" type="number" min="1" class="validate" value="{{$vaga->qtd_vagas}}">     
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