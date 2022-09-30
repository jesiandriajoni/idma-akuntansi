@extends('layouts.master')
@section('title','Pengaturan Pengguna')
@section('content')
<section class="section">

    <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
        <div class="section-header-back">
            <a href="/detailpengaturan" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <strong> Pengaturan Pengguna </strong></button>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/detailpengaturan">Pengaturan</a></div>
        <div class="breadcrumb-item">Pengaturan Pengguna</div>
      </div>
    </div>

<div class="row">
    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
          <h4>Form Pengaturan Pengguna</h4>
          <p>Form ini digunakan untuk memasukkan informasi pengguna seperti nama pengguna, jabatan, dan informasi lainnya</p>
          <a href="/pengaturanpengguna/create" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
          <h4>Detail Pengaturan Pengguna</h4>
          <p>Anda dapat melihat Detail Pengguna yang telah diisi disini</p>
          <a href="/pengaturanpengguna" class="card-cta">Lihat Detail<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-cog"></i>
          </div>
          <div class="card-body">
            <h4>Ubah Pengaturan Pengguna</h4>
            <p>Anda dapat mengubah isi Pengaturan Pengguna disini</p>
            <a href="/pengaturanpengguna/2/edit" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
</div>


</section>
@endsection
