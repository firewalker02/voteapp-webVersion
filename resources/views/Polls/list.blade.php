@extends('layouts.main')
@include('flash')
@section('content')

    <div class="container">
        <h1 class="center">
            Current Polls
        </h1>
        <div class="row">
            <a class="waves-effect waves-light btn info darken-2" href="{{route('createVote')}}">
            New Poll &plus; 
            </a>
        </div>
  <table class="centered">
        <thead>
          <tr>
              <th>Title</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @foreach($polls as $poll)
            <tr>
                <td>{{$poll->title}}</td>
                <td>{{$poll->status}}</td>
                <td>
        
                    <a class="waves-effect waves-light btn red darken-2" href="{{route('deletePoll',[$poll])}}">
                    delete
                    </a>

                    <a class="waves-effect waves-light btn green lighten-0" href="{{route('showPoll',[$poll])}}">
                    show
                    </a>
                    <a class="waves-effect waves-light btn green lighten-0" href="{{route('resultPoll',[$poll])}}">
                    showLiveResults
                    </a>
                </td>
              </tr>

            @endforeach

        </tbody>
      </table>
    </div>

@endsection
