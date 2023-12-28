<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Penjagaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PegawaiReport(Request $request){
        $pegawai = User::with('profil','divisi')->get();

        // dd($pegawai);
        $pdf = PDF::loadView('PDFReport.pegawai_report',['pegawai'=>$pegawai]);

        // return $pdf->download('pegawai_report.pdf');
        return $pdf->stream('pegawai_report.pdf');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PenjagaanReport(Request $request){
        $penjagaan = Penjagaan::all();

        // dd($penjagaan);
        $pdf = PDF::loadView('PDFReport.penjagaan', ['penjagaan'=>$penjagaan]);

        // return $pdf->download('penjagaan_report.pdf');
        return $pdf->stream('ppenjagaan_report.pdf');
    }
}
