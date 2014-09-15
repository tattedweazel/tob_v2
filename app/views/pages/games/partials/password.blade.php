<div class="container push-top">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Enter Password</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(['route' => ['match_authorize_path', $game->id]]) }}
                <div class="form-group-lg">
                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Game Password" required>
                    </div>

                    <div class="input-group input-group-lg">
                        <input type="submit" value="Enter" class="btn btn-lg btn-success"/>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>