<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use App\Http\Requests\StoreDifficultyRequest;
use App\Http\Requests\UpdateDifficultyRequest;

use Illuminate\Http\Request;

class DifficultyController extends Controller
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
     * @param  \App\Http\Requests\StoreDifficultyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDifficultyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function show(Difficulty $difficulty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function edit(Difficulty $difficulty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDifficultyRequest  $request
     * @param  \App\Models\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDifficultyRequest $request, Difficulty $difficulty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Difficulty $difficulty)
    {
        //
    }
}
