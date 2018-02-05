<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style media="screen">
            {{$css}}
        </style>
    </head>
    <body>
        <div id="galaxy">
            @foreach ($objects as $value)
                <div id="{{$value->name}}"></div>
                @if ($value->type == 'planet')
                    <div id="orbit-{{$value->name}}"></div>
                @endif
            @endforeach
        </div>
    </body>
</html>
