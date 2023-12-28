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


class BulandepanController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->divisi_id;
        $profil = Profil::where('users_id', $iduser)->first();
        $user_divisi = Divisi::where('id', $user_level)->first();
        $time_now = Carbon::now()->locale('id')->isoFormat('LLLL');
        $penjagaan = Penjagaan::all();

        $today = now();
        $thirtyDaysLater = now()->addDays(30);

        $penjagaanNextMonth = Penjagaan::whereBetween('tmt_sk', [$today, $thirtyDaysLater])
            ->get();

        return view('bulandepan', compact('profil', 'user_divisi', 'time_now', 'penjagaan', 'penjagaanNextMonth'));
    }
}
