<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1> Projects </h1>
        @foreach($projects as $project)
            <a href="/laravelapps/project/public/projects/{{ $project->id }}">
            <li>{{ $project->title }} </li>
            </a>
        @endforeach;
    </body>
</html>
