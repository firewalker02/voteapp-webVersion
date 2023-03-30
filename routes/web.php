<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PollController;
use Symfony\Component\HttpKernel\HttpCache\Store;

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

Route::get('/', [PollController::class,'listPolls'])->name('home');
 
Route::get('/home1', [CandidatesController::class,'home'])->name('home1');
// return view('home');)
// Route::get('/home1',function(){
//     return \view('home');
// });
Route::get('/welcome2',function(){
    return \view('welcome');
});

Route::get('/createCandidateForm', [CandidatesController::class, 'createCandidateForm'])->name('createCandidateForm');

Route::get('/voting',[CandidatesController::class, 'votingPage'])->name('votingPage');
Route::get('/createRouteFile',[FileController::class, 'createRouteFile'])->name('createRouteFile');

Route::post('/createCandidate',[CandidatesController::class, 'createCandidate'])->name('createCandidate');
Route::post('/castYourVote',[CandidatesController::class, 'castYourVote'])->name('castYourVote')->middleware('auth');
Route::post('/createFile',[FileController::class, 'createFile'])->name('createFile')->middleware('auth');
// Route::get('/', function(){

//     $website = "calmandcode.teachable.com/";
//     return view('name',["Mustafaweb"=>$website]);
    
//     // return ["name"=>"Ursanne Kengne", "Website"=>"CalmAndCode.com"];
//     //return 656756;
//     // return "This is laravel project";
// });
 
// Route::get('/home', function(){

//     return view("home");// home.blade.php file in layout directory
    
    
// })->name('home');

// Route::get('/createCandidateForm', function(){

//     return view("createCandidateForm");// createCandidateForm.blade.php file in layout directory
    
    
    
// });


//require __DIR__.'/auth.php';

Route::prefix('vote')->middleware('auth')->group(function(){
    Route::view('/createVote', 'Polls.create')->name('createVote');
    Route::get('/listPolls', [PollController::class, 'listPolls'])->name('listPolls');
    Route::get('/showPoll/{poll}',[PollController::class, 'showPoll'])->name('showPoll');
    Route::get('/resultPoll/{poll}',[PollController::class, 'resultPoll'])->name('resultPoll');
    Route::view('/deletePoll',[PollController::class, 'deletePoll'])->name('deletePoll');
    Route::post('/createV',[PollController::class, 'store'])->name('createActionVote');
    Route::post('/votePoll',[PollController::class, 'vote'])->name('votePoll');
    Route::post('/chooseYourVote',[PollController::class, 'chooseYourVote'])->name('chooseYourVote');

    // <!-- <a class="waves-effect waves-light btn info darken-2" href="{{route('poll.edit',[$poll])}}">
    // update
    // </a> -->
});




  //  <!-- method="post" action="{{route('poll.store')}}" -->

// }
//Route::post('file/upload','FileController@store');
// we instruct the route to use the CandidateController class whenever 
//the url 'createCandidate' is called. The name must be createCandidate because we instructed in the form tag in createCandidateForm 
//,we called the route createCandidate. 
//<!-- we use post method to protect content of the Candidate Model  -->
     //      <!-- action="{{route('createCandidate')}}" method="post" -->


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); // related to the authentication system





/*

<!-- @extends('layouts.welcome')

@section('content')

<div class="container">


<form action="{{route('chooseYourVote')}}" method="post">
    {{csrf_field()}} <! This code must be passed when using a post request to prevent fraud on the website being on construction-->
    <!-- <fieldset class="form-group text-center">
    <div class="row">
     <div class= "col-sm-10" style="margin: 0 auto"> 

     <h3 class= 'mt-3'>Option to Vote for</h3> -->

<!-- @foreach($options as $option)< $candidates represents the key used in the view function called -->
 <!-- in voting function found in Candidatecontroller class $candidate can be any name-->
    
 <!-- <div class="form-check mb-5 mt-3">
  <input class="form-check-input" type="radio" name="optionId" id="flexRadioDefault1" value="{{$option->id}}">
  <label class="form-check-label" for="flexRadioDefault1">
    {$option->id}}
    </label>
    </div> --> 

<!-- @endforeach
    <! <div class="form-check mb-5">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Default radio
    </label>
    </div> -->
    

    <!-- <div class ="form-group row">
      
        <div class= "col-sm-10" style='margin: 0 auto'>
         <button type="submit" class="btn btn-primary btn-block btn-lg" width='300px' height='250px'> Vote</button>
       </div>

    </div>



     </div>
</div>
    </fieldset>

</form>

</div> -->

<!-- @endsection --> 

*/