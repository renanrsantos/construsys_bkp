<?php

namespace App\Http\Controllers\Estrutura;

use App\Http\Controllers\Controller;

class RotinaController extends Controller{
    
    protected function getColumns() {
        return [
                ['name'=>['modulo','idmodulo'],'label'=>'Cód. Módulo','width'=>'10'],
                ['name'=>['modulo','modnome'],'label'=>'Módulo','width'=>'15'],
                ['name'=>'idrotina','label'=>'Cód. Rotina','width'=>'10'],
                ['name'=>'rotnome','label'=>'Rotina','width'=>'15'],
                ['name'=>'rotpath','label'=>'Path','width'=>'15'],
                ['name'=>'roticone','label'=>'Ícone','width'=>'10'],
            ];
    }

    protected function getFilters() {
        return [
                ['name'=>'idmodulo','label'=>'Cód. Módulo','type'=>'int'],
                ['name'=>'modnome','label'=>'Módulo','type'=>'string'],
                ['name'=>'idrotina','label'=>'Cód. Rotina','type'=>'int'],
                ['name'=>'rotnome','label'=>'Rotina','type'=>'string'],
            ];
    }

}
