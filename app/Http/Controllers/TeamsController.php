<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {

        $page = 'Teams';

        $teams = Teams::all();

        return view('teams.index', compact('teams', 'page'));
    }

    public function createTeam()
    {

        $page = 'createTeam';

        $teams = Teams::all();
        $players = [];

        if ($teams->count() > 0) {
            $totalTeams = [];
            foreach ($teams as $t) {
                foreach (json_decode($t->players) as $tplayer) {
                    array_push($totalTeams, $tplayer);
                }
            }
            $p = Player::whereNotIn('id', $totalTeams)->get();
            foreach ($p as $pt) {
                array_push($players, $pt);
            }
        } else {
            $players = Player::all();
        };

        return view('teams.create', compact('players', 'page'));
    }

    public function storeTeam(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'players' => 'required'
        ]);

        $team = new Teams([
            'name' => $data['name'],
            'players' => json_encode($data['players'])
        ]);

        $team->save();

        return redirect()->back()->with('success', 'Time criado com sucesso');
    }

    public function deleteTeam(Teams $teams)
    {
        $teams->delete();

        return redirect()->back()->with('success', 'Time deletado!');
    }
}
