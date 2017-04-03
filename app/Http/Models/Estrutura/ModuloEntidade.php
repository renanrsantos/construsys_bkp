<?php

namespace App\Http\Models\Estrutura;

use Illuminate\Database\Eloquent\Model;

class ModuloEntidade extends Model
{
    protected $modulo = 'estrutura';
    protected $tabela = 'tbmoduloentidade';
    
    protected $primaryKey = 'idmoduloentidade';
    protected $fillable = [
        'idmoduloentidade', 'idmodulo', 'identidade', 'mdeativo',
    ];
       
    public function modulo(){
        return $this->hasOne(Modulo::class,'idmodulo','idmodulo')->first();
    }
    public function entidade(){
        return $this->hasOne(Entidade::class,'identidade','identidade')->first();
    }
}
