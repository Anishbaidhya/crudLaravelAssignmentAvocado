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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="/">Home</a>

                        <h1>
                            Add a video under {{$videolist->name}}
                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/videolist/{{$videolist->id}}/videos">

                            @csrf

                            <div class="form-group row ">
                                <label for="name" class="col-md-4 col-form-label text-md-right"> Name: </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Video Description: </label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class=" form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row  my-3">
                                <label for="active" class="col-md-4 col-form-label text-md-right">Active status: </label>

                                <div class="col-md-6">
                                    <select id="active" name="active" class="form-control{{ $errors->has('active') ? ' is-invalid' : '' }}" name="active" value="{{ old('active') }}" autocomplete="active" autofocus>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>

                                    @if ($errors->has('active'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="link" class="col-md-4 col-form-label text-md-right">Link: </label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" autocomplete="link" autofocus>

                                    @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>