@extends('layouts.guest')
@section('content')
    <div class="d-flex justify-content-center py-3">
        <x-authentication-card-logo />
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-4">
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                        :value="old('email', $request->email)" required autofocus autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" required
                            autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <div class="mb-3 form-check">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Concluir</button>
                            <a class="text-decoration-none" href="{{ route('login') }}">Já possui cadastro?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
