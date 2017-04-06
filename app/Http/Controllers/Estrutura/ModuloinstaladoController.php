<?php


namespace App\Http\Controllers\Estrutura;

use App\Http\Controllers\Controller;

class ModuloinstaladoController extends Controller{
    
    protected function getColumns() {
        return [
                ['name'=>['entidade','pessoa','pesnome'],'label'=>'Empresa','width'=>'30'],                
                ['name'=>['modulo','idmodulo'],'label'=>'Cód. Módulo','width'=>'10'],
                ['name'=>['modulo','modnome'],'label'=>'Módulo','width'=>'15'],
                ['name'=>'mdeativo','label'=>'Ativo','width'=>'5'],
            ];        
    }

    protected function getFilters() {
        return [
            ['name'=>'idmodulo','label'=>'Cód. Módulo','type'=>'int'],
            ['name'=>'mdeativo','label'=>'Ativo','type'=>'boolean'],            
        ];
    }
    protected function getRecords() {
        return $this->getModel()->where('identidade',$this->entidade);
    }

}
