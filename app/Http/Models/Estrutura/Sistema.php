<?php

namespace App\Http\Models\Estrutura;

use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Sistema
 *
 * @author renan
 */
class Sistema extends Model{
    
    protected $table = 'estrutura_tbsistema';
    
    protected $primaryKey = 'idsistema';
    
    protected $fillable = [
        'idsistema', 'sisnome', 'sispath', 'sisicone'
    ];
    
    public function rotinas(){
        return $this->hasMany(Rotina::class,'idsistema','idsistema')->get();
    }
    
    public function hasRotinas(){
        return (bool) $this->rotinas();
    }
}
