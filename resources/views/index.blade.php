<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: 'csrf_token() ' }</script>
    <title> Events</title>

</head>
<body>

    <div id="app">

        <Homepage  :user-id='@json(auth()->user()->id)' :user-name='@json(auth()->user()->name)'></Homepage>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
