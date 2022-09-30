<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Kategoriakun;
use Illuminate\Http\Request;

class AkunController extends Controller
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
        if($request->search){
            //dd($request->search); mengecek data
            $cari=Akun::where('no_akun','LIKE','%' .$request->search.'%')->orWhere('akun','LIKE','%' .$request->search.'%')->orWhere('nama_kategori','LIKE','%' .$request->search.'%')->orWhere('deskripsi','LIKE','%' .$request->search.'%')->Paginate(4);

        }else
        {
            $cari=Akun::with('kategoriakun')->latest()->Paginate(4);
        }
        // memanggil data secara keseluruhan
        $data = [
        'akuns' => $cari,
         ];

         return view('pages.akun.index',$data);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data =[
            'kategoriakuns' => Kategoriakun::get(),
        ];
        return view('pages.akun.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAkunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategori_id' => 'required',
            'no_akun' => 'required',
            'akun' => 'required',
            'deskripsi' => 'required',

        ]);

        Akun::create([
            //'nama' sisi kiri harus sesuai dengan field database
            //$request->nama harus sesuai dengan value name yang ada di input form, seperti name='nama'
            'kategori_id' => $request->kategori_id,
            'nama_kategori' => '',
            'no_akun' => $request->no_akun,
            'akun' => $request->akun,
            'deskripsi' => $request->deskripsi,

        ]);

        return redirect('/daftarakun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.akun.editakun', [
            'kategoriakuns' => Kategoriakun::get(),
            'akuns' => Akun::find($id), // untuk mengambil data Post sesuai
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAkunRequest  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $this->validate($request, [
            'kategori_id' => ['required'],
            'no_akun' => ['required'],
            'akun' => ['required'],
            'deskripsi' => ['required'],
            ]);
            $akun = Akun::find($id);

            $akun->update([
            'kategori_id' => $request->kategori_id,
            'nama_kategori' => '',
            'no_akun' => $request->no_akun,
            'akun' => $request->akun,
            'deskripsi' => $request->deskripsi,
            ]);
            return redirect('/daftarakun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Akun::find($id)->delete();
        return redirect('/daftarakun');
    }
}
