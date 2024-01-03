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
            <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="height: 100%;">
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
                    Times
                </div>
                @if (session('success'))
                    <div class="alert alert-success p-2 m-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="rows">
                        @foreach ($teams as $t)
                            <div class="col-12 card-group text-start">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ $t->name }}</span>
                                        <form action="{{ route('team.delete', $t->id) }}" method="post">
                                            @csrf
                                            <button class="btn m-0 p-0 text-danger" type="submit"><i
                                                    class="bi bi-trash">excluir</i></button>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        @foreach (json_decode($t->players) as $p)
                                            @php
                                                $player = App\Models\Player::find($p);
                                            @endphp
                                            <form action="{{ route('updatePlayerStatistics', $player->id) }}"
                                                method="POST" id="{{ $player->id }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <button type="submit"
                                                        class="input-group-text">{{ $player->user->name }}</button>
                                                    <input type="number" class="form-control"
                                                        id="goals{{ $player->id }}" name="goals" placeholder="gol"
                                                        aria-label="gol">
                                                    <input type="number" class="form-control"
                                                        id="assists{{ $player->id }}" name="assists"
                                                        placeholder="ass" aria-label="ass">
                                                    <input type="number" class="form-control"
                                                        id="defenses{{ $player->id }}" name="defenses"
                                                        placeholder="defesa" aria-label="defesa">
                                                    <input type="number" class="form-control"
                                                        id="tackles{{ $player->id }}" name="tackles"
                                                        placeholder="desarme" aria-label="desarme">
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    {{ \Carbon\Carbon::parse(Auth::user()->player->updated_at)->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
