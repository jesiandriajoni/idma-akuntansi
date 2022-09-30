@extends('layouts.master')
@section('title','Edit Pengaturan Pengguna')
@section('content')
<section class="section">

<section class="section">
<div>
    <form method="POST" action="/pengaturanpengguna/{{$PengaturanPengguna->id}}/update" >
        @csrf
        @method('PUT')


        <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
            <div class="section-header-back">
                <a href="/detailpengaturanpengguna" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
              </div>
          <strong> Pengaturan Pengguna </strong></button>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/detailpengaturan">Pengaturan</a></div>
            <div class="breadcrumb-item active"><a href="/detailpengaturanpengguna">Pengaturan Pengguna</a></div>
            <div class="breadcrumb-item">Edit Pengaturan Pengguna</div>
          </div>
        </div>

    <div class="section-body">
        <h2 class="section-title">Edit Pengaturan Pengguna</h2>
        <p class="section-lead">
            Anda dapat mengubah semua pengaturan pengguna disini
        </p>
    </div>

    <div class="form-group row">
        <label for="inputnamapengguna" class="col-sm-3 col-form-label" style="margin-left: 20px">Nama Pengguna</label>
        <div class="col-sm-8">
          <input type="namapengguna" class="form-control" id="inputnamapengguna" placeholder="Nama Pengguna" name="name" value="{{ old('name') ?? $PengaturanPengguna->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputjabatan" class="col-sm-3 col-form-label" style="margin-left: 20px">Jabatan</label>
        <div class="col-sm-8">
          <input type="jabatan" class="form-control" id="inputjabatan" placeholder="Jabatan" name="jabatan" value="{{ old('jabatan') ?? $PengaturanPengguna->jabatan}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputjeniskelamin" class="col-sm-3 col-form-label" style="margin-left: 20px">Jenis Kelamin</label>
        <div class="col-sm-8">
          <input type="jeniskelamin" class="form-control" id="inputjeniskelamin" placeholder="Jenis Kelamin" name="jeniskelamin" value="{{ old('jeniskelamin') ?? $PengaturanPengguna->jeniskelamin}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputtelp" class="col-sm-3 col-form-label" style="margin-left: 20px">Telepon</label>
        <div class="col-sm-8">
          <input type="jenistelp" class="form-control" id="inputtelp" placeholder="Telepon" name="telp" value="{{ old('telp') ?? $PengaturanPengguna->telp}}">
        </div>
    </div>
    <div class="form-group row" style="margin-top: 20px">
        <label for="file" class="col-sm-3 col-form-label" style="margin-left: 20px">Foto</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="foto" value="{{ old('foto') ?? $PengaturanPengguna->foto}}">
        </div>
    </div>
</div>
<div style="margin-left:830px">
    <button class="btn btn-success mr-1" type="submit">Simpan</button>
    <button class="btn btn-danger" type="reset">Batal</button>
</div>
        </form>
      </div>
</section>





</section>
@endsection

