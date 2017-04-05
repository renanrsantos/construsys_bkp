<?php

namespace App\Http\Controllers\Estrutura;

use App\Http\Controllers\Controller;

class ModuloController extends Controller{
    
    protected function getColumns() {
        return [
                ['name'=>'idmodulo','label'=>'Código','width'=>'10'],
                ['name'=>'modnome','label'=>'Nome','width'=>'30'],
                ['name'=>'modpath','label'=>'Path','width'=>'30'],
                ['name'=>'modicone','label'=>'Ícone','width'=>'15'],
            ];
    }

    protected function getFilters() {
        return [
                ['name'=>'idmodulo','label'=>'Código','type'=>'int'],
                ['name'=>'modnome','label'=>'Nome','type'=>'string'],
            ];
    }

    protected function getBtns(){
        return [
                ['label'=>'Módulos Instalados','type'=>'a','icon'=>'cogs','url'=>url($this->entidade.'/modulo/estrutura/rotina/moduloinstalado')],
//                ['label'=>'Sub Rotinas','type'=>'btn-single','icon'=>'cogs','url'=>$this->entidade.'/modulo/estrutura/rotina/subrotina'],
            ];
    }
}
