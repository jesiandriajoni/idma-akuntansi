@extends('layouts.master')

@section('title', 'Form Produk')
@section('content')


    <section class="section">
        <div class="section-header">
            <h1>EDIT<br> PRODUK</h1>

        </div>

        <div class="card">

            <form method="POST" action="/produk/{{ $Produk->id }}/update" class="needs-validation" novalidate=""
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Jasa</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="kode_jasa"
                                value="{{ old('kode_jasa') ?? $Produk->kode_jasa }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Jasa</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="nama_jasa"
                                value="{{ old('nama_jasa') ?? $Produk->nama_jasa }}">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="harga"
                                value="{{ old('harga') ?? $Produk->harga }}">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="ket" value="{{ old('keterangan') ?? $Produk->keterangan }}"
                                style="height: 100px"></textarea>
                        </div>

                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar:</label>
                        <div class="col-sm-12 col-md-7">

                            <input type="file" class="form-control" name="gambar_jasa">
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="/indexproduk" class="btn btn-danger" type="reset">Batal</a>
                </div>

            </form>
        </div>


    </section>

@endsection
