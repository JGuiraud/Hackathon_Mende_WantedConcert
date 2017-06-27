@extends('layouts.app')

@section('content')
<div class="container-login">

 <form class="panellogin col-md-12" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="{{ $errors->has('email') ? ' has-error' : '' }} col-md-4 col-md-offset-2">
        <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control inputlogin" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    </div>

    <div class="{{ $errors->has('password') ? ' has-error' : '' }} col-md-4">
        <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control inputlogin" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div>



    {{-- <div class=""> --}}
        <div class="col-md-12 col-xs-12 loginbuttoncontainer">
            <button type="submit" class="btn btn-primary buttonpro2">
                Se connecter
            </button>
        </div>
    {{-- </div> --}}
</form>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div> --}}
</div>

@endsection
