@extends('layouts.guest')
@section('content')
    <div class="d-flex justify-content-center py-3">
        <x-authentication-card-logo />
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-4">
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required
                            autocomplete="useremail">
                        <div id="nameHelp" class="form-text">Vê se não esquece mais boy!</div>
                    </div>
                    <div class="mb-3 form-check">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Enviar email!</button>
                            <a class="text-decoration-none" href="{{ route('login') }}">Lembrasse!?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
