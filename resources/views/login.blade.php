<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- CDN DO MATERIALIZE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .formlogin{
            /* border: 0.5px solid lightgray; */
            margin: 75px;
        }
        .img{
            text-align: center;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>  
<div class="container">
    <div class="row">
        <form action="{{route('login.auth')}}" method="post" class=" formlogin col s4 push-s4">
        @csrf   
            <img class="img" width="200px" src="/img/logo.jpg">
            <div class="row">
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="email" class="validate" id="email" name="email">
                    <label for="icon_prefix">Email</label>
                </div>
                <br>
                <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_telephone" type="password" class="validate"  id="password" name="password">
                    <label for="icon_telephone">Senha</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light green right" type="submit" name="action">LOGIN<i class="material-icons right">subdirectory_arrow_right</i>
            </button><br><br>
        </form>
    </div>  
</div>

  <!-- CDN MATERIALIZE -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script>M.AutoInit();</script>
</body>
</html>

    