<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.cliente')}}</title>
        
        @include('layouts.assets')
<<<<<<< HEAD
        <?php $auth = Auth::check();?>
    </head>
    @if($auth)
        <body>
    @else
        <body style="background-color: #cfcfcf;">
    @endif
        @section('main-menu')
            @if ($auth)
                @include('layouts.menus.sistema')
            @endif
        @show
        <div class="container">
            @if (!$auth && Request::url() != 'login')
                @include('layouts.form-login')
            @else
                @yield('content')
            @endif
        </div>
        @if ($auth)
=======
        
    </head>
    <body>
        @section('main-menu')
            @if (Auth::check())
                @include('layouts.menus.sistema')
            @endif
        @show
        <div class="container">
            @if (!Auth::check() && Request::url() != 'login')
                @include('layouts.form-login')
            @else
                @include('layouts.breadcrumb')
                @yield('content')
            @endif
        </div>
        @if (Auth::check())
>>>>>>> origin/master
            @include('layouts.footer')
        @endif
    </body>
</html>
