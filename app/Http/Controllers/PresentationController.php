<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presentation;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $filters = $request->all();

        if ($request->exists('name')) {
            return Presentation::where('name', $filters['name'])->get();
        }
        return Presentation::all();
    }

    public function speakers(Presentation $presentation) 
    {
        return $presentation->speakers()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $presentation = Presentation::create($request->all());
        
        return response()->json($presentation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        return $presentation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentation)
    {
        $presentation->update($request->all());
        return response()->json($presentation, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        $presentation->delete();

        return response()->json(null, 204);
    }
}
