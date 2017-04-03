@extends('layouts.menus.menu')

@section('menu')
<ul class="nav navbar-nav navbar-right">
    @if (Auth::check())
<<<<<<< HEAD
        <li class="links"><a href="{{url($identidade.'/home')}}"><i class="fa fa-desktop">&nbsp;</i>Sistema</a></li>
=======
        <li class="links"><a href="{{url('/home')}}"><i class="fa fa-desktop">&nbsp;</i>Sistema</a></li>
>>>>>>> origin/master
    @else
        <li class="links"><a href="{{url('/login')}}"><i class="fa fa-sign-in">&nbsp;</i>Login</a></li>
    @endif
</ul>
@endsection
