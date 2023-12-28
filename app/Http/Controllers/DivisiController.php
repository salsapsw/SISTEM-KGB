<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use App\Models\Divisi;
use App\Models\Penjagaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        // $divisi = Divisi::with()->get();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        return view('divisi.index',compact('profil','user_divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->divisi->nama_divisi !== "Administrator"){
            abort(403);
        }
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        // dd($salary);
        return view('divisi.create',compact('profil','user_divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|min:2',
            'deskripsi' => 'nullable'
        ],
        [
            'nama_divisi.required' => "Nama Posisi Harus Diisi",
            'nama_divisi.min' => "Minimal 2 karakter"
        ]);
        // dd($request->all());

        $divisi = Divisi::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambahkan Jabatan');
        return redirect('/divisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $divisi = Divisi::find($id);
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $pegawai = User::where('divisi_id',$id)->get();

        return view('divisi.detail',compact('divisi','profil','user_divisi','pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->divisi->nama_divisi !== "Administrator"){
            abort(403);
        }
        $iduser = Auth::id();
        $divisi = Divisi::find($id);
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        // dd($salary);
        return view('divisi.edit',compact('divisi','profil','user_divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_divisi' => 'required|min:2',
        ],
        [
            'nama_divisi.required' => "Nama Divisi Harus Diisi",
            'nama_divisi.min' => "Minimal 2 karakter",
        ]);

        $divisi = Divisi::find($id);

        $divisi ->nama_divisi =$request->nama_divisi;
        $divisi ->deskripsi= $request->deskripsi;

        $divisi->save();

        Alert::success('Berhasil', 'Update Success');
        return redirect('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisi=Divisi::find($id);

        $divisi->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Divisi');
        return redirect('divisi');
    }
}
