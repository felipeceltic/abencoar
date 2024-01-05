<div class="col d-none d-sm-block">
    <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary position-fixed"
        style="min-height: 100vh; max-height: 100%;">
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
            @if (Auth::user()->is_admin == true)
                <li>
                    <a href="{{ route('player.index') }}"
                        class="nav-link @if ($page === 'Players') active @endif py-3 border-bottom rounded-0">
                        Listar Jogadores
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
            @endif
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

<div class="d-sm-none fixed-bottom mb-3">
    <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
        <i class="bi bi-list"> Menu</i>
    </button>
</div>
<!-- Sidebar para dispositivos móveis -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="col d-block d-sm-none">

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
                @if (Auth::user()->is_admin == true)
                    <li>
                        <a href="{{ route('player.index') }}"
                            class="nav-link @if ($page === 'Players') active @endif py-3 border-bottom rounded-0">
                            Listar Jogadores
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
                @endif
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
</div>
