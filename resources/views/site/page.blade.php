<!doctype html>
<html lang="en">

    <head>
        <title>{{ $item->title }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        <x-menu />
        <div class="mx-auto max-w-2xl px-5 md:px-0">
            <div class="prose mt-16 md:prose-lg lg:prose-xl first:mt-0 prose-a:font-normal">
                @if ($item->hasImage('cover'))
                    <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
                @endif

                <h1>{{ $item->title }}</h1>
            </div>

            {!! $item->renderBlocks() !!}
        </div>
    </body>

</html>
