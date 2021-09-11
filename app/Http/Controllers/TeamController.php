<?php

namespace App\Http\Controllers;

use App\Events\EventCreateTeam;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;



class TeamController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    //
    $teams = Team::where('id', $request->id)->get();
    $players = Player::where('team_id', $request->id)->get();
    return view('home.team', [
      'teams' => $teams,
      'players' => $players
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request, $tournament_id)
  {
    $this->validate($request, [
      'nameTeam' => 'required',
      //'emblemTeam' => 'required',
      'abreviationTeam' => 'required|max:3'
    ]);
    $team = new Team();
    $team->user_id = 1;
    $team->name = ucwords($request->nameTeam);
    $team->abreviation = strtoupper($request->abreviationTeam);
    $team->emblem = "https://iconape.com/wp-content/png_logo_vector/corinthians-preto-e-dourado-logo.png";
    $team->save();
    $team->tournaments()->attach($tournament_id, [
      'active' => true,
      'phase' => 8
    ]);
    EventCreateTeam::dispatch($team);
    return redirect()->back();
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
  }
}
