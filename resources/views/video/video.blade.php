<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="/">Home</a>
                        <h1>
                            List of Videos under {{$videolist->name}}
                            <a href="/videolist/{{$videolist->id}}/videos/create"><button class="btn btn-success" type="submit">Add video</button></a>

                        </h1>
                    </div>
                    @if(count($videos))

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                    <th>Link</th>
                                    <th style="min-width: 150px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{{ $video->active }}</td>
                                    <td><a href="{{ $video->link }}">{{ $video->link }}</a></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form action="/videos/{{$video->id}}/edit">
                                                    <button class="btn btn-secondary" type="submit"> Edit </button>
                                                </form>

                                            </div>
                                            <div class="col-md-8">
                                                <form action="/videos/{{$video->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>

                                            </div>

                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @endif

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>
