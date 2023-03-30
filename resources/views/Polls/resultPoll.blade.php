@extends("layouts.main")

@section("content")

@include('flash')

<div class="container">

   <h3 class="text-center mt-3"> Actual Live Results</h3>
   

    @foreach($poll->options as $candidate)
    <div class="card mb-3 mt-3">
     <div class="card-body">
          Option Name: {{$candidate->options}} <!--<span class="badge badge-success"> </span> -->
          <h3 class="text-center"> <span class="badge"> {{ ($candidate->votes_count/200) * 100 }} % </span> </h3><!-- Badge is a bootstrap class -->
        
        
          <div class="progress mt-3" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="200">
  <div class="progress-bar" style="width: {{($candidate->votes_count/200) *100}}%"></div>
                </div>

      </div>
    </div>
    @endforeach
  </div>
@endsection