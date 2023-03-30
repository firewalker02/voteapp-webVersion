<?php

namespace App\Http\Controllers;

use App\Enums\PollStatus;
use App\Models\Poll;
use App\Http\Requests\createPollRequest;
use App\Models\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function store(Request $request){
        // print_r($this->all());
       
        //validate($request->all());
       // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
             "options"    => "required|array|min:2",
             "options.*"  => "required|string|distinct|min:2",
        ]); 

        $input = $request->all();
       $input['created_by'] = auth()->user()->id;
       // DB::table('polls')->insert
   // dd($request->all());
// validate($request ,[
//     'title' => ['required','string'],
//     'start_at'=> ['required','date','after_or_equal:now'],
//     'end_at'=> ['required','date','after:start_at'],
//     ''
// ]);

//dd($this->all());
$poll=Poll::create($input);
for($i = 0; $i < count($input['options']); $i++){
    $option = Option::create([
    'poll_id' => $poll->id,
    'options' => $input['options'][$i]
    ]);
    }
//dd($poll);


//$input['options'][]
//$//options=Opt$input
// DB::table('polls')->insert([ 
//     'title'=>$request->input('title')




//        dd($request->validated());
// //$name= $request->input('')
//        //$request->validated();
//       // auth()->user()->polls()->create($request->safe()->except('options'));

//        // $poll->options()->createMany($request->options);

//        // return back();
//        $user=new User;
//       auth()->$user->polls()->create($request->validated());

//       // dd($request->validated());
//         //return back();
    return \redirect('/')->with('flashMessage','Your poll has been successfully created');
    }

public function vote(){
      if(!Auth::check())
      return \redirect('/register');
      else if(Auth::user()->has_voted)
        return \redirect('/')->with('flashMessageProblem','You are no longer allowed to vote once more');
        else{
            $polls=DB::table('polls')->get();
            $options=DB::table('options')->get();
  return view('votingPoll',['polls'=>$polls, 'options'=>$options]);
        }
      
      }

    public function listPolls(){
        if(!Auth::check())
      return \redirect('/register');
     $polls=Poll::all();
     // $polls=DB::table('polls')->get();
      //$options=DB::table('options')->get();
      //return view('Polls.list');
      return view('Polls.list',['polls'=>$polls]);
    }
public function showPoll(Poll $poll){
    if(!Auth::check())
    return \redirect('/register');
    else if(now()>($poll->value('end_date')))
    return redirect('/')->with('flashMessageProblem','Poll has closed since {{$poll->end_date }}');
    else if(Auth::user()->has_voted)
    return redirect('/')->with('flashMessageProblem','You have already voted. Results are available on a live basis');
  
 $options=Poll::find($poll->id)->options;
   //$options=Poll::find(1)->options;
   $poll=Poll::find($poll->id);
   //$options=$poll->options()->get();

 // $options=DB::table('options')->where('poll_id',$poll->id);
// $options= Option::all();
    //$poll= $poll->load('options');
    return view('Polls.showPoll',['options'=>$options, 'poll'=>$poll]);
}

public function resultPoll(Poll $poll){
  if(!Auth::check())
  return \redirect('/register');
  else if(now()>($poll->value('end_date')))
  return redirect('/')->with('flashMessageProblem','Poll has closed since {{$poll->end_date }}');
  return view('Polls.resultPoll',['poll'=>$poll]);
}

public function chooseYourVote(Request $request){
  $optionId= $request->input('optionId');
  $pollId=Option::where('id',$optionId)->value('poll_id');
  
  $updateVote= Option::where('id',$optionId)->
  update([ 'votes_count'=> DB::raw('votes_count+1')]);
   $updateUser=User::where('id',Auth::user()->id)->update(['has_voted'=>1 ]);
//if(strcmp($poll->status,"STARTED")!=0)
$updatePoll=Poll::where('id',$pollId)->update(['status'=>'STARTED' ]);

//create a poll_id in user table to determine which poll a user voted
   return \redirect('/')->with('flashMessage','You have successfully voted');
}

}

