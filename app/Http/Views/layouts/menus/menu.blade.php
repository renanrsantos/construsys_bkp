<!DOCTYPE html>
<div class="top-right">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="nav-menu-construsys">
                @if(Auth::check())
                    @include('layouts.menus.usuario')
                @endif
                @yield('menu')
            </div>
        </div>
    </nav>
</div>
