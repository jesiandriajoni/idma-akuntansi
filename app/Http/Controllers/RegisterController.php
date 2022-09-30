<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register.index');
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'jabatan'  => 'required',
            'jeniskelamin' => 'required',
            'telp' => 'required',
            'foto' => 'required'
        ]);
        $validatedData['level_id']=2; //memanggil data level_id
        $validatedData['password'] = Hash::make($validatedData['password']); //agar password ditabase tertulis secara acak seperti token

        if ($request->hasFile('foto')) {
            // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam in tidak akan diekseskusi
            // digunakan menghapus file lama karenatidak akan digunakan lagi, memanfaatkan variabel $image yang berisi pathfile sebelumnya
            $validatedData['foto'] = $request->file('foto')->store('foto-pengguna'); //mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
            };

        user::create($validatedData);

        //$request->session()->flash('success', 'Registrasi selesai! Silahkan login');

        return redirect('/')->with('success', 'Registrasi selesai! Silahkan login.');
    }
}
