<?php

namespace App\Http\Controllers;

use App\Events\EventCreateStats;
use App\Models\Matchs;
use App\Models\Stats;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($match_id)
  {
    $match = Matchs::with('team_tournament1')->with('team_tournament2')->with('stats')->find($match_id);
    $team1 = Team::find($match->team_tournament1->team_id);
    $team2 = Team::find($match->team_tournament2->team_id);
    return view('home.match', [
      'match' => $match,
      'team1' => $team1,
      'team2' => $team2
    ]);
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
      $match->team_tournament2()->first()->update(['active' => 1]);
      $match->team_tournament1()->first()->update(['phase' => $match->team_tournament1()->first()->phase/2 ]);
    } else {
      $match->team_tournament1()->first()->update(['active' => 1]);
      $match->team_tournament2()->first()->update(['phase' => $match->team_tournament2()->first()->phase/2 ]);
    }
  }

  public function playoffs($teams)
  {
    $flag = count($teams);
      $first = 0;
      $end = 0;
      for ($i = 0; $i < $flag / 2; $i++) {
        $stats = \App\Models\Stats::factory(1)->create([]);

        $first = $end+1;
        $end = $first+1;

        EventCreateStats::dispatch($stats->first(), $first, $end);
      }
    redirect()->back();
  }

  public function activeVerificition($team_tournament_id1, $team_tournament_id2)
  {
    $matchs = Matchs::with('team_tournament1')->with('team_tournament2')->with('stats')->get();
    foreach ($matchs as $match) {
      foreach($matchs as $match) {
        if ($match->team_tournament_id1 == $team_tournament_id1 && $match->team_tournament_id2 == $team_tournament_id2 && $match->team_tournament1->active == 0) {
          return $match->team_tournament1->id;
        } else{
          return $match->team_tournament2->id;
        }
      }
    }
  }
}
