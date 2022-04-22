<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Models\Candidate;
use App\Models\Positions;

use Illuminate\Http\Request;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=Candidate::all();
        // dd($candidates);
         $allPositions = Positions::all();
        return view('candidatelist',compact('candidates','allPositions' ));       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidate=Candidate::all();
        $allPositions = Positions::all();
        
        return view('candidate', compact( 'allPositions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
    
    $request->validate([
        'regNo' => 'required|string',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|string',
        'faculty' =>'required|string',
        'position' => 'required|string',
        'Manifesto' => 'required|string',
        'photo' => 'required|image|mimes:png,jpg', 
    ]);
        $image = $request->file("photo");
        $imagename = uniqid(). '_'.$request->lastname. '.'.$image->getClientOriginalExtension();
        
// $image->move(public_path('candidateImg') , $imagename);
   $path= $image->storeAs('public/candidateImg', $imagename);

        
$candidate= new Candidate();
$candidate->regNo=$request->input('regNo');
$candidate->firstName=$request->input('firstname');
$candidate->secondName=$request->input('lastname');
$candidate->email=$request->input('email');
$candidate->faculty=$request->input('faculty');
$candidate->position=$request->input('position');
$candidate->Manifesto=$request->input('Manifesto');


$candidate->photo=$imagename;
        $candidate->save();
        return redirect('/candidatelist')->with('success','candidate added '); ; 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate=Candidate::find($id);
        $candidates=Candidate::all();
        return view('candidate',['candidate'=>$candidate,'candidates'=>$candidates,'layout'=>'show']);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleCandidate=Candidate::find($id);
        $allPositions = Positions::all();
       
        return view('editCandidate',compact('singleCandidate', 'allPositions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate=Candidate::find($id);
        $candidate->regNo=$request->input('regNo');
        $candidate->firstName=$request->input('firstname');
        $candidate->secondName=$request->input('lastname');
        $candidate->email=$request->input('email');
        $candidate->faculty=$request->input('faculty');
        $candidate->position=$request->input('position');
        $candidate->Manifesto=$request->input('Manifesto');
        $candidate->save();
        return redirect('/candidatelist')->with('success','candidate updated ');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        DB::delete('delete from candidates where id = ?',[$id]);

     
     return redirect('/candidatelist')->with('success','candidate delete '); 
    }
}
