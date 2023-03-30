<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CandidatesController extends Controller
{
    //

   public function createCandidate(Request $request){
     
     $candidateName= $request->input('candidateName'); //Information is requested from the client side about Candidate
     DB::table('candidates')->insert([
      "name"=>$candidateName, 'votes'=>0 
     ]);
return redirect('/')->with('flashMessage','Your candidate has been successfully created');

   }
  
    public function castYourVote(Request $request){
       //Increase the number of votes
       $candidateId = $request->input("candidateId");

       DB::table('candidates')->where('id',$candidateId)->
       update([ 
        'votes'=> DB::raw("votes+1")
       ]);
//change the has_voted value from 0 to 1 when user votes 

DB::table('users')->where('id',Auth::user()->id) ->update([
  'has_voted' =>1
]);
//store candidate for which user voted for.

DB::table('users')->where('id',Auth::user()->id)->update(
  ['candidate_voted_for'=> $candidateId
]);
// return message to the user that he/she voted successfully
       
        return \redirect('/')->with('flashMessage','You voted successfully.Results are available on a live basis');

     //return view('home');
       // where enables to retrieve information from a particular row.
    }

    public function votingPage(){
        //if user is not logged in, send them to register
      if(!Auth::check()){
         return \redirect('/register');
      }
//user has already voted or not
      else if(!Auth::user()->has_voted){ //if user has not voted
 $candidates=DB::table('candidates')->get(); //array of candidates
        return view('voting',['candidates'=>$candidates]);
      }
      else if(now()>"2023-11-03 00:00:00"){
        return \redirect('/home1')->with('flashMessageProblem',"You are no longer allowed to vote. Polls closed on 3 Nov");

      }
      else{
        //user has already voted
        return \redirect('/home1')->with('flashMessageProblem',"You have already voted.To vote again,buy more votes");
       // return view("home")-;
      }
        
    }

    public function createCandidateForm(){
      if(Auth::check()){
        return \view('createCandidateForm');
  }
   else{
      return \redirect('/home1')->with('flashMessageProblem', 'You are not authorized to enter this page');
   }
  
    }

    public function home(){
      $candidates=DB::table('candidates')->get(); //array of candidates
      return view('home',['candidates'=>$candidates]);
    }
  }