<?php

namespace App\Http\Controllers;

use App\Models\Kategoriakun;
use App\Http\Requests\StoreKategoriakunRequest;
use App\Http\Requests\UpdateKategoriakunRequest;
use Illuminate\Http\Request;

class KategoriakunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $data = [
            'kategoriakuns' => Kategoriakun::Paginate(4),
        ];
        return view('pages.akun.kategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        return view('pages.akun.formkategori', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriakunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //nama merupakan field kolom di database tabel kategoriakuns
        $request->validate([
            'nama' => 'required',

        ]);

        Kategoriakun::create([
            //'nama' sisi kiri harus sesuai dengan field database
            //$request->nama harus sesuai dengan value name yang ada di input form, seperti name='nama'
            'nama' => $request->nama,
        ]);

        return redirect('/kategoriakun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategoriakun  $kategoriakun
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoriakun $kategoriakun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategoriakun  $kategoriakun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.akun.editkategori', [
            'kategoriakuns' => Kategoriakun::find($id), // untuk mengambil data Post sesuai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriakunRequest  $request
     * @param  \App\Models\Kategoriakun  $kategoriakun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request, [
            'nama' => ['required'],
        ]);
        $post = Kategoriakun::find($id);

        $post->update([
            'nama' => $request->nama,
        ]);
        return redirect('/kategoriakun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategoriakun  $kategoriakun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kategoriakun::find($id)->delete();
        return redirect('/kategoriakun');
    }
}
