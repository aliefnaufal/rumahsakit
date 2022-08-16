<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DokterModel;
use App\Models\SpesialisModel;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DokterModel::all();

        return view('backend.dokter.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spesialis = SpesialisModel::all();
        return view('backend.dokter.create', compact('spesialis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new DokterModel;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->spesialis_id = $request->spesialis_id;
        $data->save();

        return redirect('/backend/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DokterModel::find($id);
        $spesialis = SpesialisModel::all();
        return view('backend.dokter.edit', compact('data', 'spesialis'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = DokterModel::find($request->id);
        $update->name = $request->name;
        $update->spesialis_id = $request->spesialis_id;
        $update->save();

        return redirect('/backend/dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DokterModel::find($id)->delete();

        return redirect('/backend/dokter');
    }
}
