@extends('layouts.app')
@section('content')
    <div class="col col-md-8 col-lg-10 mb-5 mb-sm-0">
      <div class="d-flex justify-content-center mt-4"><button class="btn btn-sm btn-success w-100" onclick="exportToImage()">Exportar para Imagem</button></div>
        <div class="card my-2" style="max-width: 270px;" id="playercard">
            @if (Auth::user()->player->overall <= 40)
                <img src="{{ asset('cards/card-bronze.png') }}" class="card-img" alt="card">
            @elseif (Auth::user()->player->overall > 40 && Auth::user()->player->overall <= 70)
                <img src="{{ asset('cards/card-silver.png') }}" class="card-img" alt="card">
            @else
                <img src="{{ asset('cards/card-gold.png') }}" class="card-img" alt="card">
            @endif
            <div class="card-img-overlay text-center">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="d-flex justify-content-start pt-5 mt-3 ms-5">{{ Auth::user()->player->overall }}</h1>
                        <h5 class="d-flex justify-content-start ms-5">{{ Auth::user()->player->position }}</h5>
                    </div>
                    <img class="mt-5" src="{{asset('cards/Player/PROFILE.png')}}"
                        alt="profile" height="150" width="130">
                </div>
                <h4>{{ Auth::user()->name }}</h4>
                @php
                    $totalGoals = 0;
                    $totalAssists = 0;
                    $totalTackles = 0;
                    $totalDefenses = 0;
                @endphp
                @foreach (Auth::user()->player->statistics as $s)
                    @php
                        $totalGoals += $s->goals;
                        $totalAssists += $s->assists;
                        $totalTackles += $s->tackles;
                        $totalDefenses += $s->defenses;
                    @endphp
                @endforeach
                <table class="mt-1 ms-3" style="min-width: 200px">
                    <thead>
                        <th>⚽</th>
                        <th>🦶🏻</th>
                        <th>💪🏻</th>
                        <th>🤲🏻</th>
                    </thead>
                    <thead>
                        <th>GOLS</th>
                        <th>ASS</th>
                        <th>DES</th>
                        <th>DEF</th>
                    </thead>
                    <tbody>
                        <td>{{$totalGoals}}</td>
                        <td>{{$totalAssists}}</td>
                        <td>{{$totalTackles}}</td>
                        <td>{{$totalDefenses}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function exportToImage($eId) {
            html2canvas(document.getElementById('playercard')).then(function(canvas) {
                var img = canvas.toDataURL('image/png');

                // Crie um link para download da imagem
                var link = document.createElement('a');
                link.href = img;
                link.download = 'tabela.png';
                link.click();
            });
        }
    </script>
@endsection
