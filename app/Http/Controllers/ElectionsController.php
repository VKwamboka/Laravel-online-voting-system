<?php

namespace App\Http\Controllers;

use App\Models\Elections;
use Illuminate\Http\Request;

class ElectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $elections =  Elections::all();

      return view('Electionsetting', compact('elections'));
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
        $request->validate([
            'electionname' =>'required|string|min:3',
            'status' => 'required|string|min:3',
        ]);
        // dd($request->electionname);
        Elections::create([
            'electionname' => $request->electionname,
            'status' => $request->status,
        ]);
        return redirect('/elections')->with('success','election added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Elections  $elections
     * @return \Illuminate\Http\Response
     */
    public function show(Elections $elections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Elections  $elections
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $singleelction = Elections::where('id', $id)->first();
        return view('UpdateElectionSetting', compact('singleelction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Elections  $elections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
     $request->validate([
            'electionname' =>'required|string|min:3',
            'status' => 'required|string|min:3',
        ]);

         Elections::where('id', $id)->update([
            'electionname' => $request->electionname,
            'status' => $request->status,
        ]);
        return redirect('/elections')->with('success','election added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elections  $elections
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data =  Elections::where('id', $id)->first();

        $data->delete();
        return redirect('/elections')->with('success', 'Elections deleted');
    }
}
