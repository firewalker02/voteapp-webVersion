@extends("layouts.mainShow")

@section("content")

<div class="container">
<form action="{{route('createCandidate')}}" method="post" enctype="multipart/form-data">
     {{ csrf_field()  }}
     <!-- csrf_field Helps to protect application and information against potential internet frauders -->
<div class="form-group">
    <label> Candidate name</label>
    <input type="text" name="candidateName" class="form-control" placeholder="Insert Candidate's Name">
    </div>
  
    <button type="submit" class="btn btn-primary" name='submit'> Submit</button> 


</form>

</div>


@endsection()
