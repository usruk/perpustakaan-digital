<?php

namespace App\Http\Controllers;

use App\Gmd;
use Illuminate\Http\Request;

class GmdController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gmd::create($request->all());

        return response('data berhasil ditambah', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function show(Gmd $gmd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function edit(Gmd $gmd)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gmd $gmd)
    {
       $gmd->update($request->all());
        
        return response('data berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gmd $gmd)
    {
        $gmd->delete();
    }
}
