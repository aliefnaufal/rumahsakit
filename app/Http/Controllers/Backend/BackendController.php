<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;

class BackendController extends Controller
{
    public function Login(){
        return view('backend.layout.login');
    }

    public function LoginPost(Request $request){
        $get_data = UserModel::where('email', $request->email)->where('password', md5($request->password))->first();
        if(!$get_data){
            \Session::flash('login_fail', True);
            return redirect('/backend/login');
        }else{
            \Session::put('user_data', $get_data);
            
            return redirect('/backend/dashboard');
        }
    }

    public function Register(){
        return view('backend.layout.register');
    }

    public function RegisterPost(Request $request){
        if($request->password == $request->repassword){
            $data = new UserModel;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = md5($request->password);
            $data->save();

            // if($data->save()){
            \Session::put('register_success', True);
            return redirect('/backend/login');
            // }else{
            //     \Session::flash('register_fail', True);
            //     return redirect('/backend/register');
            // }
        }else{
            \Session::flash('register_fail', True);
            return redirect('/backend/register');
        }
    }

    public function Logout(){
        \Session::forget('user_data');

        return redirect('/backend/login');
    }

    public function Dashboard(){
        return view('backend.layout.dashboard');
    }
}
