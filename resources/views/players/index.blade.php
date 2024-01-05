@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10">
        <div class="card my-2">
            <div class="card-header">
                <span>Goleiros</span>
                <div class="card-body">
                    @foreach ($players as $p)
                        @if ($p->position == 'GK')
                            <form action="{{ route('updatePlayerStatistics', $p->id) }}" method="POST"
                                id="{{ $p->id }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <button type="submit" class="input-group-text"
                                        style="min-width: 100px">{{ $p->user->name }}</button>
                                    <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                        placeholder="gol" aria-label="gol">
                                    <input type="number" class="form-control" id="assists{{ $p->id }}"
                                        name="assists" placeholder="ass" aria-label="ass">
                                    <input type="number" class="form-control" id="defenses{{ $p->id }}"
                                        name="defenses" placeholder="defesa" aria-label="defesa">
                                    <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                        name="tackles" placeholder="desarme" aria-label="desarme">
                                </div>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <span>Defensores</span>
                <div class="card-body">
                    @foreach ($players as $p)
                        @if ($p->position == 'DF')
                            <form action="{{ route('updatePlayerStatistics', $p->id) }}" method="POST"
                                id="{{ $p->id }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <button type="submit" class="input-group-text"
                                        style="min-width: 100px">{{ $p->user->name }}</button>
                                    <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                        placeholder="gol" aria-label="gol">
                                    <input type="number" class="form-control" id="assists{{ $p->id }}"
                                        name="assists" placeholder="ass" aria-label="ass">
                                    <input type="number" class="form-control" id="defenses{{ $p->id }}"
                                        name="defenses" placeholder="defesa" aria-label="defesa">
                                    <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                        name="tackles" placeholder="desarme" aria-label="desarme">
                                </div>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-header">
                <span>Meias</span>
                <div class="card-body">
                    @foreach ($players as $p)
                        @if ($p->position == 'MC')
                            <form action="{{ route('updatePlayerStatistics', $p->id) }}" method="POST"
                                id="{{ $p->id }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <button type="submit" class="input-group-text"
                                        style="min-width: 100px">{{ $p->user->name }}</button>
                                    <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                        placeholder="gol" aria-label="gol">
                                    <input type="number" class="form-control" id="assists{{ $p->id }}"
                                        name="assists" placeholder="ass" aria-label="ass">
                                    <input type="number" class="form-control" id="defenses{{ $p->id }}"
                                        name="defenses" placeholder="defesa" aria-label="defesa">
                                    <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                        name="tackles" placeholder="desarme" aria-label="desarme">
                                </div>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card my-2">
          <div class="card-header">
              <span>Atacantes</span>
              <div class="card-body">
                  @foreach ($players as $p)
                      @if ($p->position == 'AT')
                          <form action="{{ route('updatePlayerStatistics', $p->id) }}" method="POST"
                              id="{{ $p->id }}">
                              @csrf
                              <div class="input-group mb-3">
                                  <button type="submit" class="input-group-text"
                                      style="min-width: 100px">{{ $p->user->name }}</button>
                                  <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                      placeholder="gol" aria-label="gol">
                                  <input type="number" class="form-control" id="assists{{ $p->id }}"
                                      name="assists" placeholder="ass" aria-label="ass">
                                  <input type="number" class="form-control" id="defenses{{ $p->id }}"
                                      name="defenses" placeholder="defesa" aria-label="defesa">
                                  <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                      name="tackles" placeholder="desarme" aria-label="desarme">
                              </div>
                          </form>
                      @endif
                  @endforeach
              </div>
          </div>
      </div>
    </div>
@endsection
