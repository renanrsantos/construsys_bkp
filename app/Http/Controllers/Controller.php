<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Models\Cadastros\Entidade;
use App\Http\Models\Estrutura\Moduloinstalado;
use App\Http\Models\Estrutura\Modulo;
use \Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $sistemasEntidade;
    /** @var Request */
    public $request;
    public $entidade;
    public $modulo;
    public $rotina;
//    public $acao;
    
    /** @var Model */
    private $model;
    
    public function __construct() {
        $this->modulosEntidade = self::getModulosEntidade();
    }

    public static function getModulosEntidade(){
        $identidade = Request::segment(1);
        return Moduloinstalado::where('identidade',$identidade)->orderBy('idmodulo')->get();
    }
    
    public static function getModuloSelecionado(){
        $modulo = Request::segment(3);
        if($modulo){
            return Modulo::where('modpath','/'.$modulo)->first();
        }
        return new Modulo();
    }
    
    protected abstract function getColumns();
    protected abstract function getFilters();
    
    protected function getClassModel(){
        return '\\App\\Http\\Models\\'.ucfirst($this->modulo).'\\'.  ucfirst($this->rotina);
    }
    
    protected function getCamposOrdenacao(){
        return $this->model->getKeyName();
    }
    
    protected function getModel() {
        if(is_null($this->model)){
            $classModel = $this->getClassModel();
            $this->model = new $classModel();
        }
        return $this->model;
    }
    
    private function getUrl(){
        return $this->entidade.'/modulo/'.$this->modulo.'/rotina/'.$this->rotina;
    }
    
    protected function getRecords(){
        return $this->getModel()->orderBy($this->getCamposOrdenacao());
    }
    
    protected function getBtns(){
        return [];
    }

    public function index(){
        if(!$this->rotina){
            return self::view('home');
        }
        $records = $this->getRecords()->get();
        $columns = $this->getColumns();
        $filters = $this->getFilters();
        $btns = $this->getBtns();
        return self::view('layouts.table',compact('records','columns','filters','btns'));
    }
    
    public function novo(){
        $key = $this->getModel()->getKeyName();
        $record = $this->getModel();
        $record->$key = $this->getModel()->max($key)+1;
        return self::view($this->modulo.'.form-'.$this->rotina,compact('record'));
    }
    
    public function processaNovo(){
        $this->getModel()->create($this->request->toArray());
        return Redirect::to($this->getUrl());    
    }
    
    public function alterar(){
        $id = $this->request->get('id');
        $record = $this->getModel()->find($id[0]);
        return self::view($this->modulo.'.form-'.$this->rotina,compact('record'));
    }
    
    public function processaAlterar(){
        $id = $this->request->get($this->getModel()->getKeyName());
        $model = $this->getModel()->find($id);
        $model->update($this->request->toArray());
        return Redirect::to($this->getUrl());
    
    }
    
    public function excluir(){
        $ids = $this->request->get('id');
        $this->model->destroy($ids);
        return Redirect::to($this->getUrl());
    }
    
    static function view($view = null, $data = [], $mergeData = [])
    {
        $data['modulosEntidade'] = self::getModulosEntidade();
        $data['moduloSelecionado'] = self::getModuloSelecionado();
        $data['entidadeSelecionada'] = Entidade::find(Request::segment(1));
        $data['entidades'] = Entidade::where('identidade','<>',Request::segment(1))->get();
        $data['auth'] = true;
        return view($view,$data,$mergeData);
    }
}