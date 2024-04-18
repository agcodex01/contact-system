<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="vh-100">
        <div class="container vh-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-6 text-center">
                    <h1>Contact System</h1>
                    <p>Store your contacts where security is not problem.</p>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1>Sign In.</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email" class="font-weigth-bold">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="font-weigth-bold">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="d-flex">
                                    <div>No Account? <a href="{{ route('register.view') }}">Register.</a> </div>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
