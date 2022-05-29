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
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a class="font-weight-light" href="/">Home</a>
                        <h1>
                            List of videolists
                            <span class="div">
                                <a href='/videolist/create'><button type="button" class="btn btn-secondary" href=''>Create a videolist</button></a>
                            </span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th style="min-width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $videos)
                                <tr>

                                    <td>
                                        <a href="/videolist/{{$videolist->id}}/videos">{{ $videos->name }}</a>

                                    </td>



                                    <td>{{ $videos->description }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form action="/video/{{$videolist->id}}/edit">
                                                    <button class="btn btn-secondary" type="submit"> Edit </button>
                                                </form>

                                            </div>
                                            <div class="col-md-8">
                                                <form action="/videos/{{$videos->id}}" method="POST">
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
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>