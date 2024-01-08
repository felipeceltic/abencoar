@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
        <div class="card my-2">
            <div class="card-header">
                <span>Goleiros</span>
                <div class="card-body">
                  <table class="table table-striped table-hover table-responsive">
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

        <div class="card my-2">
            <div class="card-header">
                <span>Defensores</span>
                <div class="card-body">
                  <table class="table table-striped table-hover table-responsive">
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

        <div class="card my-2">
            <div class="card-header">
                <span>Meias</span>
                <div class="card-body">
                  <table class="table table-striped table-hover table-responsive">
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

        <div class="card my-2">
            <div class="card-header">
                <span>Atacantes</span>
                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive">
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
@endsection
