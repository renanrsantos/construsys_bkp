<?php
    $caminho = '';
    for($i = 1; $i <= 5; $i++){
        $caminho .= Request::segment($i).'/';
    }
    $url = url($caminho);
?>
<a class="btn btn-primary btn-sm" onclick="window.location.href='{{$url}}'"><i class="fa fa-arrow-left">&nbsp;</i> Cancelar</a>
<button class="btn btn-primary btn-sm" type="reset"><i class="fa fa-refresh">&nbsp;</i> Limpar</button>
<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-save">&nbsp;</i> Confirmar</button>