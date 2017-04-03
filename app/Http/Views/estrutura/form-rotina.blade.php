@extends('layouts.app')
@section('content')
    {{Form::open(array('url'=>Request::url(),'class'=>'form-horizontal'))}}
    <div class="form-group">
        <div class="col-md-1">
            <label for="idmodulo" class="control-label">Módulo</label>
            {{Form::text('idmodulo',$record->modulo()->idmodulo,['class'=>'form-control','required'=>'true'])}}
        </div>
        <div class="col-md-3">
            <label for="modnome" class="control-label">&nbsp;</label>
            {{Form::text('modnome',$record->modulo()->modnome,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1">
            <label for="idrotina" class="control-label">Código</label>
            {{Form::text('idrotina',$record->idrotina,['class'=>'form-control','required'=>'true','readonly'=>'true'])}}
        </div>
        <div class="col-md-3">
            <label for="rotnome" class="control-label">Nome</label>
            {{Form::text('rotnome',$record->rotnome,['class'=>'form-control','required'=>'true'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <label for="rotpath" class="control-label">Path</label>
            {{Form::text('rotpath',$record->rotpath,['class'=>'form-control','required'=>'true'])}}
        </div>
        <div class="col-md-2">
            <label for="roticone" class="control-label">Ícone</label>
            {{Form::text('roticone',$record->roticone,['class'=>'form-control'])}}
        </div>
    </div>
    @include('layouts.buttons-form')
    {{Form::close()}}
@endsection