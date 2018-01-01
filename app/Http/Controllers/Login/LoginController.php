<?php

namespace App\Http\Controllers\Login;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('Login.Formlogin');
    }

    public function store(Request $request){
        $getData = Input::all();
       
        $EmailUsername = Input::get('emailUsername');
        $password = Input::get('password');
        $query = User::getUser($EmailUsername,$password);
        $json = json_decode(json_encode($query),true);
        $dataAuth = !empty($json) ? $json : '';
       
        if(empty($dataAuth)){
            return \Redirect::to(route('login'));
        }else{
            $session = \Session::put('key',$dataAuth);
            return redirect(route('admin.index'));

            // \Redirect::to(route('admin'));
        }
        
    }
}
