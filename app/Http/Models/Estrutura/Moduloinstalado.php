<?php

namespace App\Http\Models\Estrutura;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Cadastros\Entidade;

class Moduloinstalado extends Model
{
    protected $modulo = 'estrutura';
    protected $tabela = 'tbmoduloentidade';
    
    protected $primaryKey = 'idmoduloentidade';
    protected $fillable = [
        'idmoduloentidade', 'idmodulo', 'identidade', 'mdeativo',
    ];
       
    public function modulo(){
        $return = $this->hasOne(Modulo::class,'idmodulo','idmodulo')->first();
        if(empty($return)){
            $return = new Modulo();
        }
        return $return;
    }
    public function entidade(){
        $return = $this->hasOne(Entidade::class,'identidade','identidade')->first();
        if(empty($return)){
            $return = new Entidade();
        }
        return $return;
    }
}
