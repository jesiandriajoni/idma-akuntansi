@extends('layouts.master')

@section('title', 'Form Produk')
@section('content')


    <section class="section">
        <div class="section-header">
            <h1>FORM <br> PRODUK</h1>

        </div>
        @include('components.error')
        <div class="card">

            <form method="POST" action="/produk/store" class="needs-validation" novalidate="" enctype="multipart/form-data"
                style="margin-top: 20px">
                @csrf

                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Jasa</label>
                        <div class="col-sm-12 col-md-7">

                            <input value={{ $kode_jasa }} type="text" class="form-control" name="kode_jasa" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Jasa</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="nama_jasa" required>

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nominal" type="text" class="form-control"
                                name="harga" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="keterangan" style="height: 100px" required></textarea>
                        </div>

                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" required>Gambar:</label>
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
@push('script')
    <script>
        // untuk membuat angka di nominal ada titiknya
        $(document).ready(function() {

            $('#nominal').inputmask({
                alias: "numeric",
                prefix: "Rp. ",
                rightAlign: false,
                digits: 2,
                groupSeparator: ",",
                autoGroup: true,
                digitsOptional: false,
                removeMaskOnSubmit: true,
                autoUnmask: true,
            });
            isi()
        })
    </script>
@endpush
