<?php

namespace App\Http\Controllers;

use App\Models\Bukubesar;
use App\Models\Jurnalumum;
use Illuminate\Http\Request;

class BukubesarController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->akun_id){
            //dd($request->search); mengecek data
            $kelompok=Jurnalumum::where('akun_id', $request->akun_id)->where('tanggal',"like", "%".date("Y-m")."%")->where('status', 'jumum')->get();

        }else
        {

            $kelompok=Jurnalumum::with('Akun')->where('status','jumum')->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('akun_id','asc')->get();
        }

        $kelompokHasil = [];
        $total_debit = 0;
        $total_debit_akhir = 0;
        $total_kredit = 0;
        $item_akun = '';

        foreach($kelompok as $key => $item){
            if($item_akun != $item['akun_id']) {
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
            $kelompokHasil[$item->akun_id]['total_debit'] =$total_debit;
            $kelompokHasil[$item->akun_id]['total_kredit'] =$total_kredit;
            $kelompokHasil[$item->akun_id]['total_debit_akhir'] = $total_debit_akhir;
        }

        //dd($kelompokHasil);

        $data =[
            'jumums' => $kelompokHasil
        ];
        // dd($data);
        return view('pages.bubes.index',$data);
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
