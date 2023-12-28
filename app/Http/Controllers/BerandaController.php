<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profil;
use App\Models\Divisi;
use App\Models\Penjagaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $namaUser = Auth::user()->nama;
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id',$iduser)->first();
        $user_divisi = Divisi::where('id',$user_level)->first();
        $pegawai_count = User::count();
        $penjagaan_count = Penjagaan ::count();
        $time_now = Carbon::now()->toDateString();
        $penjagaan = Penjagaan::all();

        $today = now();
        $thirtyDaysLater = now()->addDays(30);
        $penjagaanBulanDepanCount = Penjagaan::whereBetween('tmt_sk', [$today, $thirtyDaysLater])->count();
        
        $today = now();
        $thirtyDaysLater = now()->addDays(30);

        $penjagaanNextMonth = Penjagaan::whereBetween('tmt_sk', [$today, $thirtyDaysLater])->get();

        return view('dashboard',compact('namaUser','profil','user_divisi','pegawai_count','penjagaan_count', 'penjagaan','penjagaanBulanDepanCount','penjagaanNextMonth'));
    }
}
