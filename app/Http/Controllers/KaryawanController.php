<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->search) {
            //dd($request->search); mengecek data
            $masuk = Karyawan::where('no_transaksi', 'LIKE', '%' . $request->search . '%')->orWhere('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('keterangan', 'LIKE', '%' . $request->search . '%')->latest()->Paginate(4);
        } else {

            $masuk = Karyawan::latest()->paginate(4);
        }

        // memanggil data secara keseluruhan
        $data = [
            'Karyawans' => $masuk, //berfungsi mengiriman data  dari controller ke view
            //'pimpinan' => untuk memanggil data di view sebagi variabel

        ];
        return view('pages.karyawan.index', $data);
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
        return view('pages.karyawan.edit',[
            'Karyawans' =>Karyawan::find($id),//untuk mengambil data post sesuai dengan id yg di terima

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
        //
        $this->validate($request, [

            'direktur'=>['required'],
            'accounting'=>['required'],


            ]);
            $post = Karyawan::find($id);

            $post->update([
                'direktur'=>$request->direktur,
                'accounting'=>$request->accounting,


            ]);
            return redirect('/karyawan');
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
