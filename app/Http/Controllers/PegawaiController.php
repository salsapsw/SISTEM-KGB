<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\File\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $pegawai = User::with('divisi','profil')->get();
        // $division = Division::get('division_name');
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        return view('pegawai.index',compact('pegawai','profil','user_divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->divisi->nama_divisi != "Administrator"){
            abort(403);
        }

        $iduser = Auth::id();
        $profil = Profil::where('users_id',$iduser)->first();
        $user_level = Auth::user()->divisi_id;
        $user_divisi = Divisi::where('id',$user_level)->first();
        $divisi = Divisi::all();
        return view('pegawai.create',compact('profil','user_divisi','divisi'));
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
            'nama'=> 'required',
            'NIP'=> 'required|unique:profil',
            'divisi'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:8'
        ],
        [
            'nama.required'=>"Nama tidak boleh kosong",
            'NIP.required'=>"NIP tidak boleh kosong",
            'NIP.unique'=>"Kode Telah Telah Ada",
            'divisi.required'=>"Bidang Tidak Boleh Kosong",
            'jenis_kelamin.required'=>"Jenis Kelamin tidak boleh kosong",
            'alamat.required'=>"Alamat tidak boleh kosong",
            'no_hp.required'=>"Nomor Telepon tidak boleh kosong",
            'email.required'=>"Email tidak boleh kosong",
            'password.min'=>"Password tidak boleh kurang dari 8 karakter"
        ]);

        $password = Hash::make($request->input('password'));

        // dd($request->all());
        if ($request->pasword == null){
            $user = User::create([
                'nama' => $request['nama'],
                'email' => $request['email'],
                'password' => $password,
                'divisi_id'=>$request['divisi']
            ]);
            $profil = Profil::create([
                'NIP'=>$request['NIP'],
                'jenis_kelamin'=>$request['jenis_kelamin'],
                'alamat'=>$request['alamat'],
                'no_hp'=>$request['no_hp'],
                'users_id'=>$user->id,
                ]);
        }
        else{
            $user = User::create([
                'nama' => $request['nama'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'divisi_id'=>$request['divisi']
            ]);
            $profil = Profil::create([
                'NIP'=>$request['NIP'],
                'jenis_kelamin'=>$request['jenis_kelamin'],
                'alamat'=>$request['alamat'],
                'no_hp'=>$request['no_hp'],
                'users_id'=>$user->id,
                ]);
        }

        Alert::success('Success', 'Berhasil Menambah Pegawai');
        return redirect('/pegawai');
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
        $pegawai = User::find($id);
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$id)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $divisi = Divisi::get('nama_divisi');
        return view('pegawai.detail',compact('pegawai','profil','user_divisi'));
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
        $pegawai = User::find($id);
        $profil = Profil::where('users_id',$id)->first();
        $user_level = Auth::user()->divisi_id;
        $user_divisi = Divisi::where('id',$user_level)->first();
        $divisi = Divisi::where('id','!=',$user_level)->get();
        return view('pegawai.edit',compact('pegawai','profil','user_divisi','divisi'));
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
            'nama'=> 'required',
            'NIP'=> 'required',
            'divisi'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
            'email'=>'required|unique:users',
            'foto_profil'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nama.required'=>"Nama tidak boleh kosong",
            'divisi.required'=>"Bidang tidak boleh kosong",
            'NIP.required'=>"NIP tidak boleh kosong",
            'jenis_kelamin.required'=>"jenis kelamin tidak boleh kosong",
            'alamat.required'=>"alamat tidak boleh kosong",
            'no_hp.required'=>"Nomor Telepon tidak boleh kosong",
            'email.required'=>"Email tidak boleh kosong",
            'email.unique'=>"Email Telah Digunakan",
            'foto_profil.mimes' =>"Foto Profil Harus Berupa jpg,jpeg,atau png",
            'foto_profil.max' => "ukuran gambar tidak boleh lebih dari 2048 MB"
        ]);

        $user = User::find($id);
        $profil = Profil::find($id);

        $user->nama = $request->nama;
        $user->divisi_id = $request->divisi;
        $profil->NIP = $request->NIP;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->alamat = $request->alamat;
        $profil->no_hp = $request->no_hp;
        $user->email = $request->email;

        // dd($request->all());
        $Profil->save();
        $user->save();

        Alert::success('Success', 'Berhasil Mengubah Profil');
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Alert::success('Berhasil', 'Berhasil Mengapus Pegawai');
        return redirect('/pegawai');
    }
}

