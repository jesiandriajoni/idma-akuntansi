@extends('layouts.master')
@section('title', ' Edit Transaksi ')
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
            <form method="POST" action="/transaksi/update/{{ $Transaksis->id }}">
                {{-- menmapilkan data di tabel --}}
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Transaksi:</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" readonly name="no_transaksi"
                                value="{{ old('notr') ?? $Transaksis->no_transaksi }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" name="tanggal"
                                value="{{ old('tanggal') ?? $Transaksis->tanggal }}">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="keterangan"
                                value="">{{ old('keterangan') ?? $Transaksis->keterangan }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4 d-none">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Karyawan:</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" readonly name="nama_karyawan"
                                value="{{ old('nama_karyawan') ?? $Transaksis->nama_karyawan }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        <a href="/transaksi" button class="btn btn-danger" type="reset">Batal</a>
                    </div>

                </div>

            </form>

        </div>

    </section>

@endsection
