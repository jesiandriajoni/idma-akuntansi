<?php

namespace App\Http\Controllers;

use App\Models\Jurnalumum;
use App\Models\ProfilPerusahaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanlabarugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->akun_id) {
            //dd($request->search); mengecek data
            $kelompok = Jurnalumum::where('akun_id', $request->akun_id)->where('status', 'jumum')->where('tanggal',"like", "%".date("Y-m")."%")->get();

        } else {
            $kelompok = Jurnalumum::with('Akun')->whereIn('status', ['jupen','jumum'])->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('tanggal')->orderBy('id')->get();

        }
        $transaksi = Transaksi::latest()->with(['jurnalumum','jurnalumum.Akun'])->where('tanggal',"like", "%".date("Y-m")."%")->whereHas('jurnalumum',function($query){
            $query->with('Akun')->whereIn('status', ['jupen','jumum']);
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil=array_merge(...$transaksi);
        $kelompokHasil = [];

        $kelompokHasil['pendapatan'] =[
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['beban'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];



        $total_pendapatan = 0;
        $total_beban = 0;

        $total_labarugi=0;


        //pendapatan
        $total_20 = 0;
        $total_21 = 0;
        $total_22 = 0;
        $total_23 = 0;
        $total_24 = 0;
        $total_25 = 0;
        $total_26 = 0;
        $total_27 = 0;

        //beban
        $total_28 = 0;
        $total_29 = 0;
        $total_30 = 0;
        $total_31 = 0;
        $total_32 = 0;
        $total_33 = 0;
        $total_34 = 0;
        $total_35 = 0;
        $total_36 = 0;
        $total_37 = 0;
        $total_38 = 0;
        $total_39 = 0;


        $no_akun = "";
        foreach ($transaksiHasil as $key => $item ) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' =>$item['akun'],
                'data' => $item,
            ];


            if (in_array($item['akun_id'], ['20', '21', '22', '23', '24', '25', '26', '27'])) {
                if($item['akun_id']== '20'){
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if($item['akun_id']== '21'){
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if($item['akun_id']== '22'){
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if($item['akun_id']== '23'){
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if($item['akun_id']== '24'){
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if($item['akun_id']== '25'){
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if($item['akun_id']== '26'){
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if($item['akun_id']== '27'){
                    $total_27 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_27;
                }

                $total_pendapatan += $item['debit'] + $item['kredit'];
                $kelompokHasil['pendapatan']['multi']['judul'] = "Pendapatan";
                $kelompokHasil['pendapatan']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['pendapatan']['multi']['total'] = $total_pendapatan;
                $kelompokHasil['pendapatan']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['28', '29', '30', '31', '32', '33', '34', '35','36','37','38','39'])) {
                if($item['akun_id']== '28'){
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if($item['akun_id']== '29'){
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if($item['akun_id']== '30'){
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if($item['akun_id']== '31'){
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if($item['akun_id']== '32'){
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if($item['akun_id']== '33'){
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if($item['akun_id']== '34'){
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if($item['akun_id']== '35'){
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if($item['akun_id']== '36'){
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if($item['akun_id']== '37'){
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if($item['akun_id']== '38'){
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if($item['akun_id']== '39'){
                    $total_39 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_39;
                }

                $total_beban += $item['debit'] + $item['kredit'];
                $kelompokHasil['beban']['multi']['judul'] = "beban";
                $kelompokHasil['beban']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['beban']['multi']['total'] = $total_beban;
                $kelompokHasil['beban']['multi']['items'][] = $items;

            }





        }

        $data = [
            'jumums' => $kelompokHasil
        ];
        // dd($data);
         //dd($kelompokHasil);
        return view('pages.laporan.labarugi', $data);
    }


    public function cetak(Request $request)

    {
        if ($request->akun_id) {
            //dd($request->search); mengecek data
            $kelompok = Jurnalumum::where('akun_id', $request->akun_id)->where('status', 'jumum')->where('tanggal',"like", "%".date("Y-m")."%")->get();

        } else {
            $kelompok = Jurnalumum::with('Akun')->whereIn('status', ['jupen','jumum'])->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('tanggal')->orderBy('id')->get();

        }
        $transaksi = Transaksi::latest()->with(['jurnalumum','jurnalumum.Akun'])->where('tanggal',"like", "%".date("Y-m")."%")->whereHas('jurnalumum',function($query){
            $query->with('Akun')->whereIn('status', ['jupen','jumum']);
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil=array_merge(...$transaksi);
        $kelompokHasil = [];

        $kelompokHasil['pendapatan'] =[
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['beban'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];



        $total_pendapatan = 0;
        $total_beban = 0;

        $total_labarugi=0;


        //pendapatan
        $total_20 = 0;
        $total_21 = 0;
        $total_22 = 0;
        $total_23 = 0;
        $total_24 = 0;
        $total_25 = 0;
        $total_26 = 0;
        $total_27 = 0;

        //beban
        $total_28 = 0;
        $total_29 = 0;
        $total_30 = 0;
        $total_31 = 0;
        $total_32 = 0;
        $total_33 = 0;
        $total_34 = 0;
        $total_35 = 0;
        $total_36 = 0;
        $total_37 = 0;
        $total_38 = 0;
        $total_39 = 0;


        $no_akun = "";
        foreach ($transaksiHasil as $key => $item ) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' =>$item['akun'],
                'data' => $item,
            ];


            if (in_array($item['akun_id'], ['20', '21', '22', '23', '24', '25', '26', '27'])) {
                if($item['akun_id']== '20'){
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if($item['akun_id']== '21'){
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if($item['akun_id']== '22'){
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if($item['akun_id']== '23'){
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if($item['akun_id']== '24'){
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if($item['akun_id']== '25'){
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if($item['akun_id']== '26'){
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if($item['akun_id']== '27'){
                    $total_27 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_27;
                }

                $total_pendapatan += $item['debit'] + $item['kredit'];
                $kelompokHasil['pendapatan']['multi']['judul'] = "Pendapatan";
                $kelompokHasil['pendapatan']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['pendapatan']['multi']['total'] = $total_pendapatan;
                $kelompokHasil['pendapatan']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['28', '29', '30', '31', '32', '33', '34', '35','36','37','38','39'])) {
                if($item['akun_id']== '28'){
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if($item['akun_id']== '29'){
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if($item['akun_id']== '30'){
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if($item['akun_id']== '31'){
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if($item['akun_id']== '32'){
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if($item['akun_id']== '33'){
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if($item['akun_id']== '34'){
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if($item['akun_id']== '35'){
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if($item['akun_id']== '36'){
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if($item['akun_id']== '37'){
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if($item['akun_id']== '38'){
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if($item['akun_id']== '39'){
                    $total_39 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_39;
                }

                $total_beban += $item['debit'] + $item['kredit'];
                $kelompokHasil['beban']['multi']['judul'] = "beban";
                $kelompokHasil['beban']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['beban']['multi']['total'] = $total_beban;
                $kelompokHasil['beban']['multi']['items'][] = $items;

            }





        }

        $data = [
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'jumums' => $kelompokHasil
        ];
        // dd($data);
         //dd($kelompokHasil);
        return view('pages.laporan.pdflabarugi', $data);
    }

}
