<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ $site_name }} :: {{ $section_title }}</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,300,400,500,600,700' rel='stylesheet' type='text/css'>
        <link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">

    </head>
    <body>

        @yield('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>
</html>