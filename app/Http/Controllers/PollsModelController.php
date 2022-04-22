<?php


namespace App\Http\Controllers;
use DB;
use App\Models\PollsModel;
use App\Models\poll_answers;
use App\Models\pollVoters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PollsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allpolls = DB::select('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls_models p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
 
       return view('createPoll', compact('allpolls'));
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
        // $request->validate([
        //     'title'=> 'string|min:3|required',
        //     'Description'=>'string|min:3|required'

        // ]);
        $pollId = DB::table('polls_models')->insertGetId([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $pollanswer = explode(PHP_EOL, $request->answers);

        foreach($pollanswer as $answer) {
        // If the answer is empty there is no need to insert
        if (empty($answer)) continue;
        // Add answer to the "poll_answers" table
          poll_answers::create(['poll_id'=>$pollId, 'title'=>$answer]);
        
         }
        

             return redirect('/poll')->with('success','poll added');
    }

// function to display avalibale polls
    public function ViewPolls(){
        $allpolls= PollsModel::all();
        $poll_answers = poll_answers::all();
        return view('pollVoting', compact('allpolls', 'poll_answers'));
    }

    // function that return polling results
      public function ViewPollsResults(Request $request){
        $allpolls= PollsModel::where('id', $request->poll)->first();
        $poll_answers = poll_answers::where('poll_id', $request->poll)->get();
        $total_votes =0;
        foreach($poll_answers as $poll){
            $total_votes += $poll->votes;
        }
        return view('pollVotingResults', compact('allpolls', 'poll_answers',"total_votes"));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollsModel  $pollsModel
     * @return \Illuminate\Http\Response
     */
    public function PollVoting(Request $request, $id)
    {
        $voterID = pollVoters::where('voterId', Auth::user()->id)
        ->where('poll_id',$id)
        ->first();
        if (!isset($voterID)) {
        pollVoters::create(['voterId'=>Auth::user()->id, 'poll_id'=>$id]);
           
            $votes = poll_answers::where('id', $request->poll_answer)->first();
            poll_answers::where('id', $request->poll_answer)->update([
                'votes' =>  $votes->votes + 1,
            ]);
            return redirect('/ViewPolls')->with('success',' poll vote added');
        }else{
             return redirect('/ViewPolls')->with('error',' You have already voted');
        }
    }
    // choosing specific poll to display results
    public function choosePollResult (){
          $allpolls= PollsModel::all();

          return view('choosePoll', compact('allpolls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollsModel  $pollsModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $votesAnswer = poll_answers::where('poll_id', $id)->get();
        // dd($votesAnswer);
         $votesmain = PollsModel::where('id', $id)->first();
         return view('editPolls', compact('votesmain', 'votesAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollsModel  $pollsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=> 'string|min:3|required',
            'description'=>'string|min:3|required'

        ]);
         $pollanswer = explode(PHP_EOL, $request->answers);
    //    dd($pollanswer);
         poll_answers::where('poll_id', $id)->delete();
        foreach($pollanswer as $answer) {
        // If the answer is empty there is no need to insert
        if (empty($answer)) continue;
        // Add answer to the "poll_answers" table
          poll_answers::create(['poll_id'=>$id, 'title'=>$answer]);
        
         }
         
         PollsModel::where('id', $id)->update([
             'title' => $request->title,
            'description' => $request->description,
                ]);


return redirect('poll')->with('success',' poll vote updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollsModel  $pollsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $votes = poll_answers::where('poll_id', $id)->first();
         
        $votesmain = PollsModel::where('id', $id)->first();
        $votesmain->delete();
        // $votes->delete();
       return redirect('poll')->with('success',' poll vote added');
    }
}
