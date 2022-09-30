<?php

namespace App\Http\Controllers;

use App\Models\ButransMasuk;
use App\Models\Karyawan;
use App\Models\Pimpinan as ModelsPimpinan;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;


class ButransMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailmasuk(Request $request)
    {
        // logika untuk mencari data
        if ($request->search) {
            //dd($request->search); mengecek data
            $masuk = ButransMasuk::where('diterima', 'LIKE', '%' . $request->search . '%')->orWhere('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('notr', 'LIKE', '%' . $request->search . '%')->orWhere('nominal', 'LIKE', '%' . $request->search . '%')->orWhere('ket', 'LIKE', '%' . $request->search . '%')->latest()->Paginate(4);
        } else {

            $masuk = ButransMasuk::latest()->paginate(4);
        }

        // memanggil data secara keseluruhan
        $data = [
            'butransmasuks' => $masuk, //berfungsi mengiriman data  dari controller ke view
            //'pimpinan' => untuk memanggil data di view sebagi variabel

        ];
        return view('pages.butrans.detailmasuk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //dd($this->notr());
        $masuk = [
            'notr' => $this->notr(),
            'karyawan' => Karyawan::find(1),

        ]; // this memanggil method yg ada di dalam kelasnya sendiri

        return view('pages.butrans.formmasuk', $masuk);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // nama merupakan field kolom di database tabel butransmasuks
        //dd($request->all());
        $request->validate([
            'tanggal' => 'required',
            'notr' => 'required',
            'diterima' => 'required',
            'nominal' => 'required',
            'terbilang' => 'required',
            'ket' => 'required',
            'nama_direktur' => 'required',
            'nama_karyawan' => 'required',

        ]);
        ButransMasuk::create([
            'tanggal' => $request->tanggal,
            'notr' => $request->notr,
            'diterima' => $request->diterima,
            'nominal' => $request->nominal,
            'terbilang' => $request->terbilang,
            'ket' => $request->ket,
            'nama_direktur' => $request->nama_direktur,
            'nama_karyawan' => $request->nama_karyawan,

        ]);
        return redirect('/transaksimasuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ButransMasuk  $butransMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(ButransMasuk $butransMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ButransMasuk  $butransMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.butrans.edittransaksimasuk', [
            'butransmasuks' => ButransMasuk::find($id), // untuk mengambil data Post sesuai
            //dengan id yang diterima
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ButransMasuk  $butransMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tanggal' => ['required'],
            'notr' => ['required'],
            'diterima' => ['required'],
            'nominal' => ['required'],
            'terbilang' => ['required'],
            'ket' => ['required'],

        ]);


        $butransmasuks = ButransMasuk::find($id);
        $butransmasuks->update([
            'tanggal' => $request->tanggal,
            'notr' => $request->notr,
            'diterima' => $request->diterima,
            'nominal' => $request->nominal,
            'terbilang' => $request->terbilang,
            'ket' => $request->ket,
        ]);
        return redirect("/transaksimasuk");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ButransMasuk  $butransMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ButransMasuk::find($id)->delete();
        return redirect("/transaksimasuk");
    }


    public function cetak($id)
    {
        //
        $karyawan = Karyawan::find(1);
        return view('pages.butrans.pdfmasuk', [
            'butransmasuks' => ButransMasuk::find($id),
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'karyawan' => $karyawan,
            // untuk mengambil data Post sesuai
            //dengan id yang diterima
        ]);
    }
    public function cetaktrmasuk()
    {
        //
        $data = [
            'profilperusahaan' => ProfilPerusahaan::find(4),
            'butransmasuks' => ButransMasuk::get(), // untuk mengambil data Post sesuai
            //dengan id yang diterima
        ];

        // dd($data);

        return view('pages.butrans.cetakpdfmasuk', $data);
    }
    public function notr()
    {
        $butransMasuk = ButransMasuk::where('tanggal', 'LIKE', '%' . date('Y-m') . '%')->count();
        $bulan = date('m');
        return str_pad($butransMasuk + 1, 3, "0", STR_PAD_LEFT) . "/" . figureRomawi($bulan) . "/" . date('Y');
    }
    // public function pimpinan()
    // {
    //     # code...
    //     if($request->direktur){
    //         $butransMasuk=ButransMasuk::where('direktur','$request->direktur')->get();

    //     }
    //     else{
    //         $butransMasuk=ButransMasuk::with('pimpinan')->orderBy('direktur')->get();
    //     }
    // }



}
