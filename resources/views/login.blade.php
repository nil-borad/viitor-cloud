@extends('layouts.app')
@section('content')
<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Login</b>
        </div>
        <div style="margin: 20px" class="flash-message">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
    
        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{route('login_process')}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{route('register')}}" class="text-center">Register</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>
@endsection