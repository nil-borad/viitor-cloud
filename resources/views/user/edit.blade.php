@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">User - Edit</h2>
          </div>
          <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" method="POST" id="form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{$user->first_name}}">
                        @error('first_name')
                            <em class="error help-block">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{$user->last_name}}">
                        @error('last_name')
                            <em class="error help-block">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                        @error('email')
                            <em class="error help-block">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Date Of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{$user->dob->format('Y-m-d') }}">
                        @error('dob')
                            <em class="error help-block">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success submit"><i class="fa fa-plus"> Update</i></button>
                            <a class="btn btn-danger" href="{{route('users.index')}}"><i class="fa fa-times"> Cancel</i></a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
$( "#form" ).validate({
    rules: {
        first_name:{
            required:true,
        },
        last_name:{
            required:true,
        },
        email:{
            required:true,
            email: true,
        },
        dob:{
            required:true,
            date : true,
        },
        password:{
            required:true,
            minlength:8,
        },
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
        error.addClass("help-block");
        error.insertAfter(element);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).parent("div").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).parent("div").addClass("has-success").removeClass("has-error");
    }
});

</script>
@endsection