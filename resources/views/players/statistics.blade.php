@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
        <div class="card my-2">
            <div class="card-header">
                <span>Goleiros</span>
                <div class="card-body">
                    @foreach ($players as $p)
                        @if ($p->position == 'GK')
                            <div class="input-group mb-3">
                                <button type="submit" class="input-group-text" style="min-width: 100px"
                                    disabled>{{ $p->user->name }}</button>
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                    placeholder="gol" aria-label="gol" value="{{ $p->goals }}" readonly>
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="assists"
                                    placeholder="ass" aria-label="ass" value="{{ $p->assists }}" readonly>
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="defenses"
                                    placeholder="defesa" aria-label="defesa" value="{{ $p->defenses }}" readonly>
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="tackles"
                                    placeholder="desarme" aria-label="desarme" value="{{ $p->tackles }}" readonly>
                            </div>
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
                            <div class="input-group mb-3">
                                <button type="submit" class="input-group-text" style="min-width: 100px"
                                    disabled>{{ $p->user->name }}</button>
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                    placeholder="gol" aria-label="gol" value="{{ $p->goals }}" readonly>
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="assists"
                                    placeholder="ass" aria-label="ass" value="{{ $p->assists }}" readonly>
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="defenses"
                                    placeholder="defesa" aria-label="defesa" value="{{ $p->defenses }}" readonly>
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="tackles"
                                    placeholder="desarme" aria-label="desarme" value="{{ $p->tackles }}" readonly>
                            </div>
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
                            <div class="input-group mb-3">
                                <button type="submit" class="input-group-text" style="min-width: 100px"
                                    disabled>{{ $p->user->name }}</button>
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                    placeholder="gol" aria-label="gol" value="{{ $p->goals }}" readonly>
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="assists"
                                    placeholder="ass" aria-label="ass" value="{{ $p->assists }}" readonly>
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="defenses"
                                    placeholder="defesa" aria-label="defesa" value="{{ $p->defenses }}" readonly>
                                <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                    name="tackles" placeholder="desarme" aria-label="desarme"
                                    value="{{ $p->tackles }}" readonly>
                            </div>
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
                            <div class="input-group mb-3">
                                <button type="submit" class="input-group-text" style="min-width: 100px"
                                    disabled>{{ $p->user->name }}</button>
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                    placeholder="gol" aria-label="gol" value="{{ $p->goals }}" readonly>
                                <input type="number" class="form-control" id="assists{{ $p->id }}"
                                    name="assists" placeholder="ass" aria-label="ass" value="{{ $p->assists }}"
                                    readonly>
                                <input type="number" class="form-control" id="defenses{{ $p->id }}"
                                    name="defenses" placeholder="defesa" aria-label="defesa"
                                    value="{{ $p->defenses }}" readonly>
                                <input type="number" class="form-control" id="tackles{{ $p->id }}"
                                    name="tackles" placeholder="desarme" aria-label="desarme"
                                    value="{{ $p->tackles }}" readonly>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
