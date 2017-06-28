<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dispo;

class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pro');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postDispo(Request $request)
    {
        $dispo = new Dispo;
        $dispo->type = $request->input('type');
        $dispo->superficie = $request->input('superficie');
        $dispo->ville = strtolower($request->input('ville'));
        $dispo->latVille = $request->input('latVille');
        $dispo->lonVille = $request->input('lonVille');
        $dispo->latA = $request->input('latA');
        $dispo->lonA = $request->input('lonA');
        $dispo->latB = $request->input('latB');
        $dispo->lonB = $request->input('lonB');
        // $dispo->dispos()->save($dispo);
        $dispo->save();
        return redirect()->route('proMerci');
    }

    public function proMerci()
    {
        return view('proMerci');
    }
}
