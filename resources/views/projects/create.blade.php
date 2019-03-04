<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1> Create a Project </h1>
        <form method="POST" action="/laravelapps/project/public/projects">
            {{ csrf_field() }}
            <div>
                <input type="text" placeholder="Project title" name="title" value="{{ old('title') }}">
            </div>

            <div>
                <textarea placeholder="Enter description" name="description" value="{{ old('description') }}"></textarea>
            </div>

            <div>
                <button type="submit"> Create Project </button>
            </div>

          {{--  @include ('errors')  --}}
        </form>
    </body>
</html>
