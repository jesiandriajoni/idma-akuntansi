@extends('layouts.master')

@section('title', ' Edit Kontak')
@section('content')


<section class="section">
    <div class="section-header justify-content-center">
        <div class="text-center">
            <h5>PT. Inovindo Digital Media</h5>
            <h5>Kontak</h5>
        </div>
    </div>

    <div class="card">

        <form method="POST" action="/kontak/update/{{ $Kontak->id }}" class="needs-validation" novalidate="">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <i class="far fa-copy" style="margin-left: 10px; "></i>
                    <label>
                        <h6>Informasi Umum Customer</h6>
                    </label>

                </div>


                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_cus"
                            value="{{ old('nama_cus')?? $Kontak->nama_cus}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="nama_perusahan"
                            value="{{ old('nama_perusahan')?? $Kontak->nama_perusahan}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                           <textarea class="form-control" name="alamat_cus"
                           value="{{ old('alamat_cus') ?? $Kontak->alamat_cus}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="email_cus"
                            value="{{ old('email_cus')?? $Kontak->email_cus}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="telp_cus"
                            value="{{ old('telp_cus')?? $Kontak->telp_cus}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="harga"
                            value="{{ old('harga')?? $Kontak->harga}}">
                        </div>
                    </div>


                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="/kontak" type="reset" class="btn btn-danger">Batal</a>
                </div>


        </form>
    </div>

</section>

@endsection
