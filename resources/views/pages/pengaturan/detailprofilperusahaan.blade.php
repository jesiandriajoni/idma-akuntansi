@extends('layouts.master')
@section('title','Profil Perusahaan')
@section('content')
<section class="section">

    <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
        <div class="section-header-back">
            <a href="/detailpengaturan" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <strong> Profil Perusahaan </strong></button>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/detailpengaturan">Pengaturan</a></div>
        <div class="breadcrumb-item">Profil Perusahaan</div>
      </div>
    </div>

<div class="row">
    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
          <h4>Form Profil Perusahaan</h4>
          <p>Form ini digunakan untuk memasukkan informasi perusahaan seperti nama perusahaan, alamat, dan informasi lainnya</p>
          <a href="/profilperusahaan/create" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
          <h4>Detail Profil Perusahaan</h4>
          <p>Anda dapat melihat Profil Perusahaan yang telah diisi disini</p>
          <a href="/profilperusahaan" class="card-cta">Lihat Detail<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-cog"></i>
          </div>
          <div class="card-body">
            <h4>Ubah Profil Perusahaan</h4>
            <p>Anda dapat mengubah isi Profil Perusahaan disini</p>
            <a href="/profilperusahaan/5/edit" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
</div>


</section>
@endsection
