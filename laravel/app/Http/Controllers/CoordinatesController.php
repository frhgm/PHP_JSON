<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coordinates;

class CoordinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = coordinates::all();
        return view('coordinates.index', compact('coordinates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([
        //    'first_name'=>'required',
        //    'last_name'=>'required',
        //    'email'=>'required'
        //]);
        $coordinates = new coordinates([
            'user_id' => $request->get('user_id'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng')
        ]);
        $coordinates->save();
        return redirect('/coordinates')->with('success', 'saved coordinates.');
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
        $coordinates = coordinates::find($id);
        return view('coordinates.edit', compact('coordinates')); 
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
        //$request->validate([
        //    'first_name'=>'required',
        //    'last_name'=>'required',
        //    'email'=>'required'
        //]);
        $coordinates = coordinates::find($id);
        $coordinates->user_id =  $request->get('user_id');
        $coordinates->lat = $request->get('lat');
        $coordinates->lng = $request->get('lng');
        $coordinates->save();
        return redirect('/coordinates')->with('success', 'coordinates updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordinates = coordinates::find($id);
        $coordinates->delete();
        return redirect('/coordinates')->with('success', 'coordinates deleted');
    }
}
