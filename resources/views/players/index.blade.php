@extends('layouts.app')
@section('content')
    <div class="col-10 d-flex justify-content-center py-3">
        <div class="card">
            <div class="card-header">
                <span>Jogadores</span>
                <div class="card-body">
                    @foreach ($players as $p)
                        <form action="{{ route('updatePlayerStatistics', $p->id) }}" method="POST" id="{{ $p->id }}">
                            @csrf
                            <div class="input-group mb-3">
                                <button type="submit" class="input-group-text" style="min-width: 120px">{{ $p->user->name }}</button>
                                <input type="number" class="form-control" id="goals{{ $p->id }}" name="goals"
                                    placeholder="gol" aria-label="gol">
                                <input type="number" class="form-control" id="assists{{ $p->id }}" name="assists"
                                    placeholder="ass" aria-label="ass">
                                <input type="number" class="form-control" id="defenses{{ $p->id }}" name="defenses"
                                    placeholder="defesa" aria-label="defesa">
                                <input type="number" class="form-control" id="tackles{{ $p->id }}" name="tackles"
                                    placeholder="desarme" aria-label="desarme">
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
