<?php

namespace App\Http\Controllers;

use Akun;
use App\Models\Akun as ModelsAkun;
use App\Models\Jurnalumum;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class JurnalpenutupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->tanggal){
            //dd($request->search); mengecek data
            $kelompok=Jurnalumum::where('tanggal', $request->tanggal)->where('tanggal',"like", "%".date("Y-m")."%")->where('status', 'jutup')->get();

        }else
        {
            $kelompok=Jurnalumum::with('Akun')->where('status', 'jutup')->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('tanggal','desc')->get();
        }
        // memanggil data secara keseluruhan

        $transaksi = Transaksi::with(['jurnalumum'])->whereHas('jurnalumum', function ($query) {
            $query->with('Akun')->where('status', 'jutup');
        })->where('tanggal', "like", "%" . date("Y-m") . "%")->orderBy('tanggal', 'desc')->get();
        $data =[
            'jurnalpenutups' => $transaksi,
        ];

        // dd($data);
        return view('pages.jutup.detail',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'akuns' => ModelsAkun::get(),
        ];
        return view('pages.jutup.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'transaksi_id'=>'nullable',
            'status'=>'required',
            'akun_id' => 'nullable',

            'deskripsi' => 'nullable',
            'referensi' => 'nullable',
            'debit' => 'nullable',
            'kredit' => 'nullable',

        ]);
        $transaksi = Transaksi::find($request->transaksi_id);
        for($i=0; $i<count($request->no_akun); $i++){
            Jurnalumum::create([
                //'nama' sisi kiri harus sesuai dengan field database
                //$request->nama harus sesuai dengan value name yang ada di input form, seperti name='nama'
                'transaksi_id'=>$request->transaksi_id,
                'status'=>"jutup",
                'akun_id' => $request->no_akun[$i],
                'no_akun' => '',
                'tanggal'=> $transaksi->tanggal,
                'akun' => '',
                'referensi' => $request->referensi[$i],
                'deskripsi' => $request->deskripsi[$i],
                'debit' => $request->debit[$i],
                'kredit' => $request->kredit[$i],

            ]);
        }

        return redirect('/jurnalpenutup');
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
    public function edit($transaksi_id)
    {
        return view('pages.jutup.editjutup', [
            'akuns' => ModelsAkun::get(),
            'jurnalpenutups' => Jurnalumum::where('transaksi_id', $transaksi_id)->where('status', 'jutup')->get(), // untuk mengambil data Post sesuai
            'transaksi_id' => $transaksi_id
        ]);
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
        $transaksi = Transaksi::find($request->transaksi_id);
        for ($i = 0; $i < count($request->no_akun); $i++) {

            $jurnalpenutup = Jurnalumum::updateOrCreate(['id' => $request->id[$i]], [
                'transaksi_id'=>$request->transaksi_id,
                'akun_id' => $request->no_akun[$i],
                'no_akun' => '',
                'akun' => "",
                'tanggal' =>$transaksi->tanggal,
                'deskripsi' => $request->deskripsi[$i],
                'referensi' => $request->referensi[$i],
                'debit' => $request->debit[$i],
                'kredit' => $request->kredit[$i],
            ]);
        }
        return redirect('/jurnalpenutup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaksi_id)
    {
        $transaksi = Transaksi::with(['jurnalumum'])->find($transaksi_id);
        foreach($transaksi->jurnalumum as $item){
            $item->delete();
        }
        $transaksi->delete();
        return redirect('/jurnalpenutup');

        // Jurnalumum::where('transaksi_id', $transaksi_id)->where('status', 'jutup')->delete();
        // return redirect('/jurnalpenutup');
    }
    public function search(Request $request){
        $keyword = $request->search;
        $jurnalpenutups = Jurnalumum::where('tanggal', 'like', "%" . $keyword . "%")->paginate(5);
        return view('pages.jutup.detail ', compact('jurnalpenutups'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
