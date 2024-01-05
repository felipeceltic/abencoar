@extends('layouts.app')
@section('content')
    <div class="col-10">
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
                <form action="{{ route('createUpdatePlayer', Auth::user()->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="number">Numero da camisa</span>
                                <input class="form-control" type="number" name="number" id="number"
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->number }}" @endif>
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
                                    aria-describedby="goals"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->goals }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="assists">Assistencias</span>
                                <input class="form-control" type="number" name="assists" id="assists" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->assists }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="tackles">Desarmes</span>
                                <input class="form-control" type="number" name="tackles" id="tackles" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->tackles }}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="defenses">Defesas GK</span>
                                <input class="form-control" type="number" name="defenses" id="defenses" readonly
                                    aria-describedby="number"
                                    @if (Auth::user()->player != null) value="{{ Auth::user()->player->defenses }}" @endif>
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
