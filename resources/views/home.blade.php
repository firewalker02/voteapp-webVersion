@extends("layouts.mainShow")

@section("content")

@include('flash')

<div class="container">

   <h3 class="text-center mt-3"> Actual Live Results</h3>
   

    @foreach($candidates as $candidate)
    <div class="card mb-3 mt-3">
     <div class="card-body">
          Candidate Name: {{$candidate->name}} <!--<span class="badge badge-success"> </span> -->
          <h3 class="text-center"> <span class="badge" style='color:azure'> {{ ($candidate->votes/200) * 100 }} % </span> </h3><!-- Badge is a bootstrap class -->
          
          <div class="progress" style="height: 20px;">
  <div class="progress-bar" role="progressbar" style="width: {{ ($candidate->votes/200) * 100 }}%"aria-valuenow="25" aria-valuemin="0" aria-valuemax="200"> {{ ($candidate->votes/200) * 100 }} % </div>
</div>
        
          <!-- <div class="progress mt-3" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="200">
  <div class="progress-bar"  >{{($candidate->votes/200) *100}} </div>
                </div> -->

      </div>
    </div>
    @endforeach
  </div>
@endsection

<!-- <!DOCTYPE html>
<html lang="en">
<head>  aria-label="Basic example"
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> This is the name page</h1>
</body>
</html> -->