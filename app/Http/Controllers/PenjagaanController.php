<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profil;
use App\Models\Divisi;
use App\Models\Penjagaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PenjagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $time_now = Carbon::now()->locale('id')->isoFormat('LLLL');
        $penjagaan = Penjagaan::all();

        $today = now();
        $penjagaanNextMonth = Penjagaan::whereMonth('tmt_sk', '=', $today->addMonth())->get();

        // dd($day);
        return view('penjagaan.index',compact('profil','user_divisi','time_now','penjagaan','penjagaanNextMonth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();

        return view('penjagaan.create',compact('profil','user_divisi'));
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
            'nama'=>'required',
            'pangkat'=>'required',
            'golongan'=>'required',
            'no_sk'=>'required',
            'tgl_sk'=>'required',
            'tmt_sk'=>'required',
            'masa_kerja'=>'required',
            'gaji'=>'required',
        ],
        [
            'nama.required'=>'Nama Harus Diisi',
            'pangkat.required'=>'Pangkat Harus Diisi',
            'golongan.required'=>'Golongan Harus Diisi',
            'no_sk.required'=>'No SK Harus Diisi',
            'tgl_sk.required'=>'Tanggal SK Harus Diisi',
            'tmt_sk.required'=>'TMT SK Harus Diisi',
            'masa_kerja.required'=>'Masa Kerja Harus Diisi',
            'gaji.required'=>'Gaji Harus Diisi',
        ]
    );
    // dd($request->all());
    $schedule = Penjagaan::create($request->all());

    Alert::success('Berhasil', 'Berhasil Menambahkan Data');
    return redirect('penjagaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $time_now = Carbon::now()->locale('id')->isoFormat('LLLL');
        $penjagaan = Penjagaan::find($id);
        // dd($attendance_report);

        return view('penjagaan.detail',compact('profil','user_divisi','time_now','penjagaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $penjagaan = Penjagaan::find($id);
        return view('penjagaan.edit',compact('profil','user_divisi','penjagaan'));
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
        $request->validate([
            'nama'=>'required',
            'pangkat'=>'required',
            'golongan'=>'required',
            'no_sk'=>'required',
            'tgl_sk'=>'required',
            'tmt_sk'=>'required',
            'masa_kerja'=>'required',
            'gaji'=>'required'
        ],
        [
            'nama.required'=>'Pangkat Harus Diisi',
            'pangkat.required'=>'Pangkat Harus Diisi',
            'golongan.required'=>'Golongan Harus Diisi',
            'no_sk.required'=>'No SK Harus Diisi',
            'tgl_sk.required'=>'Tanggal SK Harus Diisi',
            'tmt_sk.required'=>'TMT SK Harus Diisi',
            'masa_kerja.required'=>'Masa Kerja Harus Diisi',
            'gaji.required'=>'Gaji Harus Diisi'
        ]
    );
    $penjagaan = Penjagaan::find($id);
    $penjagaan->nama = $request->nama;
    $penjagaan->pangkat = $request->pangkat;
    $penjagaan->golongan = $request->golongan;
    $penjagaan->no_sk = $request->no_sk;
    $penjagaan->tgl_sk = $request->tgl_sk;
    $penjagaan->tmt_sk = $request->tmt_sk;
    $penjagaan->masa_kerja = $request->masa_kerja;
    $penjagaan->gaji = $request->gaji;

    $penjagaan->save();

    Alert::success('Berhasil', 'Berhasil Mengubah Data');
    return redirect('penjagaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjagaan= Penjagaan::find($id);

        $penjagaan->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('penjagaan');
    }
    

}
