<?php

namespace App\Http\Controllers;

use App\Models\UserPackage;
use App\Http\Requests\StoreUserPackageRequest;
use App\Http\Requests\UpdateUserPackageRequest;

class UserPackageController extends Controller
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
     * @param  \App\Http\Requests\StoreUserPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function show(UserPackage $userPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPackage $userPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPackageRequest  $request
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPackageRequest $request, UserPackage $userPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPackage $userPackage)
    {
        //
    }
}
