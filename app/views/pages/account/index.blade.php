@extends('layouts.default')

@section('content')

    @include('pages.generic.partials.nav')
    <div class="container marketing push-top">
        <div class="row">
            <div class="container push-top">
                @include('pages.generic.partials.errors')
                @include('pages.account.partials.information')
            </div>
        </div>
        <div class="row">
                @include('pages.account.partials.password-form')
        </div>

        @include('pages.generic.partials.footer')
    </div>

@stop