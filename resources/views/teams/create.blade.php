@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10">
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
                <form action="{{ route('team.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Nome do time</span>
                                <input class="form-control" type="name" name="name" id="name"
                                    aria-describedby="name" required>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select mb-3" multiple name="players[]" id="players" required>
                                @foreach ($players as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Salvar</button>
                </form>
            </div>
            <div class="card-footer text-body-secondary">
                {{ \Carbon\Carbon::parse(Auth::user()->player->updated_at)->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
