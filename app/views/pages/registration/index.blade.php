@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')

     <div class="container marketing push-top">
        <div class="well">
            <h3>Right, just a few things then.</h3>
            <p>No one likes filling out forms. Well, no one likes paying taxes either. Unlike taxes however, this won't cost you a thing*</p>
            <p><small>* Also unlike taxes, you won't go to jail if you don't do this. You will just have a guaranteed 73.2% less fun life.</small></p>
        </div>
        <div class="container">
            {{ Form::open(['route' => 'register_path']) }}
            <div class="col-md-6 col-md-offset-3">
                @include('pages.generic.partials.errors')
                <div class="form-group-lg">
                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon">@</span>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="input-group input-group-lg">
                        <input type="submit" value="Complete" class="btn btn-lg btn-success"/>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop