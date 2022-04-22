<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VotersModel;
use App\Models\Candidate;
use App\Models\Positions;
use App\Models\PollsModel;


class AdminDashboardController extends Controller


{
    public function getMembersStats() {

     $allVosters = VotersModel::all();
     $totalVoters =0;
     foreach ($allVosters as $voters) {
      $totalVoters++;
     }

$totalcandidates =0;
     $allCandidates = Candidate::all();
foreach ($allCandidates as $candidate) {
    $totalcandidates++;
}

$allPositions= Positions::all();
$totalpositions =0;
foreach ($allPositions as $candidate) {
    $totalpositions++;
}
$allPolls= PollsModel::all();
$totalpoll =0;
foreach ($allPolls as $candidate) {
    $totalpoll++;
}





// dd($totalcandidates);
 
    return view("adminDashBoard", compact('totalcandidates','totalVoters','totalpositions','totalpoll'));

}
}
