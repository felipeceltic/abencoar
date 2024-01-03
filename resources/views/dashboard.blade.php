<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="container text-center p-0 m-0">
    <div class="row">
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
        <div class="col-10 d-flex justify-content-center py-3">
            <div class="card text-center w-100">
                <div class="card-header">
                    Perfil jogador
                </div>
                @if (session('success'))
                    <div class="alert alert-success p-2 m-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('createUpdatePlayer', Auth::user()->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="number">Numero da camisa</span>
                                    <input class="form-control" type="number" name="number" id="number"
                                        aria-describedby="number" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->number }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <select class="form-select mb-3" name="position" id="position">
                                    <option value="GK" @if (Auth::user()->player != null && Auth::user()->player->position == 'GK') selected @endif>
                                        Goleiro
                                    </option>
                                    <option value="DF" @if (Auth::user()->player != null && Auth::user()->player->position == 'DF') selected @endif>
                                        Defensor
                                    </option>
                                    <option value="MC" @if (Auth::user()->player != null && Auth::user()->player->position == 'MC') selected @endif>
                                        Meia
                                    </option>
                                    <option value="AT" @if (Auth::user()->player != null && Auth::user()->player->position == 'AT') selected @endif>
                                        Atacante
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="goals">Gols</span>
                                    <input class="form-control" type="number" name="goals" id="goals" readonly
                                        aria-describedby="goals" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->goals }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="assists">Assistencias</span>
                                    <input class="form-control" type="number" name="assists" id="assists" readonly
                                        aria-describedby="number" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->assists }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="tackles">Desarmes</span>
                                    <input class="form-control" type="number" name="tackles" id="tackles" readonly
                                        aria-describedby="number" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->tackles }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="defenses">Defesas GK</span>
                                    <input class="form-control" type="number" name="defenses" id="defenses" readonly
                                        aria-describedby="number" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->defenses }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="overall">Overall</span>
                                    <input class="form-control" type="number" name="overall" id="overall" readonly
                                        aria-describedby="number" @if (Auth::user()->player != null)
                                        value="{{ Auth::user()->player->overall }}"
                                        @endif>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-success" type="submit">Salvar</button>
                    </form>
                </div>
                <div class="card-footer text-body-secondary">
                    @if (Auth::user()->player != null)
                        {{ \Carbon\Carbon::parse(Auth::user()->player->updated_at)->format('d/m/Y') }}
                    @else
                        {{\Carbon\Carbon::today()->format('d/m/Y') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
