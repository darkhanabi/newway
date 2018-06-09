<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @include('header')

    <body >
        
        @include('navbar')

        <main>
            <div class="wallpaper"></div>

            <div class="container list-container">

                <div class="text-center">
                    <div class="list-title">
                        <p>Hall of Heroes</p>
                    </div>
                    <img class="scroll-img" src="{{ asset('images/layout/scroll.png') }}">
                </div>

                @include('add-modal')

                <hr>

                {{-- Display validate errors --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <hr>
                @endif

                {{-- List the heroes --}}
                @if (count($heroes) > 0)
                <div class="row">
                    @foreach ($heroes as $hero)
                        <div class="col-md-3">
                            @include('hero')
                            @include('edit-modal')
                        </div>
                    @endforeach
                </div>
                @elseif ($route == 'search')
                <div class="row no-data">
                    <div class="offset-md-4 col-md-4 text-center">
                        <strong>No Data Found</strong>
                    </div>
                </div>
                @else
                <div class="row no-data">
                    <div class="offset-md-4 col-md-4 text-center">
                        <strong>No Data Available</strong>
                    </div>
                </div>
                @endif

                @if ($route == 'search')
                <div class="offset-md-4 col-md-4 text-center">
                    <p><a href="/list">Back to List page</a></p>
                </div>
                @endif

            </div>
        </main>
        
    </body>
</html>
