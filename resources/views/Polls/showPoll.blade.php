@extends('layouts.mainShow')
@include('flash')
@section('content')

<h1 class='mt-2 text-center' style='color:aqua'>{{$poll->title}}</h1>
<h2 class= 'mt-2 mb-3 text-center' style='color:greenyellow'> Poll End Date: {{$poll->end_date}}</h2>
<div class="container">


<form action="{{route('chooseYourVote')}}" method="post" >
    {{csrf_field()}} <!--  This code must be passed when using a post request style="margin: 0 auto"   enctype="multipart/form-data"   to prevent fraud on the website being on construction-->
    <fieldset class="form-group text-center">
    <div class="row">
     <div class= "col-sm-10" > 

     <h3 class= 'mt-3'>Option to Vote for</h3>

@foreach($poll->options as $option)<!-- $candidates represents the key used in the view function called
 in voting function found in Candidatecontroller class $candidate can be any name-->
    
  <div class="form-check mb-5 mt-3">
  <input class="form-check-input" type="radio" name="optionId" id="{{$option->id}}">
  <label class="form-check-label" for="flexRadioDefault1">
   {{$option->options}}
    </label>
    </div>
@endforeach
    <!-- <div class="form-check mb-5">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Default radio
    </label>
    </div> -->
    

    <div class ="form-group row">
      
        <div class= "col-sm-10" style='margin: 0 auto'>
         <button type="submit" class="btn btn-primary btn-block btn-lg" style='width: 800px ; height: 70px'> Vote</button>
       </div>

    </div>



     </div>
</div>
    </fieldset>

</form>

</div>

@endsection




