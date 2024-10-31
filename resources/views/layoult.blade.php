@auth
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- CDN DO MATERIALIZE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>  
  <!-- MENU -->
  <nav>
    <div class="nav-wrapper blue">
      <a href="/" class="brand-logo"><i class="tiny material-icons left">directions_car</i>ESTACIONAMENTO</a>  
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="{{route('mensalista.index')}}"><i class="tiny material-icons left">person</i>Mensalistas</a></li>
          <li><a href="#"><i class="tiny material-icons left">attach_money</i>Caixa</a></li>
          <li><a href="{{route('acesso.index')}}"><i class="tiny material-icons left">swap_vert</i>Acesso</a></li>
          <li><a href="{{route('tabela.index')}}"><i class="tiny material-icons left">timer</i>Tabela</a></li>
          <li><a href="{{route('vaga.index')}}"><i class="tiny material-icons left">traffic</i>Vagas</a></li>
          <li><a href="{{route('servico.index')}}"><i class="tiny material-icons left">turned_in</i>Serviços</a></li>
          <li><a href="{{route('classe.index')}}"><i class="tiny material-icons left">clear_all</i>Classes</a></li>          
        </ul>
      </div>
  </nav>   
  <!-- FIM MENU -->
  <a href="{{route('login.logout')}}" class="waves-effect waves-light btn red"><i class="material-icons left">input</i></a>

  <!-- CONTEUDO -->
  <div class="container">
    @yield('conteudo')
  </div>
  <!-- CONTEUDO -->
    
  <!-- CDN MATERIALIZE -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script>M.AutoInit();</script>
</body>
</html>

@else
{!! app(App\Http\Controllers\LoginController::class)->redirectLogin(app('request')) !!}
@endauth