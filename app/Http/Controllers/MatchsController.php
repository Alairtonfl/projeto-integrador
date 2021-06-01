<?php

namespace App\Http\Controllers;

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
        dd($matchs->stats());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Stats $stats, $tournament_id)
    {
        //
        \App\Models\Matchs::factory(1)->create([
          'stats_id' => $stats->id,
          'tournament_id' => $tournament_id
        ]);
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
}
