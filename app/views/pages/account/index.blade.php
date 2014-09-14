@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')
    <div class="container marketing push-top">
        <div class="row">
            <div class="container push-top">
                @include('pages.generic.partials.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Account Information</h3>
                    </div>
                    <div class="panel-body">

                        {{ $current_user->gravatar(80, [], ['http://www.gravatar.com', ['target' => '_blank', 'title' => 'Edit your avatar at Gravatar.com']]) }}

                        {{ Form::open(['route' => 'update_account_path']) }}
                        <div class="form-group-lg">
                            <div class="input-group input-group-lg push-bottom">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $current_user->username }}" required>
                            </div>

                            <div class="input-group input-group-lg push-bottom">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $current_user->email }}" required>
                            </div>

                            <div class="col-sm-12 gravatar-info"> ** You can edit your profile avatar by going to <a href="http://www.gravatar.com" target="_blank">Gravatar</a> and setting up a free account. **</div>
                            <div class="input-group input-group-lg">
                                <input type="submit" value="Save" class="btn btn-lg btn-success"/>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="container push-top">
             <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Password</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'update_password_path']) }}
                    <div class="form-group-lg">
                        <div class="input-group input-group-lg push-bottom">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                        </div>
                        <div class="input-group input-group-lg push-bottom">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                        </div>

                        <div class="input-group input-group-lg push-bottom">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm New Password">
                        </div>

                        <div class="input-group input-group-lg">
                            <input type="submit" value="Change" class="btn btn-lg btn-success"/>
                        </div>
                    </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $('#how-do-gravatar').popover();
    </script>
@stop