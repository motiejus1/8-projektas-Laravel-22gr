<?php

namespace App\Http\Controllers;

use App\Models\PaginationSetting;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaginationSettingRequest  $request
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaginationSettingRequest $request, PaginationSetting $paginationSetting)
    {
        //
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
