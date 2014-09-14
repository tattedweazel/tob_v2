<div class="col-md-6">
    <div id="game-finder"  class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Find a Game</h3>
        </div>
        <div class="panel-body">
            <p class="comment">* * * * * * * * * * * * * * * * * * * *</p>
            <p class="comment">* Select an available game from below *</p>
            <p class="comment">* ----------------------------------- *</p>
            <p class="comment">* Name : Players : Access : Owner  &nbsp;&nbsp;&nbsp;&nbsp;*</p>
            <p class="comment">* ----------------------------------- *</p>
            <p class="comment">* * * * * * * * * * * * * * * * * * * *</p>
            @foreach ($available_games as $game)

                <div class="game-option-row">
                    <span>&gt; {{$game->name}} <span class="comment">:</span> <span class="highlight">{{ $game->players }} Players</span>  <span class="comment">:</span> {{ ($game->private) ? '<span class="comment">#<span class="warn">PRIVATE</span>#</span>' : '<span class="comment">#</span>PUBLIC<span class="comment">#</span>' }} <span class="comment">:</span> {{$game->user['username']}}</span>
                </div>
                <p class="comment">. . . . . . . . . . . . . . . . . . . .</p>
            @endforeach
        </div>
    </div>
</div>