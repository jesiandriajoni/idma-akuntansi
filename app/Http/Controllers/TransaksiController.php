<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         // logika untuk mencari data
         if ($request->search) {
            //dd($request->search); mengecek data
            $masuk = Transaksi::where('no_transaksi', 'LIKE', '%' . $request->search . '%')->where('tanggal',"like", "%".date("Y-m")."%")->orWhere('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('keterangan', 'LIKE', '%' . $request->search . '%')->latest()->Paginate(4);
        } else {

            $masuk = Transaksi::latest()->where('tanggal',"like", "%".date("Y-m")."%")->paginate(4);
        }

        // memanggil data secara keseluruhan
        $data = [
            'Transaksis' => $masuk, //berfungsi mengiriman data  dari controller ke view
            //'pimpinan' => untuk memanggil data di view sebagi variabel

        ];
        return view('pages.transaksi.index', $data);

        // $data=[
        //     'Transaksis' => Transaksi::latest()->Paginate(4),
        // ];
        // return view('pages.transaksi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'no_transaksi' => $this->no_transaksi(),
            'karyawan' => Karyawan::find(1),
        ];
        return view('pages.transaksi.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate([
            'no_transaksi'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required',


        ]);
        Transaksi ::create([
            'no_transaksi'=>$request->no_transaksi,
            'tanggal'=>$request->tanggal,
            'keterangan'=>$request->keterangan,


        ]);
        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.transaksi.edittransaksi',[
            'Transaksis' =>Transaksi::find($id),//untuk mengambil data post sesuai dengan id yg di terima

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        //dd($request->all());
            $validate = $request->validate([
            'no_transaksi'=> 'required',
            'tanggal'=> 'required',
            'keterangan'=> 'required',
            ]);

            $post = Transaksi::find($id);

            $post->jurnalumum()->update(['tanggal'=>$request->tanggal]);

            $post->update($validate);

            return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaksi_id)

    {
        $transaksi = Transaksi::with(['jurnalumum'])->find($transaksi_id);
        foreach($transaksi->jurnalumum as $item){
            $item->delete();
        }
        $transaksi->delete();
        return redirect('/transaksi');
    }

    public function no_transaksi()
    {
        $No_transaksi = Transaksi::where('id', 'LIKE', '%')->count();

        return ("TR".str_pad($No_transaksi + 1, 3, "0", STR_PAD_LEFT));
    }


}
