@extends('layouts.master')
@section('title','Pengaturan Pengguna')
@section('content')
<section class="section">

    <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
        <div class="section-header-back">
            <a href="/detailpengaturanpengguna" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <strong> Pengaturan Pengguna </strong></button>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/detailpengaturan">Pengaturan</a></div>
        <div class="breadcrumb-item">Pengaturan Pengguna</div>
      </div>
    </div>


<table border="0">
  <tbody>
    @forelse ($PengaturanPengguna as $PengaturanPengguna)
       <tr><td>Nama Pengguna</td><td>:</td><td> {{ $PengaturanPengguna['name'] }} </td></tr>
       <tr><td>Jabatan</td><td>:</td><td> {{ $PengaturanPengguna['jabatan'] }} </td></tr>
       <tr><td>Jenis Kelamin</td><td>:</td><td> {{ $PengaturanPengguna['jeniskelamin'] }} </td></tr>
       <tr><td>Telepon</td><td>:</td><td> {{ $PengaturanPengguna['telp'] }} </td></tr>
       <tr><td>Foto</td><td>:</td><td></td></tr>
       <td class="px-2 py-2 whitespace-nowrap" style="margin-left:1000px">
             <img src= "{{ asset('storage/'. $PengaturanPengguna->foto) }}" style="width: 200px; height:160px">
       </td>

       @empty
        <tr>
            <td colspan="99" align="center">Data belum ada.</td>
        </tr>
        @endforelse

  </tbody>
</table>


</section>
@endsection
