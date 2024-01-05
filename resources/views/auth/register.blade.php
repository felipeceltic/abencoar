@extends('layouts.guest')
@section('content')
    <div class="d-flex justify-content-center py-3">
        <x-authentication-card-logo />
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-4">
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                            required autocomplete="username">
                        <div id="nameHelp" class="form-text">Cadastra ai bença.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            autocomplete="useremail">
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
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a class="text-decoration-none" href="{{ route('login') }}">Já possui cadastro?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
