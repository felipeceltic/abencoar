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

    public function createOrUpdatePlayer(Request $request, User $user)
    {

        $data = $request->validate([
            'name' => 'required',
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

        $user->name = $data['name'];
        $user->save();

        return redirect()->back()->with('success', 'Jogador atualizado com sucesso');
    }

}
