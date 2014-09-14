@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')
    <div class="container marketing push-top">
        <div class="row">
            <div class="container push-top">
                <div class="row">
                    @include('pages.lobby.partials.find')

                    @include('pages.lobby.partials.create')
                </div>
            </div>
        </div>

        @include('pages.generic.partials.footer')
    </div>

@stop