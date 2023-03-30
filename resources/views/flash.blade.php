@if(session('flashMessage')) <!-- flash message is a syntax here-->
<div class='alert alert-success mt-3 text-center'><!-- alert-success means the operation is a success-->
   
{{session('flashMessage')}}<!-- Here ,flashMessage is the key -->

</div>
@endif
 <!-- <h1 class="text-center"> This is the home page</h1>bootstrap class "text-centre" which helps center text -->

 @if(session('flashMessageProblem')) <!-- flash messageProblem  is the key to the view here-->
<div class='alert alert-danger mt-3 text-center'><!-- alert-success means the operation is a success-->
   
{{session('flashMessageProblem')}}<!-- Here ,flashMessage is the key -->

</div>
@endif
 <!-- <h1 class="text-center"> This is the home page</h1>bootstrap class "text-centre" which helps center text -->