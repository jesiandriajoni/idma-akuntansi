<?php

namespace App\Http\Controllers;

use App\Models\PengaturanPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaturanPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'PengaturanPengguna' => PengaturanPengguna::get(),
        ];
        return view('pages.pengaturan.pengaturanpengguna', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[

        ];
        return view('pages.pengaturan.formpengaturanpengguna', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=> 'required',
            'jabatan'=> 'required',
            'jeniskelamin'=> 'required',
            'telp'=> 'required',
            'foto'=> 'required',
        ]);

        PengaturanPengguna::create([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'jeniskelamin' => $request->jeniskelamin,
            'telp' => $request->telp,
            'foto' =>$request->file('foto')->store('foto-pengguna'),
        ]);

        return redirect('/pengaturanpengguna');
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
        return view('pages.pengaturan.editpengaturanpengguna', [
            'PengaturanPengguna' => PengaturanPengguna::find($id), // untuk mengambil data Post sesuai dengan id yang diterima
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
        $this->validate($request, [
            'name'=> 'required',
            'jabatan'=> 'required',
            'jeniskelamin'=> 'required',
            'telp'=> 'required',
            'foto' =>$request->file('foto')->store('foto-pengguna'),
            ]);
            $PengaturanPengguna = PengaturanPengguna::find($id);
            $foto = $PengaturanPengguna->foto;
            // membuat variabel $image dengan nilaiadalah image lama data yang diubah
            if ($request->hasFile('foto')) {
            // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam in tidak akan diekseskusi
            Storage::delete($foto);
            // digunakan menghapus file lama karenatidak akan digunakan lagi, memanfaatkan variabel $image yang berisi pathfile sebelumnya
            $foto = $request->file('foto')->store('foto-pengguna'); //mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
            };
            $PengaturanPengguna->update([
            'nama_peng' => $request->nama_peng,
            'jabatan' => $request->jabatan,
            'jeniskelamin' => $request->jeniskelamin,
            'telp' => $request->telp,
            'foto' => $foto,
            ]);
            return redirect('pengaturanpengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengaturanPengguna::find($id)->delete();
        return redirect("/pengaturanpengguna");
    }
}
