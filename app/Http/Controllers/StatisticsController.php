<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function statisticsCreate()
    {
        $page = 'PlayersStatistics';
        $players = Player::all();

        return view('statistics.create', compact('players', 'page'));
    }

    public function showPlayerStatistics()
    {
        $page = 'PlayersStatistics';
        $players = Player::all();

        return view('statistics.statistics', compact('players', 'page'));
    }

    public function listPlayerStatistics(Player $player)
    {
        $page = 'PlayersStatistics';

        return view('statistics.list', compact('player', 'page'));
    }

    public function updatePlayerStatistics(Request $request)
    {

        foreach ($request->players as $player) {

            $jogador = Player::find($player['player_id']);
            
            $player['user_id'] = Auth::user()->id;

            $statistic = new Statistics;
            foreach ($player as $d => $v) {

                if ($v != null) {
                    $statistic->$d = $v;

                    if ($d != 'player_id' && $d != 'user_id') {
                        $jogador->overall += $v;
                        $jogador->save();
                    }
                    
                }

            }
            $statistic->save();
        }

        return redirect()->back()->with('success', 'Estatisticas do jogador atualizadas com sucesso!');
    }
}
