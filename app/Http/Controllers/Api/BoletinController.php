<?php

namespace App\Http\Controllers\Api;

use App\Boletin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Boletin::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Boletin();

        return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function show(Boletin $boletin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boletin $boletin)
    {
        $boletin = Boletin::findOrFail($boletin);

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boletin $boletin)
    {
        Boletin::destroy($boletin);

        return response(null, Response::HTTP_OK);
    }
}
