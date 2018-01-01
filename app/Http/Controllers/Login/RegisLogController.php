<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Role;

class RegisLogController extends Controller
{
    public function getRegister(){
        
        return view('Register.FormRegister');
    }

    public function store(Request $request){
        $getData = Input::all();
        
        $data = new User;
        $data->email = $getData['email'];
        $data->username = $getData['username'];
        $data->name = $getData['name'];
        $data->password = bcrypt($getData['password']);
        $query = Role::where('nameRule','user')->get()->toArray();
        $data->id_role = $query[0]['id_role'];
        $data->save();

        return redirect(route('login'));

        // error nya jadi duplicat
    }
}
