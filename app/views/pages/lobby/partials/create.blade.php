<div class="col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Create a New Game</h3>
        </div>
        <div class="panel-body">
            @include('pages.generic.partials.errors')
            {{ Form::open(['route' => 'create_game_path']) }}
                <div class="form-group-lg">
                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Game Title" required>
                    </div>

                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-group"></i></span>
                        <input type="number" class="form-control" name="max_players" placeholder="Number of Players" required>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group push-bottom">
                          <span class="input-group-addon">
                            <input type="checkbox" value="1" name="private">
                          </span>
                          <p id="create-private-label">This is a private game</p>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    <div class="input-group input-group-lg push-bottom">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Game Password (Private games)">
                    </div>
                    <div class="input-group input-group-lg">
                        <input type="submit" value="Save" class="btn btn-lg btn-success"/>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>