<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekaplabarugi = Rekap::where('tipe', 'labarugi')->get()->toArray();
        $rekappermo = Rekap::where('tipe', 'perubahanmodal')->get()->toArray();
        $rekappiutangusaha = Rekap::where('tipe', 'piutangusaha')->get()->toArray();
        $rekaparuskas = Rekap::where('tipe', 'perubahanaruskas')->get()->toArray();
        $rekapdata = [0,0,0,0,0,0,0,0,0,0,0,0];

        $labarugi = $rekapdata;
        foreach($rekaplabarugi as $r){
            $labarugi[intval(date('m',strtotime($r['tanggal'])))-1] = $r['total'];
        }

        $rekap_perubahanaruskas = Rekap::where('tipe', 'perubahanaruskas')->orderBy('tanggal')->get()->toArray();

        $perubahanmodal = $rekapdata;
        foreach($rekappermo as $r){
            $perubahanmodal[intval(date('m',strtotime($r['tanggal'])))-1] = $r['total'];
        }

        $piutangusaha = $rekapdata;
        foreach($rekappiutangusaha as $r){
            $piutangusaha[intval(date('m',strtotime($r['tanggal'])))-1] = $r['total'];
        }

        $perubahanaruskas = $rekapdata;
        foreach($rekaparuskas as $r){
            $perubahanaruskas[intval(date('m',strtotime($r['tanggal'])))-1] = $r['total'];
        }

        //dd($perubahanaruskas);

        //dd($rekap,$perubahanmodal);
        $data=[
            'labarugi' => json_encode($labarugi),
            'perubahanmodal' => json_encode($perubahanmodal),
            'piutangusaha' => json_encode($piutangusaha),
            'perubahanaruskas' => json_encode($perubahanaruskas),
        ];

        return view('pages.dashboard.index', $data);
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
}
