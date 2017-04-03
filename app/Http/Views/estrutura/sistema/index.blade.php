
@extends('layouts.table')

@section('content')
    
    @section('header')
        <th>Código</th>
        <th>Nome</th>
        <th>Path</th>
        <th>Ícone</th>
    @endsection

    @section('record')
        @if(isset($sistemas))
        @foreach ($sistemas as $sistema) 
            <tr>
                <td><span>{{$sistema->idsistema}}</span></td>
                <td><span>{{$sistema->sisnome}}</span></td>
                <td><span>{{$sistema->sispath}}</span></td>
                <td><i class="{{$sistema->sisicone}}"></i></td>
            </tr>
        @endforeach
        @endif
    @endsection
@endsection

