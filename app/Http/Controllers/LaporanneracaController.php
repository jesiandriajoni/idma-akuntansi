<?php

namespace App\Http\Controllers;

use App\Models\Jurnalumum;
use App\Models\ProfilPerusahaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanneracaController extends Controller
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
        $transaksi = Transaksi::latest()->with(['jurnalumum', 'jurnalumum.Akun'])->where('tanggal', "like", "%" . date("Y-m") . "%")->whereHas('jurnalumum', function ($query) {
            $query->with('Akun')->whereIn('status', ['jupen', 'jumum']);
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil = array_merge(...$transaksi);
        $kelompokHasil = [];
        $kelompokHasil['modal'] = [

            'total' => 0

        ];
        $kelompokHasil['pendapatan'] = [
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
        $kelompokHasil['prive'] = [

            'total' => 0

        ];
        $kelompokHasil['asetlancar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['asettetap'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['wajiblancar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['wajibpanjang'] = [

            'total' => 0

        ];


        $total_modal = 0;
        $total_pendapatan = 0;
        $total_beban = 0;
        $total_prive = 0;
        $total_asetlancar = 0;
        $total_asettetap = 0;
        $total_wajiblancar = 0;
        $total_wajibpanjang = 0;
        $total_labarugi = 0;

        //modal
        $total_17 = 0;

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

        //prive
        $total_18 = 0;

        //aktiva lancar
        $total_1 = 0;
        $total_2 = 0;
        $total_3 = 0;
        $total_4 = 0;
        $total_5 = 0;

        //aktiva tetap
        $total_6 = 0;
        $total_7 = 0;
        $total_8 = 0;
        $total_9 = 0;
        $total_10 = 0;
        $total_11 = 0;
        $total_12 = 0;

        //kewajiban lancar
        $total_13 = 0;
        $total_14 = 0;
        $total_15 = 0;

        //kewajiban jangka panjang
        $total_16 = 0;



        $no_akun = "";
        foreach ($transaksiHasil as $key => $item) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' => $item['akun'],
                'data' => $item,
            ];

            if (in_array($item['akun_id'], ['17'])) {
                $total_modal += $item['debit'] + $item['kredit'];
                $kelompokHasil['modal']['judul'] = "modal";
                $kelompokHasil['modal']['kode_akun'] = $no_akun;
                $kelompokHasil['modal']['total'] = $total_modal;
                $kelompokHasil['modal']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['20', '21', '22', '23', '24', '25', '26', '27'])) {
                if ($item['akun_id'] == '20') {
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if ($item['akun_id'] == '21') {
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if ($item['akun_id'] == '22') {
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if ($item['akun_id'] == '23') {
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if ($item['akun_id'] == '24') {
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if ($item['akun_id'] == '25') {
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if ($item['akun_id'] == '26') {
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if ($item['akun_id'] == '27') {
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

            if (in_array($item['akun_id'], ['28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'])) {
                if ($item['akun_id'] == '28') {
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if ($item['akun_id'] == '29') {
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if ($item['akun_id'] == '30') {
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if ($item['akun_id'] == '31') {
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if ($item['akun_id'] == '32') {
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if ($item['akun_id'] == '33') {
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if ($item['akun_id'] == '34') {
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if ($item['akun_id'] == '35') {
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if ($item['akun_id'] == '36') {
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if ($item['akun_id'] == '37') {
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if ($item['akun_id'] == '38') {
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if ($item['akun_id'] == '39') {
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

            if (in_array($item['akun_id'], ['18'])) {
                $total_prive += $item['debit'] + $item['kredit'];
                $kelompokHasil['prive']['judul'] = "prive";
                $kelompokHasil['prive']['kode_akun'] = $no_akun;
                $kelompokHasil['prive']['total'] = $total_prive;
                $kelompokHasil['prive']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['1', '2', '3', '4', '5'])) {
                if ($item['akun_id'] == '1') {
                    $total_1 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_1;
                }
                if ($item['akun_id'] == '2') {
                    $total_2 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_2;
                }
                if ($item['akun_id'] == '3') {
                    $total_3 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_3;
                }
                if ($item['akun_id'] == '4') {
                    $total_4 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_4;
                }
                if ($item['akun_id'] == '5') {
                    $total_5 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_5;
                }


                $total_asetlancar += $item['debit'] - $item['kredit'];
                $kelompokHasil['asetlancar']['multi']['judul'] = "Asetlancar";
                $kelompokHasil['asetlancar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['asetlancar']['multi']['total'] = $total_asetlancar;
                $kelompokHasil['asetlancar']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['6', '7', '8', '9', '10', '11', '12'])) {
                if ($item['akun_id'] == '6') {
                    $total_6 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_6;
                }
                if ($item['akun_id'] == '7') {
                    $total_7 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_7;
                }
                if ($item['akun_id'] == '8') {
                    $total_8 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_8;
                }
                if ($item['akun_id'] == '9') {
                    $total_9 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_9;
                }
                if ($item['akun_id'] == '10') {
                    $total_10 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_10;
                }
                if ($item['akun_id'] == '11') {
                    $total_11 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_11;
                }
                if ($item['akun_id'] == '12') {
                    $total_12 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_12;
                }


                $total_asettetap += $item['debit'] - $item['kredit'];
                $kelompokHasil['asettetap']['multi']['judul'] = "Asettetap";
                $kelompokHasil['asettetap']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['asettetap']['multi']['total'] = $total_asettetap;
                $kelompokHasil['asettetap']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['13', '14', '15'])) {
                if ($item['akun_id'] == '13') {
                    $total_13 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_13;
                }
                if ($item['akun_id'] == '14') {
                    $total_14 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_14;
                }
                if ($item['akun_id'] == '15') {
                    $total_15 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_15;
                }


                $total_wajiblancar += $item['debit'] - $item['kredit'];
                $kelompokHasil['wajiblancar']['multi']['judul'] = "Wajiblancar";
                $kelompokHasil['wajiblancar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['wajiblancar']['multi']['total'] = $total_wajiblancar;
                $kelompokHasil['wajiblancar']['multi']['items'][] = $items;
            }

            // if (in_array($item['akun_id'], ['13', '14', '15'])) {
            //     if($item['akun_id']== '13'){
            //         $total_13 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_13;
            //     }
            //     if($item['akun_id']== '14'){
            //         $total_14 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_14;
            //     }
            //     if($item['akun_id']== '15'){
            //         $total_15 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_15;
            //     }

            //     $total_wajiblancar += $item['debit'] + $item['kredit'];
            //     $kelompokHasil['wajiblancar']['multi']['judul'] = "Wajiblancar";
            //     $kelompokHasil['wajiblancar']['multi']['kode_akun'] = $no_akun;
            //     $kelompokHasil['wajiblancar']['multi']['total'] = $total_wajiblancar;
            //     $kelompokHasil['wajiblancar']['multi']['items'][] = $items;
            // }

            if (in_array($item['akun_id'], ['16'])) {
                $total_wajibpanjang += $item['debit'] + $item['kredit'];
                $kelompokHasil['wajibpanjang']['judul'] = "Wajibpanjang";
                $kelompokHasil['wajibpanjang']['kode_akun'] = $no_akun;
                $kelompokHasil['wajibpanjang']['total'] = $total_wajibpanjang;
                $kelompokHasil['wajibpanjang']['items'][] = $items;
            }
        }

        $data = [
            'jumums' => $kelompokHasil
        ];


        // dd($data);
        //dd($kelompokHasil);
        return view('pages.laporan.neraca', $data);
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
        $transaksi = Transaksi::latest()->with(['jurnalumum', 'jurnalumum.Akun'])->where('tanggal', "like", "%" . date("Y-m") . "%")->whereHas('jurnalumum', function ($query) {
            $query->with('Akun')->whereIn('status', ['jupen', 'jumum']);
        })->get()->pluck('jurnalumum')->toArray();

        //dd(array_merge(...$transaksi));

        $transaksiHasil = array_merge(...$transaksi);
        $kelompokHasil = [];
        $kelompokHasil['modal'] = [

            'total' => 0

        ];
        $kelompokHasil['pendapatan'] = [
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
        $kelompokHasil['prive'] = [

            'total' => 0

        ];
        $kelompokHasil['asetlancar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['asettetap'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['wajiblancar'] = [
            'single' => [],
            'multi' => [
                'total' => 0
            ]
        ];
        $kelompokHasil['wajibpanjang'] = [

            'total' => 0

        ];


        $total_modal = 0;
        $total_pendapatan = 0;
        $total_beban = 0;
        $total_prive = 0;
        $total_asetlancar = 0;
        $total_asettetap = 0;
        $total_wajiblancar = 0;
        $total_wajibpanjang = 0;
        $total_labarugi = 0;

        //modal
        $total_17 = 0;

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

        //prive
        $total_18 = 0;

        //aktiva lancar
        $total_1 = 0;
        $total_2 = 0;
        $total_3 = 0;
        $total_4 = 0;
        $total_5 = 0;

        //aktiva tetap
        $total_6 = 0;
        $total_7 = 0;
        $total_8 = 0;
        $total_9 = 0;
        $total_10 = 0;
        $total_11 = 0;
        $total_12 = 0;

        //kewajiban lancar
        $total_13 = 0;
        $total_14 = 0;
        $total_15 = 0;

        //kewajiban jangka panjang
        $total_16 = 0;



        $no_akun = "";
        foreach ($transaksiHasil as $key => $item) {

            $items = [
                'kode_akun' => $no_akun,
                'akun_id' => $item['akun_id'],
                'akun' => $item['akun'],
                'data' => $item,
            ];

            if (in_array($item['akun_id'], ['17'])) {
                $total_modal += $item['debit'] + $item['kredit'];
                $kelompokHasil['modal']['judul'] = "modal";
                $kelompokHasil['modal']['kode_akun'] = $no_akun;
                $kelompokHasil['modal']['total'] = $total_modal;
                $kelompokHasil['modal']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['20', '21', '22', '23', '24', '25', '26', '27'])) {
                if ($item['akun_id'] == '20') {
                    $total_20 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_20;
                }
                if ($item['akun_id'] == '21') {
                    $total_21 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_21;
                }
                if ($item['akun_id'] == '22') {
                    $total_22 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_22;
                }
                if ($item['akun_id'] == '23') {
                    $total_23 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_23;
                }
                if ($item['akun_id'] == '24') {
                    $total_24 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_24;
                }
                if ($item['akun_id'] == '25') {
                    $total_25 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_25;
                }
                if ($item['akun_id'] == '26') {
                    $total_26 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['pendapatan']['single'][$item['akun_id']]['total'] = $total_26;
                }
                if ($item['akun_id'] == '27') {
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

            if (in_array($item['akun_id'], ['28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'])) {
                if ($item['akun_id'] == '28') {
                    $total_28 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_28;
                }
                if ($item['akun_id'] == '29') {
                    $total_29 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_29;
                }
                if ($item['akun_id'] == '30') {
                    $total_30 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_30;
                }
                if ($item['akun_id'] == '31') {
                    $total_31 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_31;
                }
                if ($item['akun_id'] == '32') {
                    $total_32 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_32;
                }
                if ($item['akun_id'] == '33') {
                    $total_33 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_33;
                }
                if ($item['akun_id'] == '34') {
                    $total_34 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_34;
                }
                if ($item['akun_id'] == '35') {
                    $total_35 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_35;
                }
                if ($item['akun_id'] == '36') {
                    $total_36 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_36;
                }
                if ($item['akun_id'] == '37') {
                    $total_37 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_37;
                }
                if ($item['akun_id'] == '38') {
                    $total_38 += $item['debit'] + $item['kredit'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['beban']['single'][$item['akun_id']]['total'] = $total_38;
                }
                if ($item['akun_id'] == '39') {
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

            if (in_array($item['akun_id'], ['18'])) {
                $total_prive += $item['debit'] + $item['kredit'];
                $kelompokHasil['prive']['judul'] = "prive";
                $kelompokHasil['prive']['kode_akun'] = $no_akun;
                $kelompokHasil['prive']['total'] = $total_prive;
                $kelompokHasil['prive']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['1', '2', '3', '4', '5'])) {
                if ($item['akun_id'] == '1') {
                    $total_1 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_1;
                }
                if ($item['akun_id'] == '2') {
                    $total_2 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_2;
                }
                if ($item['akun_id'] == '3') {
                    $total_3 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_3;
                }
                if ($item['akun_id'] == '4') {
                    $total_4 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_4;
                }
                if ($item['akun_id'] == '5') {
                    $total_5 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asetlancar']['single'][$item['akun_id']]['total'] = $total_5;
                }


                $total_asetlancar += $item['debit'] - $item['kredit'];
                $kelompokHasil['asetlancar']['multi']['judul'] = "Asetlancar";
                $kelompokHasil['asetlancar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['asetlancar']['multi']['total'] = $total_asetlancar;
                $kelompokHasil['asetlancar']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['6', '7', '8', '9', '10', '11', '12'])) {
                if ($item['akun_id'] == '6') {
                    $total_6 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_6;
                }
                if ($item['akun_id'] == '7') {
                    $total_7 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_7;
                }
                if ($item['akun_id'] == '8') {
                    $total_8 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_8;
                }
                if ($item['akun_id'] == '9') {
                    $total_9 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_9;
                }
                if ($item['akun_id'] == '10') {
                    $total_10 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_10;
                }
                if ($item['akun_id'] == '11') {
                    $total_11 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_11;
                }
                if ($item['akun_id'] == '12') {
                    $total_12 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['asettetap']['single'][$item['akun_id']]['total'] = $total_12;
                }


                $total_asettetap += $item['debit'] - $item['kredit'];
                $kelompokHasil['asettetap']['multi']['judul'] = "Asettetap";
                $kelompokHasil['asettetap']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['asettetap']['multi']['total'] = $total_asettetap;
                $kelompokHasil['asettetap']['multi']['items'][] = $items;
            }

            if (in_array($item['akun_id'], ['13', '14', '15'])) {
                if ($item['akun_id'] == '13') {
                    $total_13 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_13;
                }
                if ($item['akun_id'] == '14') {
                    $total_14 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_14;
                }
                if ($item['akun_id'] == '15') {
                    $total_15 += $item['debit'] - $item['kredit'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
                    $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_15;
                }


                $total_wajiblancar += $item['debit'] - $item['kredit'];
                $kelompokHasil['wajiblancar']['multi']['judul'] = "Wajiblancar";
                $kelompokHasil['wajiblancar']['multi']['kode_akun'] = $no_akun;
                $kelompokHasil['wajiblancar']['multi']['total'] = $total_wajiblancar;
                $kelompokHasil['wajiblancar']['multi']['items'][] = $items;
            }

            // if (in_array($item['akun_id'], ['13', '14', '15'])) {
            //     if($item['akun_id']== '13'){
            //         $total_13 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_13;
            //     }
            //     if($item['akun_id']== '14'){
            //         $total_14 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_14;
            //     }
            //     if($item['akun_id']== '15'){
            //         $total_15 += $item['debit'] + $item['kredit'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['akun'] = $item['akun']['akun'];
            //         $kelompokHasil['wajiblancar']['single'][$item['akun_id']]['total'] = $total_15;
            //     }

            //     $total_wajiblancar += $item['debit'] + $item['kredit'];
            //     $kelompokHasil['wajiblancar']['multi']['judul'] = "Wajiblancar";
            //     $kelompokHasil['wajiblancar']['multi']['kode_akun'] = $no_akun;
            //     $kelompokHasil['wajiblancar']['multi']['total'] = $total_wajiblancar;
            //     $kelompokHasil['wajiblancar']['multi']['items'][] = $items;
            // }

            if (in_array($item['akun_id'], ['16'])) {
                $total_wajibpanjang += $item['debit'] + $item['kredit'];
                $kelompokHasil['wajibpanjang']['judul'] = "Wajibpanjang";
                $kelompokHasil['wajibpanjang']['kode_akun'] = $no_akun;
                $kelompokHasil['wajibpanjang']['total'] = $total_wajibpanjang;
                $kelompokHasil['wajibpanjang']['items'][] = $items;
            }
        }

        $data = [
            'profilperusahaan'=> ProfilPerusahaan::find(4),
            'jumums' => $kelompokHasil
        ];


        // dd($data);
        //dd($kelompokHasil);
        return view('pages.laporan.pdfneraca', $data);
    }


}
