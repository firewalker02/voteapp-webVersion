<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{asset('css/mycss.css')}}" rel="stylesheet"/>
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Welcome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('votingPage')}}">VotingCandidates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('home1')}}">CandidatesVoted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('createVote')}}">createPoll</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('createCandidateForm')}}">createCandidate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='{{route("createRouteFile")}}'>createFile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href='{{route("listPolls")}}'> VotingPolls</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>