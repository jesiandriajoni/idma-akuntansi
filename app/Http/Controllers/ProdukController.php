<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->search){
            //dd($request->search); mengecek data
            $Produk=Produk::where('kode_jasa','LIKE','%' .$request->search.'%')->orWhere('nama_jasa','LIKE','%' .$request->search.'%')->orWhere('harga','LIKE','%' .$request->search.'%')->orWhere('keterangan','LIKE','%' .$request->search.'%')->Paginate(4);

        }else {
            $Produk=Produk::latest()->Paginate(4);
        }
                $data =[
                    'Produk' => $Produk,

        ];
        return view('pages.produk.indexproduk', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[

            'kode_jasa' => $this->kode_jasa()

        ];
        return view('pages.produk.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('gambar_jasa')->store('produk-gambar');
        //nama merupakan field kolom didtabel produk
        $request->validate([
            'kode_jasa'=>'required',
            'nama_jasa'=>'required',
            'harga'=>'required',
            'keterangan'=>'required',
            'gambar_jasa'=>'required',
        ]);

        //sebelah kanan name dari form produk
        Produk::create([

            'kode_jasa' =>$request->kode_jasa,
            'nama_jasa' =>$request->nama_jasa,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'gambar_jasa' =>$request->file('gambar_jasa')->store('produk-gambar'),
        ]);

        return redirect('indexproduk');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Produk::find($id);
        return view('/indexproduk');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.produk.edit', [
            'Produk' => Produk::find($id),
            // untuk mengambil data Produk sesuai dengan id yang diterima
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
            'kode_jasa'=>['required'],
            'nama_jasa'=>['required'],
            'harga'=>['required'],
            'keterangan'=>['required'],

            ]);
            $Produk = Produk::find($id);
            $gambar_jasa = $Produk->gambar_jasa;
            // membuat variabel $image dengan nilaiadalah image lama data yang diubah
            if ($request->hasFile('gambar_jasa')) {
            // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam in tidak akan diekseskusi
            Storage::delete($gambar_jasa);
            // digunakan menghapus file lama karenatidak akan digunakan lagi, memanfaatkan variabel $image yang berisi pathfile sebelumnya
            $gambar_jasa = $request->file('gambar_jasa')->store('produk-gambar'); //mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
            };
            $Produk->update([
                'kode_jasa' =>$request->kode_jasa,
                'nama_jasa' =>$request->nama_jasa,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'gambar_jasa' => $gambar_jasa,

            ]);
            return redirect('indexproduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();
        return redirect("/indexproduk");

    }

    public function kode_jasa()
    {
        $produks = Produk::where ('kode_jasa','LIKE','%')->count();
        return  ("P".str_pad($produks+1,3,"0",STR_PAD_LEFT ));
    }
}
