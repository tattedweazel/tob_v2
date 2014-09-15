@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')
    <div class="container marketing push-top">
        <div class="row">
            <div class="container push-top">
                    @include('pages.generic.partials.errors')
                    <div class="row">
                    @include('pages.games.partials.password')
                    </div>
            </div>
        </div>

        @include('pages.generic.partials.footer')
    </div>

@stop