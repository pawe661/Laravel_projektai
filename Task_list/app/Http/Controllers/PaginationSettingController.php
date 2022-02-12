<?php

namespace App\Http\Controllers;

use App\Models\PaginationSetting;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaginationSettingRequest;
use App\Http\Requests\UpdatePaginationSettingRequest;

class PaginationSettingController extends Controller
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
     * @param  \App\Http\Requests\StorePaginationSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaginationSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSetting $paginationSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSetting $paginationSetting)
    {
        return view('paginationSettings.edit', ['paginationSetting' => $paginationSetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaginationSettingRequest  $request
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginationSetting $paginationSetting)
    {
        // $table->string('title');
        // $table->bigInteger('value');
        // $table->tinyInteger('visible');
        // $table->tinyInteger('default_value');
        $paginationSetting->title = $request->pagination_settings_title;
        $paginationSetting->value = $request->pagination_settings_value;
        $paginationSetting->visible = $request->pagination_settings_visible;
        $paginationSetting->default_value = $request->pagination_settings_default_value;

        $paginationSetting->save();

        return redirect()->route('paginationSetting.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSetting $paginationSetting)
    {
        //
    }
}
