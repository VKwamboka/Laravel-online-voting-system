<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Models\Positions;
use Illuminate\Http\Request;


class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Positions::all();
        
        return view('positions',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::all();
        return view('positions',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           // 'id' => 'required|string',
            'positionName' => 'required|string|min:3',
            'max_contenstants' => 'required|string',
           
        ]);
        $positions = new Positions();
        // $positions->id = $request->input('id');
        $positions->positionName = $request->input('positionName');
        $positions->max_contenstants = $request->input('max_contenstants');

        
        $positions->save();
        return redirect('/positions')->with('success','position added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function show(Positions $positions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleposition=Positions::find($id);
       
        return view("editPosition",compact('singleposition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //  dd("looking good mayor");
        $request->validate([
            // 'id' => 'required|string',
             'positionName' => 'required|string|min:3',
             'max_contenstants' => 'required|string',
            
         ]);

         $positions = Positions::find($id);
         // $positions->id = $request->input('id');
        //  dd($positions);
         $positions->positionName = $request->input('positionName');
         $positions->max_contenstants = $request->input('max_contenstants');
 
         
         $positions->save();
         return redirect('/positions')->with('success','updated added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from positions where id = ?',[$id]);

        return redirect('/positions')->with('success','candidate delete ');
    }
}
