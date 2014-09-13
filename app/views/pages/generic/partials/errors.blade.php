@include('flash::message')
@if ($errors->any())
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Um... Yeah...</h4>
    </div>
    <div class="panel-body">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
</div>
@endif