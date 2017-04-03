<?php

namespace App\Http\Controllers\Estrutura;

use App\Http\Controllers\Controller;
use App\Http\Models\Estrutura\Sistema;

class SistemaController extends Controller{
    
    public function index(){
        $sistemas = Sistema::orderBy('idsistema')->get();
        $sistemasEntidade = self::getSistemasEntidade();
        return view('estrutura.sistema.index',compact('sistemas','sistemasEntidade'));
    }
    
    public function novo(){
        $sistemasEntidade = self::getSistemasEntidade();
        return view('estrutura.sistema.inserir',  compact('sistemasEntidade'));
    }
}
