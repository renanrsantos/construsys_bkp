<nav class="navbar navbar-default navbar-fixed-bottom">
    @if(Request::segment(1))
        <ul class="nav navbar-nav">
            <li class="dropdown">
                @if(empty($entidades))
                    <a class="dropdown-toggle" 
                       data-toggle="dropdown" 
                       role="button" 
                       aria-haspopup="true" aria-expanded="false">
                        {{$entidadeSelecionada->pessoa()->pesnome}} 
                    </a>
                @else
                    <a class="dropdown-toggle" 
                       data-toggle="dropdown" 
                       role="button" 
                       aria-haspopup="true" aria-expanded="false">
                        {{$entidadeSelecionada->pessoa()->pesnome}} 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($entidades as $entidade)
                            <li><a href="{{url($entidade->identidade.'/home')}}">{{$entidade->pessoa()->pesnome}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        </ul>
    @endif
</nav>