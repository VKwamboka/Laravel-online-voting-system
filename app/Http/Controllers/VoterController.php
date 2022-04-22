<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\VotersModel;
class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $voters = VotersModel::all();

        // dd($voters);
        return view('voterslist',compact('voters'));
    }
    public function adminDashBoard()
    {
        
        $voters = VotersModel::all();

        // dd($voters);
        return view('adminDashBoard',compact('voters'));
    }
    public function addvoters()
    {
        
        $voters = VotersModel::all();

        // dd($voters);
        return view('addvoters',compact('voters'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layout ='createls';
        $voters = VotersModel::all();
        return view('voter',compact('voters','layout'));

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
            'regNo' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
           
      
        ]);
        $voter = new VotersModel();
        $voter->regNo = $request->input('regNo');
        $voter->firstName = $request->input('firstname');
        $voter->secondName = $request->input('lastname');
       
        $voter->save();
        return redirect('/voterslist')->with('success','Voter added ');

      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voter = VotersModel::find($id);
        $voters = VotersModel::all();
        return view ('voter',['voters'=>$voters,'voter'=>$voter,'layout'=>'show']);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $voter = VotersModel::find($id);
        // $voters = VotersModel::all();
        return view ('editVoter',compact('voter'));
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
        $voter = VotersModel::find($id);
        $voter->regNo = $request->input('regNo');
        $voter->firstName = $request->input('firstname');
        $voter->secondName = $request->input('lastname');
        $voter->email = $request->input('email');
        $voter->faculty = $request->input('faculty');
        $voter->save();
      return  redirect('/voterslist')->with('success','Voter updated ');
        // return redirect('/');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $voter = VotersModel::find($id);
        // $voter->delete();
        
        // return redirect('/'); 
        DB::delete('delete from voters_models where id = ?',[$id]);
      echo "Record deleted .<br/>";
      //echo '<a href = "/delete-records">Click Here</a> to go back.';
      return redirect('/voterslist')->with('success','Voter delete ');
      
    }
}