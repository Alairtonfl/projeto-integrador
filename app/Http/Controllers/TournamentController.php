<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Team;

class TournamentController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $tournaments = Tournament::find($request->id);
        $teams = Team::all();
        $matchs = Matchs::with('team_tournament1')->with('team_tournament2')->with('stats')->get();
        //dd($matchs);
        return view('home.tournament', [
          'tournaments' => $tournaments,
          'teams' => $teams,
          'matchs' => $matchs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nameTournament' => 'required',
            'descTournament' => 'required',
            'teamsTournament' => 'required',
            'prizeTournament' => 'required'
        ]);
        $tournament = new Tournament();
        $tournament->user_id = 1;
        $tournament->name = ucwords($request->nameTournament);
        $tournament->sport = "Footbal";
        $tournament->description = $request->descTournament;
        $tournament->number_teams = $request->teamsTournament;
        $tournament->prize = $request->prizeTournament;
        $tournament->save();
        $tournament = Tournament::count();
        return redirect()->route('indexTournament', ['id' => $tournament]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function includeTeam(Request $request, $tournament_id){
      $this->validate($request, [
        'teamSelect' => 'required'
      ]);
      $tournament = Tournament::find($tournament_id);
      $tournament->teams()->attach($request->teamSelect, [
        'active' => true,
        'phase' => $tournament->number_teams/2,
        'created_at' => now(),
      ]);
      return redirect()->back();
    }
}
