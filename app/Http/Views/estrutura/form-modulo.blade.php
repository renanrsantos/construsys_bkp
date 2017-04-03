@extends('layouts.app')

@section('content')
    {{Form::open(array('url'=>Request::url(),'class'=>'form-horizontal'))}}
    <div class="form-group">
        <div class="col-md-1">
            <label for="idmodulo" class="control-label">Código</label>
            {{Form::text('idmodulo',$record->idmodulo,['class'=>'form-control','required'=>'true','readonly'=>'true'])}}
        </div>
        <div class="col-md-3">
            <label for="sisnome" class="control-label">Nome</label>
            {{Form::text('modnome',$record->modnome,['class'=>'form-control','required'=>'true'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <label for="modpath" class="control-label">Path</label>
            {{Form::text('modpath',$record->modpath,['class'=>'form-control','required'=>'true'])}}
        </div>
        <div class="col-md-2">
            <label for="modicone" class="control-label">Ícone</label>
            {{Form::text('modicone',$record->modicone,['class'=>'form-control'])}}
        </div>
    </div>
    @include('layouts.buttons-form')
    {{Form::close()}}
@endsection