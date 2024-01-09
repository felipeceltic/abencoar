@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
        <div class="card my-2">
            <div class="card-header">
                <span>Goleiros</span>
                <div class="card-body">
                    <form action="{{ route('player.statistics.update') }}" method="POST">
                        @csrf
                        @foreach ($players as $p)
                            @if ($p->position == 'GK')
                            <div class="input-group mb-3">
                                <button class="input-group-text" style="min-width: 100px" disabled>{{ $p->user->name }}</button>
                                <input type="hidden" name="players[{{ $p->id }}][player_id]" value="{{ $p->id }}">
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="players[{{ $p->id }}][goals]" placeholder="gol" aria-label="gol">
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="players[{{ $p->id }}][assists]" placeholder="ass" aria-label="ass">
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="players[{{ $p->id }}][defenses]" placeholder="defesa" aria-label="defesa">
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="players[{{ $p->id }}][tackles]" placeholder="desarme" aria-label="desarme">
                            </div>
                            @endif
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-success">Salvar GK</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <span>Defensores</span>
                <div class="card-body">
                    <form action="{{ route('player.statistics.update') }}" method="POST">
                        @csrf
                        @foreach ($players as $p)
                            @if ($p->position == 'DF')
                            <div class="input-group mb-3">
                                <button class="input-group-text" style="min-width: 100px" disabled>{{ $p->user->name }}</button>
                                <input type="hidden" name="players[{{ $p->id }}][player_id]" value="{{ $p->id }}">
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="players[{{ $p->id }}][goals]" placeholder="gol" aria-label="gol">
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="players[{{ $p->id }}][assists]" placeholder="ass" aria-label="ass">
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="players[{{ $p->id }}][defenses]" placeholder="defesa" aria-label="defesa">
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="players[{{ $p->id }}][tackles]" placeholder="desarme" aria-label="desarme">
                            </div>
                            @endif
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-success">Salvar DF</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <span>Meias</span>
                <div class="card-body">
                    <form action="{{ route('player.statistics.update') }}" method="POST">
                        @csrf
                        @foreach ($players as $p)
                            @if ($p->position == 'MC')
                            <div class="input-group mb-3">
                                <button class="input-group-text" style="min-width: 100px" disabled>{{ $p->user->name }}</button>
                                <input type="hidden" name="players[{{ $p->id }}][player_id]" value="{{ $p->id }}">
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="players[{{ $p->id }}][goals]" placeholder="gol" aria-label="gol">
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="players[{{ $p->id }}][assists]" placeholder="ass" aria-label="ass">
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="players[{{ $p->id }}][defenses]" placeholder="defesa" aria-label="defesa">
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="players[{{ $p->id }}][tackles]" placeholder="desarme" aria-label="desarme">
                            </div>
                            @endif
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-success">Salvar MC</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card my-2">
          <div class="card-header">
              <span>Atacantes</span>
              <div class="card-body">
                <form action="{{ route('player.statistics.update') }}" method="POST">
                    @csrf
                    @foreach ($players as $p)
                        @if ($p->position == 'AT')
                        <div class="input-group mb-3">
                            <button class="input-group-text" style="min-width: 100px" disabled>{{ $p->user->name }}</button>
                            <input type="hidden" name="players[{{ $p->id }}][player_id]" value="{{ $p->id }}">
                            <input type="number" class="form-control" id="goals{{ $p->id }}" name="players[{{ $p->id }}][goals]" placeholder="gol" aria-label="gol">
                            <input type="number" class="form-control" id="assists{{ $p->id }}" name="players[{{ $p->id }}][assists]" placeholder="ass" aria-label="ass">
                            <input type="number" class="form-control" id="defenses{{ $p->id }}" name="players[{{ $p->id }}][defenses]" placeholder="defesa" aria-label="defesa">
                            <input type="number" class="form-control" id="tackles{{ $p->id }}" name="players[{{ $p->id }}][tackles]" placeholder="desarme" aria-label="desarme">
                        </div>
                        @endif
                    @endforeach
                    <button type="submit" class="btn btn-sm btn-success">Salvar AT</button>
                </form>
              </div>
          </div>
      </div>
    </div>
@endsection
