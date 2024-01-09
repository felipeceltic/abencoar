@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0 pt-5">
        <div class="card">
            <div class="card-header">
                Perfil jogador
            </div>
            @if (session('success'))
                <div class="alert alert-success p-2 m-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('player.update', Auth::user()->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Meu nome</span>
                                <input class="form-control" type="text" name="name" id="name"
                                    aria-describedby="name" required
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->user->name }}" @endif>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="number">Numero da camisa</span>
                                <input class="form-control" type="number" name="number" id="number"
                                    aria-describedby="number" required
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->number }}" @endif>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <select class="form-select mb-3" name="position" id="position" required>
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
                        <hr class="mt-3 pb-3">
                        @php
                            $totalGoals = 0;
                            $totalAssists = 0;
                            $totalTackles = 0;
                            $totalDefenses = 0;
                        @endphp
                        @foreach (Auth::user()->player->statistics as $s)
                            @php
                                $totalGoals += $s->goals;
                                $totalAssists += $s->assists;
                                $totalTackles += $s->tackles;
                                $totalDefenses += $s->defenses;
                            @endphp
                        @endforeach
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="goals">Gols</span>
                                <input class="form-control" type="number" name="goals" id="goals" readonly
                                    aria-describedby="goals"
                                    @if (Auth::user()->player != null) value="{{ $totalGoals }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="assists">Assistencias</span>
                                <input class="form-control" type="number" name="assists" id="assists" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ $totalAssists }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="tackles">Desarmes</span>
                                <input class="form-control" type="number" name="tackles" id="tackles" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ $totalTackles }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="defenses">Defesas GK</span>
                                <input class="form-control" type="number" name="defenses" id="defenses" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ $totalDefenses }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="overall">Overall</span>
                                <input class="form-control" type="number" name="overall" id="overall" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->overall }}" @endif>
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
                    {{ \Carbon\Carbon::today()->format('d/m/Y') }}
                @endif
            </div>
        </div>
    </div>
@endsection
