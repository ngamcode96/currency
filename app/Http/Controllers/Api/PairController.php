<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPairRequest;
use App\Models\Pair;
use Illuminate\Http\Request;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pairs = Pair::all();
        return response()->json([
            "status" => 200,
            "pairs" => $pairs
        ], 200);
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
    public function store(AddPairRequest $request)
    {
        try {
            
            $pair = Pair::create($request->all());
            return response()->json(
            [
                'status' => 201,
                'message' => "Pair ajouté avec succès",
                'pair' => $pair
            ], 201
            );
            
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function show(Pair $pair)
    {
        return response()->json(
            [
                'status' => 200,
                'pair' => $pair
            ], 200
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function edit(Pair $pair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function update(AddPairRequest $request, Pair $pair)
    {
        $pair->update($request->all());
        return response()->json(
        [
            'status' => 201,
            'message' => "Pair modifié avec succès",
            'pair' => $pair
        ], 201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pair  $pair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pair $pair)
    {
        $pair->delete();
        return response()->json([
            'status' => 201,
            'message' => "Pair supprimé avec succès"
       ], 201
       );
    }
}
