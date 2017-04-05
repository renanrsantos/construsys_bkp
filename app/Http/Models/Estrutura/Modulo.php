<?php

namespace App\Http\Models\Estrutura;

use \Illuminate\Database\Eloquent\Model;

class Modulo extends Model{
    
    protected $modulo = 'estrutura';
    protected $tabela = 'tbmodulo';
    
    protected $primaryKey = 'idmodulo';
    
    protected $fillable = [
        'idmodulo', 'modnome', 'modpath', 'modicone'
    ];
    
    
    public function rotinas(){
        return $this->hasMany(Rotina::class,'idmodulo','idmodulo')->get();
    }
    
    public function hasRotinas(){
        return (bool) $this->rotinas();
    }
   
}
