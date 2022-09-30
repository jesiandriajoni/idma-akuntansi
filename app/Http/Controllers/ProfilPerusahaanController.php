<?php

namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/profilperusahaan/6/edit');
        $data=[
            'ProfilPerusahaan' => ProfilPerusahaan::get(),
        ];
        return view('pages.pengaturan.profilperusahaan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/profilperusahaan/6/edit');
        $data=[

        ];
        return view('pages.pengaturan.formprofilperusahaan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo'=> 'required',
            'nama_per'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'fax'=> 'required',
            'npwp'=> 'required',
            'website'=> 'required',
            'email'=> 'required',
        ]);

        ProfilPerusahaan::create([
            'logo' =>$request->file('logo')->store('logo-perusahaan'),
            'nama_per' => $request->nama_per,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'fax' => $request->fax,
            'npwp' => $request->npwp,
            'website' => $request->website,
            'email' => $request->email,
        ]);

        return redirect('/profilperusahaan');
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
        return view('pages.pengaturan.editprofilperusahaan', [
            'ProfilPerusahaan' => ProfilPerusahaan::find($id), // untuk mengambil data Post sesuai dengan id yang diterima
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
            'nama_per'=> 'required',
            'alamat'=> 'required',
            'telp'=> 'required',
            'fax'=> 'required',
            'npwp'=> 'required',
            'website'=> 'required',
            'email'=> 'required',
            ]);
            $ProfilPerusahaan = ProfilPerusahaan::find($id);
            $logo = $ProfilPerusahaan->logo;
                // membuat variabel $image dengan nilaiadalah image lama data yang diubah
                if ($request->hasFile('logo')) {
                // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam in tidak akan diekseskusi
                Storage::delete($logo);
                // digunakan menghapus file lama karenatidak akan digunakan lagi, memanfaatkan variabel $image yang berisi pathfile sebelumnya
                $logo = $request->file('logo')->store('logo-perusahaan'); //mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
            };
            $ProfilPerusahaan->update([
                'logo' =>$logo,
                'nama_per'=> $request->nama_per,
                'alamat'=>$request->alamat,
                'telp'=> $request->telp,
                'fax'=> $request->fax,
                'npwp'=> $request->npwp,
                'website'=> $request->website,
                'email'=> $request->email,
            ]);
            return redirect('/profilperusahaan/4/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProfilPerusahaan::find($id)->delete();
        return redirect("/profilperusahaan");
    }
}
