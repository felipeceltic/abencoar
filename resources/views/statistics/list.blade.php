@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{route('player.statistics.show')}}" class="btn btn-sm btn-primary">Voltar</a>
                    <button class="btn btn-sm btn-secondary w-50" disabled>{{ $player->user->name }}</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('GK')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='GK'>
                            <thead>
                                <tr>
                                    <th scope="col">Gols</th>
                                    <th scope="col">Assistências</th>
                                    <th scope="col">Desarmes</th>
                                    <th scope="col">Defesas</th>
                                    <th scope="col">Inserido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalGoals = 0;
                                    $totalAssists = 0;
                                    $totalTackles = 0;
                                    $totalDefenses = 0;
                                @endphp
                                @foreach ($player->statistics as $s)
                                    <tr>
                                        <td>{{ $s->goals }}</td>
                                        <td>{{ $s->assists }}</td>
                                        <td>{{ $s->tackles }}</td>
                                        <td>{{ $s->defenses }}</td>
                                        <td>{{ \Carbon\Carbon::parse($s->created_at)->format('d/m/Y') }}</td>
                                    </tr>
                                    @php
                                        $totalGoals += $s->goals;
                                        $totalAssists += $s->assists;
                                        $totalTackles += $s->tackles;
                                        $totalDefenses += $s->defenses;
                                    @endphp
                                @endforeach
                                <tr class="table-dark">
                                    <td>{{ $totalGoals }}</td>
                                    <td>{{ $totalAssists }}</td>
                                    <td>{{ $totalTackles }}</td>
                                    <td>{{ $totalDefenses }}</td>
                                    <td><-- Total</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-secondary" disabled>Defensores</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('DF')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='DF'>
                            <thead>
                                <tr>
                                    <th scope="col" class="text-start">Nome</th>
                                    <th scope="col">Overall</th>
                                    <th scope="col" class="text-end">Estatisticas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'DF')
                                        <tr>
                                            <th scope="row" class="text-start">{{ $p->user->name }}</th>
                                            <td>{{ $p->overall }}</td>
                                            <td class="text-end"><a href="{{route('player.statistics.list', $p->id)}}" class="btn btn-sm btn-primary">Acessar</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-secondary" disabled>Meias</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('MC')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='MC'>
                            <thead>
                                <tr>
                                    <th scope="col" class="text-start">Nome</th>
                                    <th scope="col">Overall</th>
                                    <th scope="col" class="text-end">Estatisticas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'MC')
                                        <tr>
                                            <th scope="row" class="text-start">{{ $p->user->name }}</th>
                                            <td>{{ $p->overall }}</td>
                                            <td class="text-end"><a href="{{route('player.statistics.list', $p->id)}}" class="btn btn-sm btn-primary">Acessar</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-secondary" disabled>Atacantes</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('AT')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='AT'>
                            <thead>
                                <tr>
                                    <th scope="col" class="text-start">Nome</th>
                                    <th scope="col">Overall</th>
                                    <th scope="col" class="text-end">Estatisticas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'AT')
                                        <tr>
                                            <th scope="row" class="text-start">{{ $p->user->name }}</th>
                                            <td>{{ $p->overall }}</td>
                                            <td class="text-end"><a href="{{route('player.statistics.list', $p->id)}}" class="btn btn-sm btn-primary">Acessar</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('scripts')
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function exportToImage($eId) {
            html2canvas(document.getElementById($eId)).then(function(canvas) {
                var img = canvas.toDataURL('image/png');

                // Crie um link para download da imagem
                var link = document.createElement('a');
                link.href = img;
                link.download = 'tabela.png';
                link.click();
            });
        }
    </script>
@endsection
