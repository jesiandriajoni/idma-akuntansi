<?php

namespace App\Http\Controllers;

use App\Models\Jurnalumum;
use App\Models\ProfilPerusahaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AruskasController extends Controller
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
            $kelompok = Jurnalumum::where('akun_id', $request->akun_id)->where('status', 'jumum')->get();

        } else {
            $kelompok = Jurnalumum::with('Akun')->where('status', 'jumum')->orderBy('tanggal')->orderBy('id')->get();

        }
        $transaksi = Transaksi::latest()->with(['jurnalumum','jurnalumum.Akun'])->where('tanggal',"like", "%".date("Y-m")."%")->whereHas('jurnalumum',function($query){
            $query->with('Akun')->where('akun_id',1)->where('status','jumum');
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil=array_merge(...$transaksi);
        $kelompokHasil = [];
        $kelompokHasil['kas_keluar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['kas_masuk'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['investasi'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['pendanaan'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];


        $total_debit = 0;
        $total_debit_akhir = 0;
        $total_kredit = 0;
        $item_akun = '';
        $pasangan = 0;
        $itungan = 0;
        $total_kas_masuk = 0;
        $total_kas_keluar = 0;
        $total_pendanaan = 0;
        $total_investasi = 0;
        $total_20 = 0;
        $total_21 = 0;
        $total_22 = 0;
        $total_23 = 0;
        $total_24 = 0;
        $total_25 = 0;
        $total_26 = 0;
        $total_27 = 0;
        $total_2 = 0;
        $total_3 = 0;
        $total_4 = 0;
        $total_5 = 0;
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
        $total_17 = 0;
        $total_18 = 0;
        $total_6 = 0;
        $total_7 = 0;
        $total_11 = 0;
        $total_9 = 0;




        $no_akun = "";
        foreach ($transaksiHasil as $key => $item ) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' =>$item['akun'],
                'data' => $item,
            ];

            if (in_array($item['akun_id'], ['2','20', '21', '22', '23', '24', '25', '26', '27'])) {
                if($item['akun_id']== '2'){
                    $total_2 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_2;
                }
                if($item['akun_id']== '20'){
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if($item['akun_id']== '21'){
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if($item['akun_id']== '22'){
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if($item['akun_id']== '23'){
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if($item['akun_id']== '24'){
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if($item['akun_id']== '25'){
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if($item['akun_id']== '26'){
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if($item['akun_id']== '27'){
                    $total_27 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_27;
                }

                $total_kas_masuk += $item['debit'] + $item['kredit'];
                $kelompokHasil['kas_masuk']['multi']['judul'] = "Kas Masuk";
                $kelompokHasil['kas_masuk']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['kas_masuk']['multi']['total'] = $total_kas_masuk;
                $kelompokHasil['kas_masuk']['multi']['items'][] = $items;

            }

            if (in_array($item['akun_id'], ['3', '4', '5', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'])) {

                if($item['akun_id']== '3'){
                    $total_3 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_3;
                }
                if($item['akun_id']== '4'){
                    $total_4 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_4;
                }
                if($item['akun_id']== '5'){
                    $total_5 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_5;
                }
                if($item['akun_id']== '28'){
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if($item['akun_id']== '29'){
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if($item['akun_id']== '30'){
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if($item['akun_id']== '31'){
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if($item['akun_id']== '32'){
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if($item['akun_id']== '33'){
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if($item['akun_id']== '34'){
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if($item['akun_id']== '35'){
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if($item['akun_id']== '36'){
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if($item['akun_id']== '37'){
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if($item['akun_id']== '38'){
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if($item['akun_id']== '39'){
                    $total_39 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_39;
                }
                $total_kas_keluar += $item['debit'] + $item['kredit'];
                $kelompokHasil['kas_keluar']['multi']['judul'] = "Kas Keluar";
                $kelompokHasil['kas_keluar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['kas_keluar']['multi']['total'] = $total_kas_keluar;
                $kelompokHasil['kas_keluar']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['17','18'])) {
                if($item['akun_id']== '17'){
                    $total_17 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['total'] = $total_17;
                }
                if($item['akun_id']== '18'){
                    $total_18 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['total'] = $total_18;
                }
                $total_pendanaan += $item['debit'] - $item['kredit'];
                $kelompokHasil['pendanaan']['multi']['judul'] = "Pendanaan";
                $kelompokHasil['pendanaan']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['pendanaan']['multi']['total'] = $total_pendanaan;
                $kelompokHasil['pendanaan']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['6', '7', '11', '9'])) {
                if($item['akun_id']== '6'){
                    $total_6 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_6;
                }
                if($item['akun_id']== '7'){
                    $total_7 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_7;
                }
                if($item['akun_id']== '11'){
                    $total_11 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_11;
                }
                if($item['akun_id']== '9'){
                    $total_9 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_9;
                }
                $total_investasi += $item['debit'] + $item['kredit'];
                $kelompokHasil['investasi']['multi']['judul'] = "Investasi";
                $kelompokHasil['investasi']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['investasi']['multi']['total'] = $total_investasi;
                $kelompokHasil['investasi']['multi']['items'][] = $items;
            }
        }
        // if ($item['debit'] != "") {
        //     if ($no_akun == '117') {
        //         $kelompokHasil['pendanaan'][$itungan] = $items;
        //     }
        //     if (in_array($no_akun, ['21', '31', '41', '51', '281', '291', '301', '311', '321', '331', '341', '351', '361', '371', '381', '391'])) {
        //         $total_kas_keluar += $item['debit'];
        //         $kelompokHasil['kas_keluar'][$itungan]   = $items;
        //         $kelompokHasil['kas_masuk'][$itungan]['no_akun'] = $no_akun;
        //         $kelompokHasil['kas_keluar'][$itungan]['total_kas_keluar'] = $total_kas_keluar;
        //         // $total_debit += $item['debit'];
        //     }
        //     if (in_array($no_akun, ['61', '71', '111'])) {
        //         $kelompokHasil['investasi'][$itungan]   = $items;
        //     }
        //     if (in_array($no_akun, ['120', '121', '122', '123', '124', '125', '126', '127'])) {
        //         $total_kas_masuk += $item['debit'];
        //         $kelompokHasil['kas_masuk'][$itungan]   = $items;
        //         $kelompokHasil['kas_keluar'][$itungan]['no_akun']   = $no_akun;
        //         $kelompokHasil['kas_masuk'][$itungan]['total_kas_masuk'] = $total_kas_masuk;
        //     }

        //     $no_akun = "";
        //     $pasangan = 0;
        //     $total_kas_masuk = 0;
        //     $total_kas_keluar = 0;
        //     $itungan++;
        // }

        // $kas_keluar_array = $kelompokHasil['kas_keluar'];
        // $kas_keluar_final = [];
        // foreach ($kas_keluar_array as $key => $item) {
        //     $kas_keluar_final[] = $item;
        // }
        // $kas_masuk_array = $kelompokHasil['kas_masuk'];
        // $kas_masuk_final = [];
        // foreach ($kas_masuk_array as $key => $item) {
        //     $kas_masuk_final[] = $item;
        // }



        //dd($kelompokHasil, $kelompok->toArray());

        //return response()->json($kelompokHasil);


        $data = [
            'jumums' => $kelompokHasil
        ];
        // dd($data);
         //dd($kelompokHasil);
        return view('pages.laporan.aruskas', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cetak(Request $request)
    {

        if ($request->akun_id) {
            //dd($request->search); mengecek data
            $kelompok = Jurnalumum::where('akun_id', $request->akun_id)->where('status', 'jumum')->get();

        } else {
            $kelompok = Jurnalumum::with('Akun')->where('status', 'jumum')->orderBy('tanggal')->orderBy('id')->get();

        }
        $transaksi = Transaksi::latest()->with(['jurnalumum','jurnalumum.Akun'])->where('tanggal',"like", "%".date("Y-m")."%")->whereHas('jurnalumum',function($query){
            $query->with('Akun')->where('akun_id',1)->where('status','jumum');
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil=array_merge(...$transaksi);
        $kelompokHasil = [];
        $kelompokHasil['kas_keluar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['kas_masuk'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['investasi'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['pendanaan'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];


        $total_debit = 0;
        $total_debit_akhir = 0;
        $total_kredit = 0;
        $item_akun = '';
        $pasangan = 0;
        $itungan = 0;
        $total_kas_masuk = 0;
        $total_kas_keluar = 0;
        $total_pendanaan = 0;
        $total_investasi = 0;
        $total_20 = 0;
        $total_21 = 0;
        $total_22 = 0;
        $total_23 = 0;
        $total_24 = 0;
        $total_25 = 0;
        $total_26 = 0;
        $total_27 = 0;
        $total_2 = 0;
        $total_3 = 0;
        $total_4 = 0;
        $total_5 = 0;
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
        $total_17 = 0;
        $total_18 = 0;
        $total_6 = 0;
        $total_7 = 0;
        $total_11 = 0;
        $total_9 = 0;




        $no_akun = "";
        foreach ($transaksiHasil as $key => $item ) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' =>$item['akun'],
                'data' => $item,
            ];

            if (in_array($item['akun_id'], ['2','20', '21', '22', '23', '24', '25', '26', '27'])) {
                if($item['akun_id']== '2'){
                    $total_2 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_2;
                }
                if($item['akun_id']== '20'){
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if($item['akun_id']== '21'){
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if($item['akun_id']== '22'){
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if($item['akun_id']== '23'){
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if($item['akun_id']== '24'){
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if($item['akun_id']== '25'){
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if($item['akun_id']== '26'){
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if($item['akun_id']== '27'){
                    $total_27 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_masuk']['single'][$item['akun_id']]['total'] = $total_27;
                }

                $total_kas_masuk += $item['debit'] + $item['kredit'];
                $kelompokHasil['kas_masuk']['multi']['judul'] = "Kas Masuk";
                $kelompokHasil['kas_masuk']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['kas_masuk']['multi']['total'] = $total_kas_masuk;
                $kelompokHasil['kas_masuk']['multi']['items'][] = $items;

            }

            if (in_array($item['akun_id'], ['3', '4', '5', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'])) {


                if($item['akun_id']== '3'){
                    $total_3 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_3;
                }
                if($item['akun_id']== '4'){
                    $total_4 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_4;
                }
                if($item['akun_id']== '5'){
                    $total_5 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_5;
                }
                if($item['akun_id']== '28'){
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if($item['akun_id']== '29'){
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if($item['akun_id']== '30'){
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if($item['akun_id']== '31'){
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if($item['akun_id']== '32'){
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if($item['akun_id']== '33'){
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if($item['akun_id']== '34'){
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if($item['akun_id']== '35'){
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if($item['akun_id']== '36'){
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if($item['akun_id']== '37'){
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if($item['akun_id']== '38'){
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if($item['akun_id']== '39'){
                    $total_39 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['kas_keluar']['single'][$item['akun_id']]['total'] = $total_39;
                }
                $total_kas_keluar += $item['debit'] + $item['kredit'];
                $kelompokHasil['kas_keluar']['multi']['judul'] = "Kas Keluar";
                $kelompokHasil['kas_keluar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['kas_keluar']['multi']['total'] = $total_kas_keluar;
                $kelompokHasil['kas_keluar']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['17','18'])) {
                if($item['akun_id']== '17'){
                    $total_17 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['total'] = $total_17;
                }
                if($item['akun_id']== '18'){
                    $total_18 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendanaan']['single'][$item['akun_id']]['total'] = $total_18;
                }
                $total_pendanaan += $item['debit'] - $item['kredit'];
                $kelompokHasil['pendanaan']['multi']['judul'] = "Pendanaan";
                $kelompokHasil['pendanaan']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['pendanaan']['multi']['total'] = $total_pendanaan;
                $kelompokHasil['pendanaan']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['6', '7', '11', '9'])) {
                if($item['akun_id']== '6'){
                    $total_6 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_6;
                }
                if($item['akun_id']== '7'){
                    $total_7 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_7;
                }
                if($item['akun_id']== '11'){
                    $total_11 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_11;
                }
                if($item['akun_id']== '9'){
                    $total_9 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['investasi']['single'][$item['akun_id']]['total'] = $total_9;
                }
                $total_investasi += $item['debit'] + $item['kredit'];
                $kelompokHasil['investasi']['multi']['judul'] = "Investasi";
                $kelompokHasil['investasi']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['investasi']['multi']['total'] = $total_investasi;
                $kelompokHasil['investasi']['multi']['items'][] = $items;
            }
        }


        $data = [
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'jumums' => $kelompokHasil
        ];
        // dd($data);
         //dd($kelompokHasil);
        return view('pages.laporan.pdfaruskas', $data);
    }

}
