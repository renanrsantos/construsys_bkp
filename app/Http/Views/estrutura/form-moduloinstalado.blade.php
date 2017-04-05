@extends('layouts.app')

@section('content')
    {{Form::open(array('url'=>Request::url(),'class'=>'form-horizontal'))}}
    <div class="form-group">
        <div class="col-md-1">
            <label for="idmoduloentidade" class="control-label">Id</label>
            {{Form::text('idmoduloentidade',$record->idmoduloentidade,['class'=>'form-control','required'=>'true','readonly'=>'true'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1">
            <label for="identidade" class="control-label">Empresa</label>
            {{Form::text('identidade',$entidadeSelecionada->identidade,['class'=>'form-control','required','readonly'])}}
        </div>
        <div class="col-md-3">
            <label for="pesnome" class="control-label">Nome</label>
            {{Form::text('pesnome',$entidadeSelecionada->pessoa()->pesnome,['class'=>'form-control','required','readonly'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1">
            <label for="idmodulo" class="control-label">Módulo</label>
            {{Form::text('idmodulo',$record->idmodulo,['class'=>'form-control','required',($record->idmodulo)?'readonly':''])}}
        </div>
        <div class="col-md-2">
            <label for="modnome" class="control-label">Módulo</label>
            {{Form::text('modnome',$record->modulo()->modnome,['class'=>'form-control',($record->idmodulo)?'readonly':''])}}
        </div>
            <div class="checkbox">
                <label>
                    &nbsp;
                {{Form::checkbox('mdeativo','',['class'=>'form-control','required','readonly',($record->mdeativo)?'checked':''])}}
                Ativo &nbsp;</label>
            </div>
        
    </div>
    @include('layouts.buttons-form')
    {{Form::close()}}
@endsection