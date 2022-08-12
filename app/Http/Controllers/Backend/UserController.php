<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\UserModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserModel::all();

        return view('backend.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->password == $request->repassword){
            $data = new UserModel;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = md5($request->password);
            $data->save();

            return redirect('/backend/user');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = UserModel::find($id);
        return view('backend.user.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function edit_profile($id)
    {
        $user = UserModel::find($id);

        return view('backend.profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = UserModel::where('email', $request->email)->where('password', md5($request->password))->first();
                // \DB::select('*')->from('users')->where('id', 1)->first();
        if($data){
            $update = UserModel::find($data->id);
            $update->name = $request->name;
            $update->save();

            return redirect('/backend/user');
        }else{
            return redirect('/backend/user');
        }
    }

    public function update_profile(Request $request)
    {   
        $data = UserModel::where('email', $request->email)->where('password', md5($request->password))->first();
        if($data){
            $update = UserModel::find($data->id);
            $update->name = $request->name;
            $update->bio = $request->bio;
            $update->jenis_kelamin = $request->jenis_kelamin;
            if($request->file('foto')){
                $file= $request->file('foto');
                $filename= $request->name.'-'.date('ymdhis').$file->getClientOriginalName();
                $file-> move(public_path('public/foto_users'), $filename);
                $update->foto = $filename;
            }
            $update->save();

            return redirect('/backend/dashboard');
        }else{
            return redirect('/backend/profile/' %\Session::get('user_data')->id);
        }
        
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserModel::find($id)->delete();

        return redirect('/backend/user');
    }
}
