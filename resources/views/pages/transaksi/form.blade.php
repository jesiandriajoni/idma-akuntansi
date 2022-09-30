@extends('layouts.master')
@section('title', 'Transaksi')
@section('content')
    <section class="section">
        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT. Inovindo Digital Media</h5>

            </div>
        </div>
        <div class="text-center">
            <div>
                <h6>Transaksi</h6>

            </div>
        </div>
        @include('components.error')
        <div class="container">
            <form method="POST" action="/transaksi/store">
                {{-- menmapilkan data di tabel --}}
                @csrf
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Transaksi :</label>
                        <div class="col-sm-12 col-md-7">
                            <input value={{ $no_transaksi }} readonly type="text" class="form-control" name="no_transaksi"  placeholder="Contoh --001/VII/2022--">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Karyawan</label>
                        <div class="col-sm-12 col-md-7">
                            <input value="{{$karyawan->accounting}}" type="text" class="form-control" name="nama_karyawan">
                        </div>
                    </div> --}}



                    <div class="text-center">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        <a href="/transaksi" button class="btn btn-danger" type="reset">Batal</a>
                    </div>

                </div>

            </form>

        </div>


    </section>


@endsection

