@extends('layouts.menus.menu')

@section('menu')
<ul class="nav navbar-nav nav-pills">
    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" 
           aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" title="Módulos">&nbsp;</i>
        </a>
        <ul class="dropdown-menu">
            @foreach ($modulosEntidade as $moduloEntidade)
                <?php $modulo = $moduloEntidade->modulo();?>
                @if(!in_array($modulo->idmodulo,[1]))
                    <li>
                        <a href="{{url($entidadeSelecionada->identidade.'/modulo'.$modulo->modpath)}}">
                            <i class="{{$modulo->modicone}}">&nbsp;</i> {{$modulo->modnome}}
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="divider"></li>
            <li>
                <a href="{{url($entidadeSelecionada->identidade.'/modulo/estrutura')}}">
                    <i class="fa fa-cog">&nbsp;</i> Estrutura
                </a>
            </li>
        </ul>        
    </li>
    @foreach($moduloSelecionado->rotinas() as $rotina)
        <li class="{{'/'.Request::segment(5) == $rotina->rotpath ? 'active': ''}}">
            @if(!empty($rotina->subrotinas()))
            @else
            <a href="{{url($entidadeSelecionada->identidade.'/modulo'.$moduloSelecionado->modpath.'/rotina'.$rotina->rotpath)}}">
                <i class="{{$rotina->roticone}} active">&nbsp;</i>{{$rotina->rotnome}}
            </a>
            @endif
        </li>
    @endforeach
 </ul>
@endsection