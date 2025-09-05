<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Search</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-8">


    <div class="grid grid-cols-12 gap-10">




        <aside class="col-span-3">
            <form action="/searchs" method="GET">
                <input type="hidden" name="q" value="{{ request('q') }}" />
                @foreach ($facets as $facet)
                    <div class="py-2 border border-gray-300">
                        <h3 class="px-4 pb-2 font-bold border-b border-gray-300">{{ ucwords($facet['name']) }}</h3>
                        <ul class="px-4 pt-2">
                            @foreach ($facet['filters'] as $filter)
                                <li>

                                    <label for="{{ $facet['name'] }}-{{ $filter['id'] }} "
                                        class="flex gap-x-2 items-center">

                                        {{ $filter['id'] }}


                                        <input id="{{ $facet['name'] }}-{{ $filter['id'] }}" type="checkbox"
                                            name="filters[{{ $facet['name'] }}][]" value="{{ $filter['name'] }}"
                                            onchange="this.form.submit()">
                                        {{ $filter['name'] }}



                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </form>
        </aside>



        <div class="col-span-9">


            <form action="/searchs" method="GET">
                <input type="search" name="q" class="py-2 px-4 w-full border border-b-0 border-gray-300"
                    value="{{ request('q') }}">

            </form>
            <ul class="py-2 px-4 border border-gray-300">
                @forelse ($results as $result)
                    <li>{!! $result !!}</li>
                @empty
                    <li>No matching results.</li>
                @endforelse
            </ul>

        </div>
</body>

</html>
