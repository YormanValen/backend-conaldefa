<head>
  <style>
     .nav-link {
       color: #3b8da9;
       font-weight: 500;
       font-size: 1.1vw;
       position: relative;
       padding: 0;
     }

     .nav-link::before{
      content: "";
      background-color: #3b8da9;
      position: absolute;
      left: 0;
      height: 2px;
      padding: 0;
      border-radius: 1vw;
      bottom: 1%;
      width: 0;
      transition: all .4s
     }

     .nav-link:hover::before{
      width: 100%;
     }

     .btn {
      font-size: 1.1vw;
     }

     .btn_registrar{

     }

     

  </style>
</head>

<header class="p-3 bg-white shadow-sm text-white">
  <div class="container">
    <div class="d-flex  align-items-center justify-content-center justify-content-lg-start">
      @auth

      <ul class="nav col-12 d-flex gap-3 align-items-center col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('home.index') }}" class="nav-link  ">Home</a></li>
        <li><a href="{{ route('noticias.index') }}" class="nav-link  ">Noticias y eventos</a></li>
        <li><a href="{{ route('resolutions.index') }}" class="nav-link  ">Resoluciones</a></li>
        <li><a href="{{ route('importar-egresados') }}" class="nav-link  ">Actualizar base de datos de egresados</a></li>
        <li>
          <div class="text-end">
            <a href="{{ route('register.show') }}" class="btn btn_registrar btn-primary"><span>Registrar nuevo admin</span></a>
          </div>
        </li>


      </ul>
      @endauth

      @auth
      <div class="text-end px-2 d-flex g-2">
        <div class="btns_ctn d-flex">
          <a href="{{ route('logout.perform') }}" class="btn btn-danger  me-2">Cerrar Sesión</a>
          <a href="https://conaldefa.org" class="btn btn-info me-2">Volver al sitio</a>
        </div>
      </div>
      @endauth

      @guest
      <div class="text-end">
        <a href="{{ route('login.perform') }}" class="btn btn-success me-2">Iniciar Sesión</a>
        <a href="https://conaldefa.org" class="btn btn-primary me-2">Volver al sitio</a>

      </div>
      @endguest

      @auth

      @endauth

    </div>
  </div>
</header>