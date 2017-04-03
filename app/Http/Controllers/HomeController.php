<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Cadastros\Usuario;
/**
 * Description of HomeController
 *
 * @author renan
 */
class HomeController extends Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->entidade = 1; // implementar ultima entidade do usuario ou entidade principal
    }
    
    public function formLogin(){
        if(Auth::check()){
            return Redirect::to($this->entidade.'/home');
        } else {
            return view('login');
        }
    }
    
    public function login(Request $request){
        $userdata = array('usulogin'=>$request->get('usulogin'),'ususenha'=>$request->get('ususenha'));
        $remember = $request->get('lembrar') == 'on';
        $user = Usuario::where('usulogin','=',$userdata['usulogin'])->get();
        if($user->isEmpty()){
            return Redirect::to('login')->withErrors(['Usuário inválido']);
        } else
        if (Auth::attempt($userdata,$remember)) {
            $redirect = $request->get('redirect');
            $url = url('login');
            if ($redirect == $url){
                $redirect = url($this->entidade.'/home');
            }
            return Redirect::to($redirect);
        } else {        
            return Redirect::to('login')
                    ->withErrors(['Senha inválida'])
                    ->withInput($request->except('ususenha'));

        }
    }
    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function home(){
        return view('home');
    }

    protected function getColumns() {
        
    }

    protected function getFilters() {
        
    }
}
