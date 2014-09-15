@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')
    <div class="container marketing push-top">
        <div class="row">
            <div class="container push-top">

                    {{ $game->max_players }}
                    <ul>
                    @foreach ($game->player as $player)
                        <li>{{$player->user->gravatar()}}</li>
                    @endforeach
                    </ul>
            </div>
        </div>

        @include('pages.generic.partials.footer')
    </div>

@stop