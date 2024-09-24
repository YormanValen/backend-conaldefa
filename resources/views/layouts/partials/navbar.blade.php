<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>

      @auth

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-white">Home</a></li>
      <li><a href="{{ route('noticias.index') }}" class="nav-link px-2 text-white">Noticias y eventos</a></li>
      <li><a href="{{ route('resolutions.index') }}" class="nav-link px-2 text-white">Resoluciones</a></li>
      <li><a href="{{ route('importar-egresados') }}" class="nav-link px-2 text-white">Actualizar base de datos de egresados</a></li>


    </ul>
  @endauth

      @auth
    {{auth()->user()->name}}
    <div class="text-end px-2">
      <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Cerrar Sesión</a>
      <a href="https://conaldefa.org" class="btn btn-outline-light me-2">Volver al sitio</a>
    </div>
  @endauth

      @guest
    <div class="text-end">
      <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Iniciar Sesión</a>
      <a href="https://conaldefa.org" class="btn btn-outline-light me-2">Volver al sitio</a>

    </div>
  @endguest

      @auth
    <div class="text-end">
      <a href="{{ route('register.show') }}" class="btn btn-warning">Registrar nuevo admin</a>
    </div>
  @endauth

    </div>
  </div>
</header>