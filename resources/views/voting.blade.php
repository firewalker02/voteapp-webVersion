@extends('layouts.mainShow')

@section('content')

<div class="container">


<form action="{{route('castYourVote')}}" method="post">
    {{csrf_field()}} <!--  This code must be passed when using a post request to prevent fraud on the website being on construction-->
    <fieldset class="form-group text-center">
    <div class="row">
     <div class= "col-sm-10" style="margin: 0 auto"> 

     <h3 class= 'mt-3'>Candidate to Vote for</h3>

@foreach($candidates as $candidate)<!-- $candidates represents the key used in the view function called
 in voting function found in Candidatecontroller class $candidate can be any name-->
    
 <div class="form-check mb-5 mt-3">
  <input class="form-check-input" type="radio" name="candidateId" id="flexRadioDefault1" value="{{$candidate->id}}">
  <label class="form-check-label" for="flexRadioDefault1">
    {{$candidate->name}}
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
         <button type="submit" class="btn btn-primary btn-block btn-lg"> Vote</button>
       </div>

    </div>



     </div>
</div>
    </fieldset>

</form>

</div>

@endsection