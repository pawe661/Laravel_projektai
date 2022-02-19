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
        $paginationSettings = PaginationSetting::all();
        return view('paginationSettings.edit', ['paginationSettingFromController' => $paginationSetting, 'paginationSettings'=> $paginationSettings]);
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
        if($request->has('title')) {
            $paginationSetting->title = $request->pagination_settings_title;
        }
        if($request->has('value')) {
            $paginationSetting->value = $request->pagination_settings_value;
        }
        if($request->has('visible')) {
            $paginationSetting->visible = $request->pagination_settings_visible;
        }
        $paginationSetting->default_value = $request->pagination_settings_default_value;

        $paginationSetting->save();

        return redirect()->route('task.index');
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
    public function selectSetting()
    {
        $paginationSettings = PaginationSetting::all();
        return view('paginationSettings.selectSetting', ['paginationSettings'=> $paginationSettings]);
    }
}
