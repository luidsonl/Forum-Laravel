<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">


    <div class="container">
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

      @auth


        <ul class="navbar-nav me-sm-auto">
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('supports.index') ? 'active' : '' }}" href="{{ route('supports.index') }}">Todos supports</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('supports.my') ? 'active' : '' }}" href="{{ route('supports.my') }}">Meus supports</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ request()->routeIs('supports.create') ? 'active' : '' }}" href="{{ route('supports.create') }}">Pedir support</a>

          </li>

        </ul>
        <ul class="navbar-nav ms-sm-auto">
          <li>
            <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">{{Auth::user()->name}}</a>

          </li>
        </ul>

        @else
        
        <ul class="navbar-nav ms-sm-auto">
            <li class="nav-item me-3">
              <a class="nav-link {{ request()->routeIs('user.login') ? 'active' : '' }}" href="{{ route('user.login') }}">Logar</a>
              </li>
              <li class="nav-item me-3">
                <a class="nav-link {{ request()->routeIs('user.signup') ? 'active' : '' }}" href="{{ route('user.signup') }}">Cadastrar</a>
              </li>
        </ul>

        @endauth
      </div>
    </div>
</nav>
