<?php

namespace App\Http\Controllers;

use File;
use App\Models\Profil;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index(){
        $iduser = Auth::id();
        $profil = Profil::where('users_id',$iduser)->first();
        $user_level = Auth::user()->divisi_id;
        $user_divisi = Divisi::where('id',$user_level)->first();
        // dd($user_divisi);
        return view('profil.index',compact('profil','user_divisi'));
    }

    public function edit(){
        $iduser = Auth::id();
        $profil = Profil::where('users_id',$iduser)->first();
        $user_level = Auth::user()->divisi_id;
        $user_divisi = Divisi::where('id',$user_level)->first();
        return view('profil.edit',compact('profil','user_divisi'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto_profil' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'alamat.required' => "Alamat tidak boleh kosong",
            'no_hp.required' => "Nomor Telepon tidak boleh kosong",
            'foto_profil.mimes' => "Foto Profil Harus Berupa jpg, jpeg, atau png",
            'foto_profil.max' => "Ukuran gambar tidak boleh lebih dari 2048",
            'current_password.required' => "Password lama tidak boleh kosong",
            'new_password.required' => "Password baru tidak boleh kosong",
            'new_password.min' => "Password baru minimal 8 karakter",
            'new_password.confirmed' => "Konfirmasi Password baru tidak sesuai",
        ]);

        $iduser = Auth::id();
        $profil = Profil::where('users_id',$iduser)->first();
        $user = User::where('id',$iduser)->first();

        // Periksa kecocokan kata sandi saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata Sandi Saat Ini Tidak Benar']);
        }
    
        // Update foto profil jika ada
        if($request->has('foto_profil')){
         $path='images/fotoprofil';
         File::delete($path.$profil->foto_profil);
         $namaGambar = time().'.'.$request->foto_profil->extension();
         $request->foto_profil->move(public_path('images/foto_profil'),$namaGambar);
         $profil->foto_profil =$namaGambar;
         $profil->save();
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        $profil->alamat = $request->alamat;
        $profil->no_hp = $request->no_hp;
        $profil->save();

        Alert::success('Success', 'Berhasil Mengubah Profil');
        return redirect('/profil');
    }

}
