<?php

namespace App\Http\Controllers\Api;

use App\Boletin;
use App\Http\Controllers\Controller;
use App\Http\Resources\BoletinResource;
use App\Http\Resources\PaginadorResource;
use Illuminate\Cache\RetrievesMultipleKeys;
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
        // return Boletin::orderBy('fecha', 'ASC')->paginate(15)->toArray();
        return new PaginadorResource(
            Boletin::orderBy('fecha', 'ASC')->paginate(15)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boletin = new Boletin();
        return response($boletin->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function show(int $boletin)
    {
        return new BoletinResource(Boletin::findOrFail($boletin));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $boletin)
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
    public function destroy(int $boletin)
    {
        Boletin::destroy($boletin);

        return response(null, Response::HTTP_OK);
    }
}
