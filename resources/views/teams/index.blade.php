@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
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
                                        <form action="{{ route('updatePlayerStatistics', $player->id) }}" method="POST"
                                            id="{{ $player->id }}">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <button type="submit"
                                                    class="input-group-text">{{ $player->user->name }}</button>
                                                <input type="number" class="form-control" id="goals{{ $player->id }}"
                                                    name="goals" placeholder="gol" aria-label="gol">
                                                <input type="number" class="form-control" id="assists{{ $player->id }}"
                                                    name="assists" placeholder="ass" aria-label="ass">
                                                <input type="number" class="form-control" id="defenses{{ $player->id }}"
                                                    name="defenses" placeholder="defesa" aria-label="defesa">
                                                <input type="number" class="form-control" id="tackles{{ $player->id }}"
                                                    name="tackles" placeholder="desarme" aria-label="desarme">
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
@endsection
