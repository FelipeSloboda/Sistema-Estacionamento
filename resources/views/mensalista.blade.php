@extends('layoult')
@section('title', 'Mensalistas')
@section('conteudo')

<h5 class="center">CADASTRO DE CLIENTES MENSALISTAS</h5>

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
@if($mensalistas->count() == 0)
<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Vazio</span>
      <p>Nenhum mensalista cadastrado.</p>
    </div>
</div> 
@endif

<br>
<!-- BOTAO ADD MENSALISTA -->
<a class="waves-effect waves-light btn green modal-trigger" href="#modalAdicionar"><i class="material-icons left">add</i>ADICIONAR</a>

<!-- MODAL NOVA MENSALISTA -->
<div id="modalAdicionar" class="modal">
  <div class="modal-content">
    <h5><i class="material-icons">add_box</i>Adicionar mensalista:</h5>  
    <form class="col s12" action="{{route('mensalista.adicionar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <label for="placa">Placa</label>
          <input name="placa" id="placa" type="text" class="validate"> 
        </div>    
        <div class="input-field col s6">
            <select id="idclasse1" name="idclasse1">
                <option value="" disabled selected>Selecione...</option>
                @foreach($classes as $classe)
                  <option value="{{$classe->id}}">{{$classe->classe}}</option>
                @endforeach
            </select>
            <label>Classe de veiculo</label>
        </div>    
        <div class="input-field col s6">
            <label for="nome">Nome</label>
            <input name="nome" id="nome" type="text" class="validate"> 
          </div> 
        <div class="input-field col s6">
            <label for="sobrenome">Sobrenome</label>
            <input name="sobrenome" id="sobrenome" type="text" class="validate"> 
        </div> 
        <div class="input-field col s6">
            <label for="telefone">Telefone</label>
            <input name="telefone" id="telefone" type="text" class="validate"> 
        </div> 
        <div class="input-field col s6">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="validate"> 
        </div> 
        <button type="submit" class="waves-effect waves-green btn green right">CADASTRAR<i class="material-icons right">arrow_forward</i></button>
        <a href="#!" class="modal-close waves-effect waves-green btn red right"><i class="material-icons left">cancel</i>CANCELAR</a><br>
        <br>
      </div>
    </form>
  </div>
</div>

<!-- TABELA DE MENSALIDADE -->
@if($classes->count() >= 1)
<br>
<table class="responsive-table striped centered">
  <thead>
    <tr>
      <th>#ID</th>
      <th>PLACA</th>
      <th>NOME</th>
      <th>TELEFONE</th>
      <th>EMAIL</th>
      <th>CLASSE</th>
      <th>STATUS</th>
      <th>ALTERAR</th>
      <th>EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mensalistas as $mensalista)
    <tr>           
      <td>{{$mensalista->id}}</td>
      <td>{{$mensalista->placa}}</td>
      <td>{{$mensalista->nome ." ". $mensalista->sobrenome}}</td>
      <td>{{$mensalista->telefone}}</td>
      <td>{{$mensalista->email}}</td>
      <td>{{$mensalista->classe}}</td>
      <td>{{$mensalista->status}}</td>
      <td>
        <a class="btn-floating waves-effect waves-light orange modal-trigger" href="#modalAtualizar-{{$mensalista->id}}"><i class="material-icons">refresh</i></a>
      </td>
      <td>
        <form action="{{route('mensalista.excluir')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$mensalista->id}}">
          <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></button>
        </form>
      </td>
    </tr> 
    @endforeach 
  </tbody>
</table>

<!-- MODAL ATUALIZAR MENSALISTA -->
@foreach ($mensalistas as $mensalista)
<div id="modalAtualizar-{{$mensalista->id}}" class="modal">
  <div class="modal-content">
  <h5><i class="material-icons">refresh</i>Atualizar mensalista:</h5> 
    <form class="col s12" action="{{route('mensalista.atualizar', $mensalista->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <input type="hidden" name="id" id="id" value="{{$mensalista->id}}">
          <label for="placa">Placa</label>
          <input name="placa" id="placa" type="text" class="validate" value="{{$mensalista->placa}}"> 
        </div> 
        <div class="input-field col s6">
          <select id="idclasse2" name="idclasse2">      
            <option value="" disabled selected>Selecione...</option>
            @foreach($classes as $classe)
              <option value="{{$classe->id}}">{{$classe->classe}}</option>                        
            @endforeach   
          </select>
          <label>Classe de veiculo</label>
        </div>    
        <div class="input-field col s6">
          <label for="nome">Nome</label>
          <input name="nome" id="nome" type="text" class="validate" value="{{$mensalista->nome}}"> 
        </div> 
        <div class="input-field col s6">
          <label for="sobrenome">Sobrenome</label>
          <input name="sobrenome" id="sobrenome" type="text" class="validate" value="{{$mensalista->sobrenome}}"> 
        </div> 
        <div class="input-field col s6">
          <label for="telefone">Telefone</label>
          <input name="telefone" id="telefone" type="text" class="validate" value="{{$mensalista->telefone}}"> 
        </div> 
        <div class="input-field col s6">
          <label for="email">Email</label>
          <input name="email" id="email" type="email" class="validate" value="{{$mensalista->email}}"> 
        </div>  
        <div class="input-field col s12">
          <select id="status" name="status">
            <option value="" disabled selected>Selecione...</option>
            <option value="ativo">ativo</option>
            <option value="inativo">inativo</option>
          </select>
          <label>Status</label>
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