<?php

namespace App\Http\Controllers;

use App\Events\EventCreateStats;
use App\Http\Controllers\MatchsController;
use App\Models\Stats;
use App\Models\Matchs;
use Illuminate\Http\Request;

class StatsController extends Controller
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
    public function create(Request $request)
    {
        //
        $this->validate($request,[
          'team1' => 'required',
          'team2' => 'required'
        ]);
        if($request->team1 != $request->team2){
          $stats = \App\Models\Stats::factory(1)->create([
        ]);
        EventCreateStats::dispatch($stats->first(), $request->team1, $request->team2);
        return redirect()->back();
        } 
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
     * @param  \App\Models\Stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function show(Stats $stats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $match_id)
    { 
      $match = Matchs::with('team_tournament1')->with('team_tournament2')->with('stats')->find($match_id);
      $match->stats->goals1 = $request->goals1;
      $match->stats->goals2 = $request->goals2;
      $match->stats->shots1 = $request->shots1;
      $match->stats->shots2 = $request->shots2;
      $match->stats->possesion1 = $request->possesion1;
      $match->stats->possesion2 = $request->possesion2;
      $match->stats->save();
      
      $m = new MatchsController();
      $m->winnerVerification($match);
      return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stats $stats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stats $stats)
    {
        //
    }

    public function sortPlayoff(Request $request){
      for($i = 1; $i < $request->request->count(); $i++){
        $teams[] = $request->team . $i;
      }
      $matchs = new MatchsController();
      $matchs->playoffs($teams);
      return redirect()->back();
    }
}
