<?php

namespace App\Http\Models\Cadastros;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
    
    protected $modulo = 'cadastros';
    protected $tabela = 'tbusuario';
    protected $table = 'cadastros_tbusuario';
    protected $primaryKey = 'idusuario';
    
    protected $fillable = [
        'idusuario', 'usulogin', 'ususenha','usupermisao','usuadministrador'
    ];

    protected $hidden = [
        'ususenha','usutoken' 
    ];
    public function getAuthPassword(){
        return $this->ususenha;
    }
    protected $rememberTokenName = 'usutoken';
    
    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'idpessoa','idpessoa')->first();
    }
}
