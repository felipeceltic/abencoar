<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $page = 'Players';
        $players = Player::all();

        return view('players.index', compact('players', 'page'));
    }

    public function statisticsPlayers()
    {
        $page = 'PlayersStatistics';
        $players = Player::all();

        return view('players.statistics', compact('players', 'page'));
    }

    public function createOrUpdatePlayer(Request $request, User $user)
    {

        $data = $request->validate([
            'number' => 'required',
            'position' => 'required',
        ]);

        if ($user->player === null) {
            $player = new Player([
                'user_id' => $user->id,
                'number' => $data['number'],
                'position' => $data['position']
            ]);

            $player->save();

            return redirect()->back()->with('success', 'Jogador criado com sucesso');
        }

        $user->player->number = $data['number'];
        $user->player->position = $data['position'];
        $user->player->save();

        return redirect()->back()->with('success', 'Jogador atualizado com sucesso');
    }

    public function updatePlayerStatistics(Request $request, Player $player)
    {

        $data = $request->validate([
            'goals' => 'integer|nullable|',
            'assists' => 'integer|nullable',
            'defenses' => 'integer|nullable',
            'tackles' => 'integer|nullable',
        ]);

        foreach ($data as $d => $v) {
            if ($v != null) {
                $player->$d += $v;
                $player->overall += $v;
            }
            $player->save();
        }

        return redirect()->back()->with('success', 'Estatisticas do jogador atualizadas com sucesso!');
    }
}
