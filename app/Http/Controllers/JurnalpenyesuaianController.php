<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnalpenyesuaian;
use App\Http\Requests\StoreJurnalpenyesuaianRequest;
use App\Http\Requests\UpdateJurnalpenyesuaianRequest;
use App\Models\Jurnalumum;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class JurnalpenyesuaianController extends Controller
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
            $kelompok=Jurnalumum::where('tanggal', $request->tanggal)->where('status', 'jupen')->where('tanggal',"like", "%".date("Y-m")."%")->get();

        }else
        {
            $kelompok=Jurnalumum::with('Akun')->where('status','jupen')->where('tanggal',"like", "%".date("Y-m")."%")->orderBy('tanggal','desc')->get();
        }
        // memanggil data secara keseluruhan
        $transaksi = Transaksi::with(['jurnalumum'])->whereHas('jurnalumum', function ($query) {
            $query->with('Akun')->where('status', 'jupen');
        })->where('tanggal', "like", "%" . date("Y-m") . "%")->orderBy('tanggal', 'desc')->get();

        $data =[
            'jurnalpenyesuaians' => $transaksi,
        ];
        // dd($data);
        return view('pages.jupen.detail',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'akuns' => Akun::get(),
        ];
        return view('pages.jupen.form',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJurnalpenyesuaianRequest  $request
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
                'status'=>"jupen",
                'akun_id' => $request->no_akun[$i],
                'no_akun' => '',
                'tanggal'=>  $transaksi->tanggal,
                'akun' => '',
                'referensi' => $request->referensi[$i],
                'deskripsi' => $request->deskripsi[$i],
                'debit' => $request->debit[$i],
                'kredit' => $request->kredit[$i],

            ]);
        }

        return redirect('/jurnalpenyesuaian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalpenyesuaian
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalpenyesuaian
     * @return \Illuminate\Http\Response
     */
    public function edit($transaksi_id)
    {
        return view('pages.jupen.editjupen', [
            'akuns' => Akun::get(),
            'jurnalpenyesuaians' => Jurnalumum::where('transaksi_id', $transaksi_id)->where('status', 'jupen')->get(), // untuk mengambil data Post sesuai
            'transaksi_id' => $transaksi_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJurnalpenyesuaianRequest  $request
     * @param  \App\Models\Jurnalumum  $jurnalpenyesuaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($request->transaksi_id);
        for ($i = 0; $i < count($request->no_akun); $i++) {

            $jurnalpenyesuaians = Jurnalumum::updateOrCreate(['id' => $request->id[$i]], [
                'transaksi_id'=>$request->transaksi_id,
                'status'=>"jupen",
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
        return redirect('/jurnalpenyesuaian');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurnalumum  $jurnalpenyesuaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaksi_id)
    {
        $transaksi = Transaksi::with(['jurnalumum'])->find($transaksi_id);
        foreach($transaksi->jurnalumum as $item){
            $item->delete();
        }
        $transaksi->delete();
        return redirect('/jurnalpenyesuaian');
    }
    public function search(Request $request){
        $keyword = $request->search;
        $jurnalpenyesuaians = Jurnalumum::where('tanggal', 'like', "%" . $keyword . "%")->paginate(5);
        return view('pages.jupen.detail ', compact('jurnalpenyesuaians'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
