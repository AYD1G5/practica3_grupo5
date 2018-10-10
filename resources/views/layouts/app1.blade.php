<!DOCTYPE html>
<!-- saved from url=(0030)https://bootswatch.com/flatly/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Bases 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/codemirror.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/codemirror.css') }}">
    <!-- required modeler styles -->
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@1.1.1/dist/assets/diagram-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@1.1.1/dist/assets/bpmn-font/css/bpmn.css">

    <!-- modeler distro -->
    <script src="https://unpkg.com/bpmn-js@1.1.1/dist/bpmn-modeler.development.js"></script>

    <!-- needed for this example only -->
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
     <!-- example styles -->
     <style>
      html, body, #canvas {
        height: 100%;
        padding: 0;
        margin: 0;
      }
      .diagram-note {
        background-color: rgba(66, 180, 21, 0.7);
        color: White;
        border-radius: 5px;
        font-family: Arial;
        font-size: 12px;
        padding: 5px;
        min-height: 16px;
        width: 50px;
        text-align: center;
      }
      .needs-discussion:not(.djs-connection) .djs-visual > :nth-child(1) {
        stroke: rgba(66, 180, 21, 0.7) !important; /* color elements as red */
      }
      #save-button {
        position: fixed;
        bottom: 20px;
        left: 20px;
      }
    </style>
                @yield('encabezado')
  </head>
  <body style="" class="">
  <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="">
      <div class="container">
        <a href="#" class="navbar-brand">[BD1] Proyecto 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            @guest
            <ul class="nav navbar-nav ml-auto">
                      <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    </ul>
                    </div>
      </div>
    </div>
<br />
<br />
<br />
<br />
    <div class="container">
      <main class="py-4">
            @yield('content')
        </main>
    </div>
            @else
            <ul class="navbar-nav">
              <?php
              $BanderaPermiso2 = False;
              $BanderaPermiso3 = False;
              $BanderaPermiso5 = False;
              $BanderaPermiso6 = False;
              $BanderaPermiso7 = False;
              $BanderaPermiso8 = False;
              $temp = Auth::user()->id;
              $idUsuario1 = App\DetallePermiso::where('user_id',$temp)->get();
              $Bandera = False;
              foreach ($idUsuario1 as $val1) {
                if($val1->permisos_id == 4){
                  $Bandera = True;
                }
              }
              if($Bandera == True){
                    foreach ($idUsuario1 as $valor) {
                      if($valor->permisos_id == 1){
                        echo "<li class=\"nav-item dropdown\">".
                             "<a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"download\" aria-expanded=\"false\">Ver Reportes<span class=\"caret\"></span></a>".
                             "<div class=\"dropdown-menu\" aria-labelledby=\"download\">".
                             "<a class=\"dropdown-item\" href=\"/home\">Reporte1</a>".
                             "<a class=\"dropdown-item\" href=\"/Usuario\">Reporte2</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte3</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte4</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte5</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte6</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte7</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte8</a>".
                             "<a class=\"dropdown-item\" href=\"{{ url(\'/clientes\') }}\">Reporte9</a>".
                             "</div>".
                             "</li>"
                             ;
                      }
                      if($valor->permisos_id == 2){
                        //echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Crear Proceso</a> </li>";
                        $BanderaPermiso2 = True;
                      }
                      if($valor->permisos_id == 3){
                        //echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Atender Gestion</a> </li>";
                        $BanderaPermiso3 = True;
                      }
                      //PERMISO = 4 <=> ES PARA LOGEARSE
                      if($valor->permisos_id == 5){
                      //  echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Iniciar Gestion</a> </li>";
                      $BanderaPermiso5 = True;
                      }
                      if($valor->permisos_id == 6){
                      //  echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Eliminar Gestion</a> </li>";
                        $BanderaPermiso6 = True;
                      }
                      if($valor->permisos_id == 7){
                        //echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Modificar Proceso</a> </li>";
                        $BanderaPermiso7 = True;
                      }
                      if($valor->permisos_id == 8){
                        //echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ url(\'/clientes\') }}\">Eliminar Proceso</a> </li>";
                        $BanderaPermiso8 = True;
                      }
                    }
                    echo "<li class=\"nav-item dropdown\">".
                         "<a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"permisos\" aria-expanded=\"false\">Ver Permisos<span class=\"caret\"></span></a>".
                         "<div class=\"dropdown-menu\" aria-labelledby=\"permisos\">".
                         (($BanderaPermiso2 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Crear Proceso</a>":"").
                         (($BanderaPermiso3 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Atender Gestion</a>":"").
                         (($BanderaPermiso5 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Iniciar Gestion</a>":"").
                         (($BanderaPermiso6 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Eliminar Gestion</a>":"").
                         (($BanderaPermiso7 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Modificar Proceso</a>":"").
                         (($BanderaPermiso8 == True) ? "<a class=\"dropdown-item\" href=\"/home\">Eliminar Proceso</a>":"").
                         "</div>".
                         "</li>"
                         ;


                         $usuarioTemp = Auth::user();
                         echo "<li class=\"nav-item dropdown\">".
                         "<a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"https://bootswatch.com/flatly/#\" id=\"download\" aria-expanded=\"false\">Modulos<span class=\"caret\"></span></a>".
                         "<div class=\"dropdown-menu\" aria-labelledby=\"download\">";
                         if($usuarioTemp->departamento == 1){
                           echo "<a class=\"dropdown-item\" href=\"/modulos/Produccion\">Produccion</a>";
                         }else if($usuarioTemp->departamento ==2){
                           echo "<a class=\"dropdown-item\" href=\"/modulos/Fabricacion\">Fabricacion</a>";
                         }else if($usuarioTemp->departamento ==3){
                           echo "<a class=\"dropdown-item\" href=\"/modulos/Produccion\">Produccion</a>";
                           echo "<a class=\"dropdown-item\" href=\"/modulos/Fabricacion\">Fabricacion</a>";
                         }
                         "</div>".
                       "</li>";

                       echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/notificaciones\">Notificaciones</a></li>";

              }
                ?>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                  </ul>

        </div>
      </div>
    </div>
<br />
<br />
<br />
<br />
 @if ($Bandera)
            @yield('content')
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

              <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <H1>Cuenta Bloqueada</H1>
                    No tienes permiso para logearte, ponte en comunicacion con un Administrador!
               </div>
               
            </div>
        </div>
    </div>
    
</div>
 
@endif
@endguest

    <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
