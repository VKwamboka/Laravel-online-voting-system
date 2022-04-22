<?php

namespace App\Http\Controllers;
use DB;
use App\Models\voteTally;

use App\Models\Candidate;
use App\Models\Elections;
use App\Models\Positions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteTallyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
     $allelections = Elections::where('status', 'open')->first();
   $Allpositions = Positions::all();
    $allvotes =  DB::table('vote_tallies')
    ->select('position','candidate_id', DB::raw('count(*) as votes'))
    ->where('election_id' , $allelections->id)
    ->groupBy('candidate_id', 'position')
    ->orderByDesc('votes')
    ->get();
 
    $allcandidates = Candidate::all();


    return view('electionresults', compact('allcandidates', 'allvotes', 'Allpositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allcandidates = Candidate::all();
        $Allpositions = Positions::all();
        $allelections = Elections::where('status', 'open')->get();

        return view('Allcontestants', compact('allcandidates', 'Allpositions','allelections'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // protected $fillable = ['position','voter_id','candidate_id','election_id', 'vote'];
    // $request->validate([
    //     ''
    // ]);
// dd($request);
//  dd(Auth::user()->id);
      $voterExist =  voteTally::where('voter_id',Auth::user()->id)->first();
      $allpositions = Positions::all();
      $electionStatus = Elections::where('id',$request->election_id)->first();

      if($electionStatus->status === 'open'){
        
      if (!isset($voterExist)) {
        //    dd(Auth::user()->id);
        //   dd($request);
          foreach ($allpositions as  $position) {
            if ($request->has($position->positionName)) {
                

                voteTally::create([
                   'position' => $position->positionName,
                   'voter_id' => Auth::user()->id,
                   'candidate_id' => $request->input($position->positionName),
                   'election_id' =>$request->election_id,
       
                ]);
            }
          }
          return redirect('/');
      }
      else{
        //   dd("exist");
          return redirect('/vote')->with('success', 'You have voted');
      }
      }else{
           return redirect('/vote')->with('success', 'voting closed');
      }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voteTally  $voteTally
     * @return \Illuminate\Http\Response
     */
    public function show(voteTally $voteTally)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\voteTally  $voteTally
     * @return \Illuminate\Http\Response
     */
    public function edit(voteTally $voteTally)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voteTally  $voteTally
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voteTally $voteTally)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voteTally  $voteTally
     * @return \Illuminate\Http\Response
     */
    public function destroy(voteTally $voteTally)
    {
        //
    }
}
