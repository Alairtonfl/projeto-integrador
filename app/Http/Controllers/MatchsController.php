<?php

namespace App\Http\Controllers;

use App\Events\EventCreateStats;
use App\Models\Matchs;
use App\Models\Stats;
use Illuminate\Http\Request;

class MatchsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $matchs = Matchs::find(1);
    //dd($matchs->stats());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Stats $stats, $team_tournament_id1, $team_tournament_id2)
  {
    //
    $match = \App\Models\Matchs::factory(1)->create([
      'stats_id' => $stats->id,
      'team_tournament_id1' => $team_tournament_id1,
      'team_tournament_id2' => $team_tournament_id2
    ]);
    $this->winnerVerification($match->first());
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
   * @param  \App\Models\Matchs  $matchs
   * @return \Illuminate\Http\Response
   */
  public function show(Matchs $matchs)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Matchs  $matchs
   * @return \Illuminate\Http\Response
   */
  public function edit(Matchs $matchs)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Matchs  $matchs
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Matchs $matchs)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Matchs  $matchs
   * @return \Illuminate\Http\Response
   */
  public function destroy(Matchs $matchs)
  {
    //
  }

  public function winnerVerification(Matchs $match)
  {
    $match = Matchs::where('id', $match->id)->with('team_tournament1')->with('team_tournament2')->with('stats')->first();
    if ($match->stats()->first()->goals1 < $match->stats()->first()->goals2) {
      $match->team_tournament1()->first()->update(['active' => 0]);
      $match->team_tournament2()->first()->update(['phase' => $match->team_tournament1()->first()->phase/2 ]);
    } else {
      $match->team_tournament2()->first()->update(['active' => 0]);
      $match->team_tournament1()->first()->update(['phase' => $match->team_tournament2()->first()->phase/2 ]);
    }
  }

  public function playoffs($teams){
    $flag = count($teams);
    $active = $teams;
    for($i = 0; $i < $flag/2; $i++){
      $stats = \App\Models\Stats::factory(1)->create([
      ]);
      shuffle($teams);
      $first = reset($teams);
      $end = end($teams);
      $key1 = array_search($first, $teams);
      $key2 = array_search($end, $teams);
      EventCreateStats::dispatch($stats->first(), $first, $end);
      unset($teams[$key1]);
      unset($teams[$key2]); 
    }
    $this->activeVerificition($active);
  }

  public function activeVerificition($teams){
    $matchs = Matchs::with('team_tournament1')->with('team_tournament2')->with('stats')->get();
    foreach($matchs as $match ){
      for($i = 0; $i < count($teams); $i++){
        if($match->team_tournament1->tournament_id == $teams[$i] && $match->team_tournament1->active == 0){
          
        }
      }
    }
  }
}
