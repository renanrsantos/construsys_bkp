<?php

/**
 * Description of Pessoa
 *
 * @author renan.santos
 */
namespace App\Http\Models\Cadastros;

use \Illuminate\Database\Eloquent\Model;

class Pessoa extends Model{
    protected $modulo = 'cadastros';
    protected $tabela = 'tbpessoa';
    
    protected $table = 'cadastros_tbpessoa';
    protected $primaryKey = 'idpessoa';
    
    protected $fillable = [
        'idpessoa','pestipo','pesnome','pescpfcnpj','pesrgie'
    ];
}
