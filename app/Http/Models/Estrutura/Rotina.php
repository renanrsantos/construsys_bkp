<?php

namespace App\Http\Models\Estrutura;

use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Sistema
 *
 * @author renan
 */
class Rotina extends Model{
    public $incrementing = false;
    protected $modulo = 'estrutura';
    protected $tabela = 'tbrotina';
    
    protected $primaryKey = 'idrotina';
    
    protected $fillable = [
        'idrotina','idmodulo', 'rotnome', 'rotpath', 'roticone'
    ];
    
    public function modulo(){
        $modulo = $this->hasOne(Modulo::class,'idmodulo','idmodulo')->first();
        return (is_null($modulo)) ? new Modulo() : $modulo;
    }
    
    public function subrotinas(){
        return null;//$this->hasMany(Subrotina::class,'idrotina','idrotina')->get();
    }
    
}
