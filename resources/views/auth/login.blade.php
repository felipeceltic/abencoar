@extends('layouts.guest')
@section('content')
    <div class="d-flex justify-content-center py-5">
        <x-authentication-card-logo />
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-4">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Entra ai bença.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Lembrar de mim!</label>
                            </div>
                            <a class="text-decoration-none" href="{{ route('password.request') }}">Esqueceu a
                                senha?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
