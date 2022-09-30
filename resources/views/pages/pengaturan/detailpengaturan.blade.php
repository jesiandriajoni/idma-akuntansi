@extends('layouts.master')
@section('title','Pengaturan')
@section('content')
<section class="section">

    <div class="section-header justify-content-center" >
        <div class ="text-center">
        <h5>PT. Inovindo Digital Media</h5>
        <h5><strong> Pengaturan </strong></h5>
        </div>
    </div>

<div class="row">
    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
          <h4>PROFIL PERUSAHAAN</h4>
          <p>Profil Perusahaan seperti nama perusahaan, alamat, dan informasi lainnya</p>
          <a href="/detailprofilperusahaan" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-body">
          <h4>PENGATURAN PENGGUNA</h4>
          <p>Pengaturan Pengguna seperti nama pengguna, jabatan, dan informasi lainnya</p>
          <a href="/detailpengaturanpengguna" class="card-cta">Ubah Pengaturan<i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
</div>


</section>
@endsection
