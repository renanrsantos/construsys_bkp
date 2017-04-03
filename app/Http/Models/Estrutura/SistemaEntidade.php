<?php

namespace App\Http\Models\Estrutura;

use Illuminate\Database\Eloquent\Model;

class SistemaEntidade extends Model
{
    protected $table = 'estrutura_tbsistemaentidade';
    protected $primaryKey = 'idsistemaentidade';
    protected $fillable = [
        'idsistema','sieativo'
    ];
    
    public function sistema(){
        return $this->hasOne(Sistema::class,'idsistema','idsistema')->first();
    }
    public function entidade(){
        return $this->hasOne(Entidade::class,'identidade','identidade')->first();
    }
}
