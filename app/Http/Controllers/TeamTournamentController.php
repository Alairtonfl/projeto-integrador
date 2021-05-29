<?php

namespace App\Http\Controllers;

use App\Events\EventCreateTeam;
use App\Models\Team;
use App\Models\TeamTournament;
use Illuminate\Http\Request;

class TeamTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\TeamTournament  $teamTournament
     * @return \Illuminate\Http\Response
     */
    public function show(TeamTournament $teamTournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamTournament  $teamTournament
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamTournament $teamTournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamTournament  $teamTournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamTournament $teamTournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamTournament  $teamTournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamTournament $teamTournament)
    {
        //
    }

    public function includeTeam(Request $request, $tournament_id){
      $this->validate($request, [
        'teamSelect' => 'required'
      ]);
      $team_tournament = new TeamTournament();
      $team_tournament->team_id = $request->teamSelect;
      $team_tournament->tournament_id = $tournament_id;
      $team_tournament->active = true;
      $team_tournament->save();
      return redirect()->back();
    }
}
