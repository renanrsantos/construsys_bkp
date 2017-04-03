<?php

/**
 * Description of Pessoa
 *
 * @author renan.santos
 */
namespace App\Http\Models\Cadastros;

use \Illuminate\Database\Eloquent\Model;

class Entidade extends Model{
    protected $modulo = 'cadastros';
    protected $tabela = 'tbentidade';
    
    protected $primaryKey = 'identidade';
    
    protected $fillable = [
        'identidade','idpessoa',
    ];
    
    public function pessoa(){
        return $this->hasOne(Pessoa::class,'idpessoa','idpessoa')->first();
    }
    
    public function modulosEntidade(){
        return $this->hasMany(\App\Http\Models\Estrutura\ModuloEntidade::class,'identidade','identidade')->get();
    }
    
    public function moduloAtivo($modpath){
        foreach ($this->modulosEntidade() as $moduloEntidade){
            if($moduloEntidade->modulo()->modpath == $modpath){
                return (bool) $moduloEntidade->mdeativo;
            }
        }
        return false;
    }

}
