<?php

namespace App\Http\Controllers;

use App\Models\Jurnalpenyesuaian;
use App\Models\Jurnalumum;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;

class NesasuaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // whereIn('status', ['jupen','jumum'])
         if($request->akun_id){
         //dd($request->search); mengecek data
          $kelompok=Jurnalumum::where('akun_id', $request->akun_id)->where('status','jumum')->where('tanggal',"like", "%".date("Y-m")."%")->get();

         }else
        {
             $kelompok=Jurnalumum::with('Akun')->whereIn('status', ['jupen','jumum'])->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('akun_id','asc')->get();
         }
         $kelompokHasil = [];
         $total_debit = 0;
         $total_debit_akhir = 0;
         $total_kredit = 0;
         $item_akun = '';
         foreach($kelompok as $key => $item){
             if($item_akun != $item['akun_id']){
                 $item_akun = $item['akun_id'];
                 $total_debit = 0;
                 $total_kredit = 0;
                 $total_debit_akhir = 0;
             }
             $total_debit += $item['debit'];
             $total_kredit += $item['kredit'];
             $total_debit_akhir = $total_debit - $total_kredit;
             $kelompokHasil[$item->akun_id]['data'][$key] = $item;
             $kelompokHasil[$item->akun_id]['data'][$key]['total_debit'] = $total_debit;
             $kelompokHasil[$item->akun_id]['data'][$key]['total_debit_akhir'] = $total_debit_akhir;
             $kelompokHasil[$item->akun_id]['nama_akun'] = $item->Akun->akun;
             $kelompokHasil[$item->akun_id]['no_akun'] = $item->Akun->no_akun;
             $kelompokHasil[$item->akun_id]['total_debit_akhir'] = $total_debit_akhir;
         }

        //dd($kelompokHasil);

         $data =[
             'jurnalumums' => $kelompokHasil

         ];
         // dd($data);
        return view('pages.nesasuai.index',$data);
    }


    public function cetak(Request $request)
    {
    // whereIn('status', ['jupen','jumum'])
    if($request->akun_id){
        //dd($request->search); mengecek data
         $kelompok=Jurnalumum::where('akun_id', $request->akun_id)->where('status','jumum')->where('tanggal',"like", "%".date("Y-m")."%")->get();

        }else
       {
            $kelompok=Jurnalumum::with('Akun')->whereIn('status', ['jupen','jumum'])->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('akun_id','asc')->get();
        }
        $kelompokHasil = [];
        $total_debit = 0;
        $total_debit_akhir = 0;
        $total_kredit = 0;
        $item_akun = '';
        foreach($kelompok as $key => $item){
            if($item_akun != $item['akun_id']){
                $item_akun = $item['akun_id'];
                $total_debit = 0;
                $total_kredit = 0;
                $total_debit_akhir = 0;
            }
            $total_debit += $item['debit'];
            $total_kredit += $item['kredit'];
            $total_debit_akhir = $total_debit - $total_kredit;
            $kelompokHasil[$item->akun_id]['data'][$key] = $item;
            $kelompokHasil[$item->akun_id]['data'][$key]['total_debit'] = $total_debit;
            $kelompokHasil[$item->akun_id]['data'][$key]['total_debit_akhir'] = $total_debit_akhir;
            $kelompokHasil[$item->akun_id]['nama_akun'] = $item->Akun->akun;
            $kelompokHasil[$item->akun_id]['no_akun'] = $item->Akun->no_akun;
            $kelompokHasil[$item->akun_id]['total_debit_akhir'] = $total_debit_akhir;
        }

        //dd($kelompokHasil);

        $data =[
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'jurnalumums' => $kelompokHasil
        ];
        // dd($data);
        return view('pages.nesasuai.pdfnesasuai',$data);
    }
}
