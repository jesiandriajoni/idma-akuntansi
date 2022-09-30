<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'Kontaks' => Kontak::latest()->Paginate(4),
        ];
        return view('pages.kontak.index',$data);
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
        return view('pages.kontak.form',$data);
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
            'nama_cus'=>'required',
            'nama_perusahan'=>'required',
            'alamat_cus'=>'required',
            'email_cus'=>'required',
            'telp_cus'=>'required',
            'harga'=>'required',
        ]);
        Kontak ::create([
            'nama_cus'=>$request->nama_cus,
            'nama_perusahan'=>$request->nama_perusahan,
            'alamat_cus'=>$request->alamat_cus,
            'email_cus'=>$request->email_cus,
            'telp_cus'=>$request->telp_cus,
            'harga'=>$request->harga,
        ]);
        return redirect('/kontak');
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
        return view('pages.kontak.edit',[
            'Kontak' =>Kontak::find($id),//untuk mengambil data post sesuai dengan id yg di terima

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

            'nama_cus'=>['required'],
            'nama_perusahan'=>['required'],
            'alamat_cus'=>['required'],
            'email_cus'=>['required'],
            'telp_cus'=>['required'],
            'harga'=>['required'],
            ]);
            $post = Kontak::find($id);

            $post->update([
                'nama_cus'=>$request->nama_cus,
                'nama_perusahan'=>$request->nama_perusahan,
                'alamat_cus'=>$request->alamat_cus,
                'email_cus'=>$request->email_cus,
                'telp_cus'=>$request->telp_cus,
                'harga'=>$request->harga,
            ]);
            return redirect('/kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontak::find($id)->delete();
        return redirect('/kontak');
    }
}
