<div class="col">
  <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="height: 100vh;">
      <a href="/" class="d-flex justify-content-center p-2 text-decoration-none">
          <x-application-logo />
      </a>
      <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
          <li class="nav-item">
              <a href="/"
                  class="nav-link @if ($page === 'home') active @endif py-3 border-bottom rounded-0">
                  Meu jogador
              </a>
          </li>
          <li>
              <a href="{{ route('team.index') }}"
                  class="nav-link @if ($page === 'Teams') active @endif py-3 border-bottom rounded-0">
                  Listar Times
              </a>
          </li>
          <li>
              <a href="{{ route('team.create') }}"
                  class="nav-link @if ($page === 'createTeam') active @endif py-3 border-bottom rounded-0">
                  Criar Times
              </a>
          </li>
      </ul>
      <div class="dropdown border-top">
          <a href="#"
              class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" width="24"
                  height="24" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="/">Home</a></li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <li><button class="dropdown-item" type="submit"">Sair</button></li>
              </form>
          </ul>
      </div>
  </div>
</div>