@extends('layouts.master')
@section('title','Form Pengaturan Pengguna')
@section('content')
<section class="section">

    <form method="POST" action ="/pengaturanpengguna/store" enctype="multipart/form-data">
        @csrf

    <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
        <div class="section-header-back">
            <a href="/detailpengaturanpengguna" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
      <strong> Pengaturan Pengguna </strong></button>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/detailpengaturan">Pengaturan</a></div>
        <div class="breadcrumb-item active"><a href="/detailpengaturanpengguna">Pengaturan Pengguna</a></div>
        <div class="breadcrumb-item">Form Pengaturan Pengguna</div>
      </div>
    </div>

    <div class="section-body">
        <h2 class="section-title"> Form Pengaturan Pengguna</h2>
        <p class="section-lead">
            Anda dapat mengisi semua pengaturan pengguna disini
        </p>
    </div>

<div class="card">
                  <div class="card-header">
                    <h4>Pengaturan Pengguna</h4>
                  </div>
                    <div class="form-group row">
                      <label for="inputnamapengguna" class="col-sm-3 col-form-label" style="margin-left: 20px">Nama Pengguna</label>
                      <div class="col-sm-8">
                        <input type="namapengguna" class="form-control" id="inputnamapengguna" placeholder="Nama Pengguna" name="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputjabatan" class="col-sm-3 col-form-label" style="margin-left: 20px">Jabatan</label>
                      <div class="col-sm-8">
                        <input type="jabatan" class="form-control" id="inputjabatan" placeholder="Jabatan" name="jabatan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputjeniskelamin" class="col-sm-3 col-form-label" style="margin-left: 20px">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <input type="jeniskelamin" class="form-control" id="inputjeniskelamin" placeholder="Jenis Kelamin" name="jeniskelamin">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputtelepon" class="col-sm-3 col-form-label" style="margin-left: 20px">Telepon</label>
                      <div class="col-sm-8">
                        <input type="telepon" class="form-control" id="inputtelepon" placeholder="Telepon" name="telp">
                      </div>
                    </div>
                    <div class="form-group row">
                         <label for="file" class="col-sm-3 col-form-label" style="margin-left: 20px">Foto</label>
                         <div class="col-sm-8">
                             <input type="file" class="form-control" name="foto">
                         </div>
                  </div>

                  <div style="margin-left:945px">
                    <button class="btn btn-success mr-1" type="submit">Simpan</button>
                </div>



</div>
</form>

</section>
@endsection
