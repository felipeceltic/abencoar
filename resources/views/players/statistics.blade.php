@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-secondary" disabled>Goleiros</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('GK')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='GK'>
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gols</th>
                                    <th scope="col">Assistências</th>
                                    <th scope="col">Desarmes</th>
                                    <th scope="col">Defesas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'GK')
                                        <tr>
                                            <th scope="row">{{ $p->user->name }}</th>
                                            <td>{{ $p->goals }}</td>
                                            <td>{{ $p->assists }}</td>
                                            <td>{{ $p->tackles }}</td>
                                            <td>{{ $p->defenses }}</td>
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
                    <button class="btn btn-sm btn-secondary" disabled>Defensores</button>
                    <button class="btn btn-sm btn-success" onclick="exportToImage('DF')">Exportar para Imagem</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id='DF'>
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gols</th>
                                    <th scope="col">Assistências</th>
                                    <th scope="col">Desarmes</th>
                                    <th scope="col">Defesas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'DF')
                                        <tr>
                                            <th scope="row">{{ $p->user->name }}</th>
                                            <td>{{ $p->goals }}</td>
                                            <td>{{ $p->assists }}</td>
                                            <td>{{ $p->tackles }}</td>
                                            <td>{{ $p->defenses }}</td>
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
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gols</th>
                                    <th scope="col">Assistências</th>
                                    <th scope="col">Desarmes</th>
                                    <th scope="col">Defesas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'MC')
                                        <tr>
                                            <th scope="row">{{ $p->user->name }}</th>
                                            <td>{{ $p->goals }}</td>
                                            <td>{{ $p->assists }}</td>
                                            <td>{{ $p->tackles }}</td>
                                            <td>{{ $p->defenses }}</td>
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
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gols</th>
                                    <th scope="col">Assistências</th>
                                    <th scope="col">Desarmes</th>
                                    <th scope="col">Defesas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $p)
                                    @if ($p->position == 'AT')
                                        <tr>
                                            <th scope="row">{{ $p->user->name }}</th>
                                            <td>{{ $p->goals }}</td>
                                            <td>{{ $p->assists }}</td>
                                            <td>{{ $p->tackles }}</td>
                                            <td>{{ $p->defenses }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
