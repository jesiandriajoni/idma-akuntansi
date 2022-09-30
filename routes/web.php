<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AruskasController;
use App\Http\Controllers\BukubesarController;
use App\Http\Controllers\ButransKeluarController;
use App\Http\Controllers\ButransMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurnalpenutupController;
use App\Http\Controllers\JurnalpenyesuaianController;
use App\Http\Controllers\JurnalumumController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriakunController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LaporanlabarugiController;
use App\Http\Controllers\LaporanneracaController;
use App\Http\Controllers\LaporanperubahanmodalController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NeracasaldoController;
use App\Http\Controllers\NesasetupController;
use App\Http\Controllers\NesasuaiController;
use App\Http\Controllers\PengaturanPenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Models\Butranskeluar;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('pages/login/index');
});


Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});




// BUKTI TRANSAKSI

Route::get('/buktikeluar', function () {
    return view('pages/butrans/buktikeluar');
});
Route::get('/pdfkeluar', function () {
    return view('pages/butrans/pdfkeluar');
});
Route::get('/pdfmasuk', function () {
    return view('pages/butrans/pdfmasuk');
});


//buku besar
Route::get('/bubes', [BukubesarController::class,'index']);

//neraca saldo
Route::get('/neracasaldo', [NeracasaldoController::class,'index']);
Route::get('/neracasaldo/pdf',[NeracasaldoController::class,'cetak']);



Route::get('/jurnalpenyesuaian', [JurnalpenyesuaianController::class, 'index'])->middleware('auth');
Route::get('/jurnalpenyesuaian/create', [JurnalpenyesuaianController::class,'create']);
Route::post('/jurnalpenyesuaian/store', [JurnalpenyesuaianController::class,'store']);
Route::get('/jurnalpenyesuaian/{transaksi_id}/edit', [JurnalpenyesuaianController::class,'edit']);
Route::post('/jurnalpenyesuaian/{transaksi_id}/update', [JurnalpenyesuaianController::class,'update']);
Route::delete('/jurnalpenyesuaian/{transaksi_id}/delete', [JurnalpenyesuaianController::class,'destroy']);
Route::get('/jurnalpenyesuaian/search', [JurnalpenyesuaianController::class, 'search']);

//NERACA SALDO SETELAH PENYESUAIAN
Route::get('/nesasuai',[NesasuaiController::class,'index']);
Route::get('/nesasuai/pdf',[NesasuaiController::class,'cetak']);

// LAPORAN LABA RUGI
Route::get('/laporanlabarugi', [LaporanlabarugiController::class,'index']);
Route::get('/laporanlabarugi/cetak',[LaporanlabarugiController::class,'cetak']);

//LAPORAN PERUNAHAN MODAL
Route::get('/laporanpermo', [LaporanperubahanmodalController::class,'index']);

Route::get('/laporanpermo/cetak', [LaporanperubahanmodalController::class,'cetak']);

//laporan neraca
Route::get('/laporanneraca', [LaporanneracaController::class,'index']);

Route::get('/laporan/cetak', [LaporanneracaController::class,'cetak']);


//LAPORAN PERUBAHAN ARUS KAS
Route::get('/aruskas', [AruskasController::class,'index']);
Route::get('/laporan/pdfaruskas',[AruskasController::class,'cetak']);

//jurnal penutup
Route::get('/jurnalpenutup', [JurnalpenutupController::class, 'index'])->middleware('auth');
Route::get('/jurnalpenutup/create', [JurnalpenutupController::class,'create']);
Route::post('/jurnalpenutup/store', [JurnalpenutupController::class,'store']);
Route::get('/jurnalpenutup/{transaksi_id}/edit', [JurnalpenutupController::class,'edit']);
Route::post('/jurnalpenutup/{transaksi_id}/update', [JurnalpenutupController::class,'update']);
Route::delete('/jurnalpenutup/{transaksi_id}/delete', [JurnalpenutupController::class,'destroy']);
Route::get('/jurnalpenutup/search', [JurnalpenutupController::class, 'search']);


//NESASETUP
Route::get('/nesasetup', [NesasetupController::class,'index']);
Route::get('/nesasetup/pdfnesasetup',[NesasetupController::class,'cetak']);

//pengaturan
Route::get('/detailpengaturan', function () {
    return view('pages.pengaturan.detailpengaturan');
});
Route::get('/detailprofilperusahaan', function () {
    return view('pages.pengaturan.detailprofilperusahaan');
});
Route::get('/detailpengaturanpengguna', function () {
    return view('pages.pengaturan.detailpengaturanpengguna');
});
Route::get('/formprofilperusahaan', function () {
    return redirect('/profilperusahaan/4/edit');
});

Route::get('/profilperusahaan', function () {
    return view('pages.pengaturan.profilperusahaan');
});
//Route::get('/pengaturanpengguna', function () {
    //return view('pages.pengaturan.pengaturanpengguna');
//});
//Route::get('/editpengaturanpengguna', function () {
    //return view('pages.pengaturan.editpengaturanpengguna');
//});

//pengaturan
Route::get('/detailpengaturan', function () {
    return view('pages.pengaturan.detailpengaturan');
});
Route::get('/detailprofilperusahaan', function () {
    return view('pages.pengaturan.detailprofilperusahaan');
});
Route::get('/detailpengaturanpengguna', function () {
    return view('pages.pengaturan.detailpengaturanpengguna');
});
// Route::get('/formprofilperusahaan', function () {
//     return view('pages.pengaturan.formprofilperusahaan');
// });

// Route::get('/profilperusahaan', function () {
//     return view('pages.pengaturan.profilperusahaan');
// });

Route::get('/editprofilperusahaan', function () {
    return view('pages.pengaturan.editprofilperusahaan');
});
//Route::get('/pengaturanpengguna', function () {
    //return view('pages.pengaturan.pengaturanpengguna');
//});
//Route::get('/editpengaturanpengguna', function () {
    //return view('pages.pengaturan.editpengaturanpengguna');
//});

// Route Pengaturan Profil Perusahaan Controller
Route::resource('/pengaturan/formprofilperusahaan', ProfilPerusahaanController::class);
Route::get('profilperusahaan', [ProfilPerusahaanController::class, 'index' ]);
Route::get('/profilperusahaan/create', [ProfilPerusahaanController::class, 'create']);
Route::post('/profilperusahaan/store', [ProfilPerusahaanController::class, 'store']);
Route::get('/profilperusahaan/{id}/edit', [ProfilPerusahaanController::class, 'edit']);
Route::put('/profilperusahaan/{id}/update', [ProfilPerusahaanController::class, 'update']);
Route::delete('/profilperusahaan/{id}', [JurnalumumController::class,'destroy']);

// Route Pengaturan Pengguna Controller
Route::resource('/pengaturan/formpengaturanpengguna', PengaturanPenggunaController::class);
Route::get('pengaturanpengguna', [PengaturanPenggunaController::class, 'index' ]);
Route::get('/pengaturanpengguna/create', [PengaturanPenggunaController::class, 'create']);
Route::post('/pengaturanpengguna/store', [PengaturanPenggunaController::class, 'store']);

Route::get('/pengaturanpengguna/{id}/edit', [PengaturanPenggunaController::class, 'edit']);
Route::put('/pengaturanpengguna/{id}/update', [PengaturanPenggunaController::class, 'update']);


Route::get('/daftarakun', function () {
    return view('pages/akun/daftarakun');
});
Route::get('/formakun', function () {
    return view('pages/akun/form');
});
Route::get('/level', function () {
    return view('pages/level/index');
});
Route::get('/cetakpdf', function () {
    return view('pages/butrans/cetakpdfmasuk');
});

Route::get('/level',[LevelController::class,'index']);

//bukti transaksi masuk
Route::get('/transaksimasuk',[ButransMasukController::class,'detailmasuk']);// link untuk tampilkan data traksaksi masuk
Route::get('/transaksimasuk/create',[ButransMasukController::class,'create']);//link untuk mengisi form transaksi masuk
Route::post('/transaksimasuk/store',[ButransMasukController::class,'store']);// link untuk menyimpan data input
Route::get('/transaksimasuk/{id}/edit',[ButransMasukController::class,'edit']);
Route::get('/transaksimasuk/{id}/cetak',[ButransMasukController::class,'cetak']);
Route::put('/transaksimasuk/{id}/update',[ButransMasukController::class,'update']);
Route::delete('/transaksimasuk/{id}/hapus',[ButransMasukController::class,'destroy']);
Route::get('/transaksimasuk/cetaktrmasuk',[ButransMasukController::class,'cetaktrmasuk']);

// bukti transaksi keluar
Route::get('/transaksikeluar',[ButransKeluarController::class,'index']);//link untuk menmapilkan data traksaksi keluar
Route::get('/transaksikeluar/create',[ButransKeluarController::class,'create']);
Route::post('/transaksikeluar/store',[ButransKeluarController::class,'store']);
Route::get('/transaksikeluar/{id}/edit',[ButransKeluarController::class,'edit']);
Route::put('/transaksikeluar/{id}/update',[ButransKeluarController::class,'update']);
Route::delete('/transaksikeluar/{id}/hapus',[ButransKeluarController::class,'destroy']);
Route::get('/transaksikeluar/{id}/cetak',[ButransKeluarController::class,'cetak']);
Route::get('/transaksikeluar/cetaktrkeluar',[ButransKeluarController::class,'cetaktrkeluar']);
// crud buttras masuk
Route::resource('/pages/butrans/detailmasuk', ButransMasukController::class)
->middleware('auth');

//route login controller
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//route register controller
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//route dashboard
Route::get('/dashboard', function () {
    return view('pages/dashboard/index');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//daftar akun
Route::get('/daftarakun/{id}/edit', [AkunController::class,'edit']);//link untuk mengedit form kategori akun
Route::put('/daftarakun/update/{id}', [AkunController::class,'update']);//link untuk menyimpan data inputan form di kategori akun
Route::delete('/daftarakun/{id}', [AkunController::class, 'destroy']);
Route::get('/daftarakun', [AkunController::class,'index']);//link untuk tampilan daftar akun
Route::get('/daftarakun/create', [AkunController::class,'create']);// link untuk mengisi form daftar akun
Route::post('/daftarakun/store', [AkunController::class,'store']);//link untuk menyimpan data inputan form di daftar akun
Route::get('/kategoriakun/create', [KategoriakunController::class,'create']);//link untuk mengisi form kategori akun
Route::get('/kategoriakun', [KategoriakunController::class,'index'])->middleware('auth');//link untuk tampilan kategori akun
Route::post('/kategoriakun/store', [KategoriakunController::class,'store']);//link untuk menyimpan data inputan form di kategori akun
Route::get('/kategoriakun/{id}/edit', [KategoriakunController::class,'edit']);//link untuk mengedit form kategori akun
Route::put('/kategoriakun/update/{id}', [KategoriakunController::class,'update']);//link untuk menyimpan data inputan form di kategori akun
Route::delete('/kategoriakun/{id}', [KategoriakunController::class, 'destroy']);

//jurnal umum
Route::get('/jurnalumum', [JurnalumumController::class,'index']);
Route::get('/jurnalumum/create', [JurnalumumController::class,'create']);
Route::post('/jurnalumum/store', [JurnalumumController::class,'store']);
Route::get('/jurnalumum/{transaksi_id}/edit', [JurnalumumController::class,'edit']);
Route::post('/jurnalumum/{transaksi_id}/update', [JurnalumumController::class,'update']);
Route::delete('/jurnalumum/{transaksi_id}/delete', [JurnalumumController::class,'destroy']);
Route::get('/jurnalumum/search', [JurnalUmumController::class, 'search']);

//produk
Route::get('/indexproduk', [ProdukController::class, 'index' ]);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit' ]);
Route::put('/produk/{id}/update', [ProdukController::class, 'update']);
Route::delete('/produk/{id}/hapus', [ProdukController::class, 'destroy']);
//kontak
Route::get('/kontak', [KontakController::class, 'index' ]);
Route::get('/kontak/create', [KontakController::class, 'create']);
Route::post('/kontak/store', [KontakController::class, 'store']);
Route::get('/kontak/edit/{id}', [KontakController::class, 'edit']);
Route::put('/kontak/update/{id}', [KontakController::class, 'update']);
Route::delete('/kontak/{id}/hapus', [KontakController::class, 'destroy']);

//transaksi
Route::get('/transaksi', [TransaksiController::class, 'index' ]);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::put('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/{id}/hapus', [TransaksiController::class, 'destroy']);

//karyawan
Route::get('/karyawan', [KaryawanController::class, 'index' ]);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update']);

//Grafik Labarugi
Route::get('/grafiklabarugi', [RekapController::class, 'labarugi']);
Route::get('/grafikperubahanmodal', [RekapController::class, 'perubahanmodal']);
Route::get('/grafikpiutangusaha', [RekapController::class, 'piutangusaha']);
Route::get('/grafikperubahankas', [RekapController::class, 'perubahankas']);






