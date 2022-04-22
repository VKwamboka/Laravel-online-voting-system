<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteTallyController;
use App\Http\Controllers\PollsModelController;


use App\Http\Controllers\ElectionsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
   return view('welcome');
});

// Route::get('/admin','App\Http\Controllers\HomeController@index');
Route::get('/admin','App\Http\Controllers\AdminDashboardController@getMembersStats')->middleware('Role:admin');
Route::get('/voterslist','App\Http\Controllers\VoterController@index')->middleware('Role:admin'); ;
Route::get('/positions','App\Http\Controllers\PositionsController@index')->middleware('Role:admin'); ;
Route::get('/addvoters','App\Http\Controllers\VoterController@addvoters')->middleware('Role:admin'); ;

Route::get('/candidatelist','App\Http\Controllers\CandidateController@index')->middleware('Role:admin'); ;
Route::get('candidate/delete/{id}','App\Http\Controllers\CandidateController@destroy')->middleware('Role:admin'); ;
Route::post('storeCandidate','App\Http\Controllers\CandidateController@store')->middleware('Role:admin'); ;
Route::get('candidate/edit/{id}','App\Http\Controllers\CandidateController@edit')->middleware('Role:admin'); ;
Route::post('candidate/update/{id}','App\Http\Controllers\CandidateController@update')->middleware('Role:admin'); ;

// polling routes
Route::get('/poll','App\Http\Controllers\PollsModelController@index')->middleware('Role:admin'); ;
Route::get('poll/delete/{id}','App\Http\Controllers\PollsModelController@destroy')->middleware('Role:admin'); ;
Route::post('storepoll','App\Http\Controllers\PollsModelController@store')->middleware('Role:admin');;
Route::post('updatepoll/{id}','App\Http\Controllers\PollsModelController@update')->middleware('Role:admin');;

Route::post('pollVoting/{id}','App\Http\Controllers\PollsModelController@PollVoting') ;
Route::get('/ViewPolls','App\Http\Controllers\PollsModelController@ViewPolls');
Route::post('/ViewPollsResults','App\Http\Controllers\PollsModelController@ViewPollsResults');
Route::get('/selectPollresult', 'App\Http\Controllers\PollsModelController@choosePollResult');




Route::get('poll/edit/{id}','App\Http\Controllers\PollsModelController@edit')->middleware('Role:admin'); ;
Route::post('poll/update/{id}','App\Http\Controllers\PollsModelController@update')->middleware('Role:admin'); ;



Route::get('/createpolls','App\Http\Controllers\PollsModelController@index')->middleware('Role:admin'); ;

Route::get('Voter/edit/{id}','App\Http\Controllers\VoterController@edit')->middleware('Role:admin'); ;
Route::get('Voter/delete/{id}','App\Http\Controllers\VoterController@destroy')->middleware('Role:admin'); ;
Route::get('Voter/show/{id}',"App\Http\Controllers\VoterController@show")->middleware('Role:admin'); ;
Route::get('/create',"App\Http\Controllers\VoterController@create")->middleware('Role:admin'); ;
Route::post('/storeVoter',"App\Http\Controllers\VoterController@store")->middleware('Role:admin');;
Route::post('Voter/update/{id}',"App\Http\Controllers\VoterController@update")->middleware('Role:admin'); ;

// Route::post('/store',"App\Http\Controllers\PositionsController@store");
Route::post('/positions',"App\Http\Controllers\PositionsController@store")->middleware('Role:admin');;
Route::post('/positions/update/{id}',"App\Http\Controllers\PositionsController@update")->middleware('Role:admin');;
// Route::post('/positions/update/{id}',"App\Http\Controllers\PositionsController@update");
Route::get('/positions/edit/{id}',"App\Http\Controllers\PositionsController@edit");


Route::get('/positions/delete/{id}',"App\Http\Controllers\PositionsController@destroy")->middleware('Role:admin');;

// voting routes
Route::get('/vote', [VoteTallyController::class,'create']);;


Route::get('/candidates', function() {
    return view('candidates');
 });
// election routes
 Route::get('/elections' ,[ElectionsController::class,'index']);
 Route::get('/elections/edit/{id}' ,[ElectionsController::class,'edit'])->middleware('Role:admin');;
 Route::post('/elections/store' ,[ElectionsController::class,'store'])->middleware('Role:admin');;
 Route::post('/elections/update/{id}' ,[ElectionsController::class,'update'])->middleware('Role:admin');;
 Route::get('/elections/delete/{id}' ,[ElectionsController::class,'destroy'])->middleware('Role:admin');;

// // voting Routes
 Route::post('/voteTally/store/{id}' ,[VoteTallyController::class,'store']);
 Route::get('/voteTally/{id}' ,[VoteTallyController::class,'index']);


 Route::group(['middleware' => ['auth']], function() {
   
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });

 Auth::routes();
 


