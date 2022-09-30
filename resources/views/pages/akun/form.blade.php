@extends('layouts.master')
@section('title', 'Form Daftar Akun')
@section('content')
<section class="section">
    <div class="section-header justify-content-center">
        <div class="text-center">
            <h5>PT. Inovindo Digital Media</h5>
            <strong>
                <h4>Form Daftar Akun</h4>
            </strong>
        </div>
    </div>


    <div class=" text-right plus float-right" style="margin-bottom: 10px">
        <a href="/kategoriakun/create" button type="button" class="btn btn-success">Tambah Kategori Akun</a>
    </div>
    <div class="container" style="margin-top: 70px">
        <form method="POST" action="/daftarakun/store" >
            @csrf
        <div class="card-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori :</label>
                <div class="col-sm-12 col-md-7">

                    <div class="form-group">
                        <select class="form-control" name="kategori_id">
                             @forelse ($kategoriakuns as $item)
                                <option value="{{$item['id']}}">{{$item['nama']}}</option>
                             @empty


                             @endforelse


                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Akun :</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="akun">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Akun :</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="no_akun">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi :</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="deskripsi">
                </div>
            </div>




            <div class="text-center">
                <button class="btn btn-success mr-1" type="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </div>

        </div>

    </form>
    </div>


</section>

@endsection
