@extends('layouts.main')

@section('content')


<div class="container">
<form action="{{route('createFile')}}" method="post"> 
<div class='form-group'>
<label> Title </label>
<input type="text" name="Title" placeholder="Insert Title" class='mb-3 mt-5'>
</div>

<!-- <div class= 'form-group'>
<label> overview</label>
<input type="text" name='Overview' placeholder="Insert Overview"  class="col-sm-4 col-form-label text-md-right">
</div> -->


<div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<div class= 'mt-3'>
    <button type='submit' class='btn btn-primary btn-block'>Upload</button>
</div>


</form>

</div>


@endSection('content')