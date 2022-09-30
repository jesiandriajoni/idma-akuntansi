<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Butranskeluar;
use App\Models\Karyawan;
use App\Models\Pimpinan;
use App\Models\ProfilPerusahaan;

class ButransKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // logika untuk mencari data
        if($request->search){
            //dd($request->search); mengecek data
            $masuk=Butranskeluar::where('dibayar','LIKE','%' .$request->search.'%')->orWhere('tanggal','LIKE','%' .$request->search.'%')->orWhere('notr','LIKE','%' .$request->search.'%')->orWhere('nominal','LIKE','%' .$request->search.'%')->orWhere('ket','LIKE','%' .$request->search.'%')->Paginate(4);

        }else
        {
            $masuk=Butranskeluar::Paginate(4);
        }
       // memanggil data secara keseluruhan
       $data = [
        'butranskeluars' => $masuk,
    ];
    return view('pages.butrans.detailkeluar',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($this->notr());
        $data=[
            'notr'=>$this->notr(),
            'karyawan' => Karyawan::find(1),

            ];//THIS MEMANGGIL METHOD YANG YANG ADA DI DALAM KELASNYA SENDIRI
        // $pimpinans['direktur'=>$this->direktur()];

        return view('pages.butrans.formkeluar',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreButransKeluarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // nama merupakan field kolom di database tabel butranskeluars
        $request->validate([
            'tanggal'=>'required',
            'notr' => 'required',
            'dibayar'=>'required',
            'nominal'=>'required',
            'terbilang'=>'required',
            'ket'=>'required',
            'nama_direktur'=>'required',
            'nama_karyawan'=>'required',

        ]);
        ButransKeluar::create([
            'tanggal'=>$request->tanggal,
            'notr'=>$request->notr,
            'dibayar'=>$request->dibayar,
            'nominal'=>$request->nominal,
            'terbilang'=>$request->terbilang,
            'ket'=>$request->ket,
            'nama_direktur'=>$request->nama_direktur,
            'nama_karyawan'=>$request->nama_karyawan,

        ]);
        return redirect('/transaksikeluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ButransKeluar  $butransKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(ButransKeluar $butransKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ButransKeluar  $butransKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.butrans.edittransaksikeluar', [
            'butranskeluars' => Butranskeluar::find($id), // untuk mengambil data Post sesuai
            //dengan id yang diterima
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateButransKeluarRequest  $request
     * @param  \App\Models\ButransKeluar  $butransKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tanggal' => ['required'],
            'notr' => ['required'],
            'dibayar' => ['required'],
            'nominal' => ['required'],
            'terbilang' => ['required'],
            'ket' => ['required'],
            'nama_direktur'=>['required'],
            'nama_karyawan'=>['required'],

        ]);
        $butranskeluars = Butranskeluar::find($id);
        $butranskeluars->update([
            'tanggal' => $request->tanggal,
            'notr' => $request->notr,
            'dibayar' => $request->dibayar,
            'nominal' => $request->nominal,
            'terbilang'=> $request->terbilang,
            'ket' => $request->ket,
            'nama_direktur'=>$request->nama_direktur,
            'nama_karyawan'=>$request->nama_karyawan,
        ]);
        return redirect("/transaksikeluar");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ButransKeluar  $butransKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Butranskeluar::find($id)->delete();
         return redirect("/transaksikeluar");
    }
    public function cetak($id)
    {
        //
        $karyawan=Karyawan::find(1);
        return view('pages.butrans.pdfkeluar', [
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'butranskeluars' => Butranskeluar::find($id), // untuk mengambil data Post sesuai
            //dengan id yang diterima
            'karyawan'=>$karyawan,
        ]);
    }
    public function cetaktrkeluar()
    {

        $data = [
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'butranskeluars' => Butranskeluar::get(), // untuk mengambil data Post sesuai
            //dengan id yang diterima
        ];

        // dd($data);

        return view('pages.butrans.cetakpdfkeluar', $data);
    }

    public function notr()
    {

        $butransKeluar = Butranskeluar::where ('tanggal','LIKE','%' .date('Y-m').'%')->count();
        $bulan=date('m');
        return str_pad($butransKeluar+1,3,"0",STR_PAD_LEFT). "/". figureRomawi($bulan). "/".date('Y');
    }
}
