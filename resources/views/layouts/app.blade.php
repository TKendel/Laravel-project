<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/toastr.min.css">
    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    Nintendo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <!-- // -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(auth::check())
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('Content.index') }}">All posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('Content.create') }}">Create a post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('Category.create') }}">Create category</a>
                        </li>
                        <li class="list-group-item">
                           <a href="{{ route('Category.index') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('Content.deleted') }}">Trash</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.index') }}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}">Create Tag</a>
                        </li>
                        @if(Auth::user()->admin)
                            <li class="list-group-item">
                               <a href="{{ route('User.index') }}">Users</a>
                            </li>
                            <li class="list-group-item">
                               <a href="{{ route('User.create') }}">Create user</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                           <a href="{{ route('Profile.index') }}">Edit Profile</a>
                        </li>
                        <li class="list-group-item">
                           <a href="{{ route('Settings.index') }}">Settings</a>
                        </li>
                    </ul>
                </div>
            @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>
    @yield('scripts')
</body>
</html>
