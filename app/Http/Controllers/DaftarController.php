<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Daftar::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $daftar = new Daftar;
        $daftar->title = $request->title;
        $daftar->waktu = $request->waktu;
        $daftar->tipe = $request->tipe;
        // $gambar = $request->file('images');
        // $response = cloudinary()->upload($request->file('images')->getRealPath())->getSecurePath();
        // return $response;
        if ($daftar->save()) {
            return ["status"=>"berhasil menyimpan data"];
        }else{
            return ["status"=>"tidak berhasil menyimpan data"];
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
        return Daftar::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Daftar::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $daftar = Daftar::where('id', $id)->first();
        $daftar->title = $request->title;
        $daftar->waktu = $request->waktu;
        $daftar->tipe = $request->tipe;
        if ($daftar->save()) {
            return ["status"=>"berhasil menyimpan data"];
        }else{
            return ["status"=>"tidak berhasil menyimpan data"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftar = Daftar::where('id', $id)->first();
        if ($daftar->delete()) {
            return ["status"=>"berhasil menghapus data"];
        }else{
            return ["status"=>"tidak berhasil menghapus data"];
        }
    }
}
