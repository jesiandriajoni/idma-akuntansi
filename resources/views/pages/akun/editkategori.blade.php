@extends('layouts.master')
@section('title', 'Edit Kategori Akun')
@section('content')
<section class="section">
    <div class="section-header justify-content-center">
        <div class="text-center">
            <h5>PT. Inovindo Digital Media</h5>
            <strong>
                <h4>Edit Kategori Akun</h4>
            </strong>
        </div>
    </div>



    <div class="container">
        <form method="POST" action="/kategoriakun/update/{{$kategoriakuns->id}}" >
            @csrf
            @method('PUT')
        <div class="card-body">

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kategori :</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="nama"
                      value="{{ old('nama') ?? $kategoriakuns->nama
                }}">
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
