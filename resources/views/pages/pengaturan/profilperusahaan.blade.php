@extends('layouts.master')
@section('title','Profil Perusahaan')
@section('content')
<section class="section">

<div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top">
  <strong> Profil Perusahaan </strong></button>
</div>

<table border="0">
  <tbody >
@forelse ($ProfilPerusahaan as $item)

    {{--<div class="media" style="margin-left:400px" >
        <img alt="image" src="../assets/img/IDM.png" width="160" height="160"
        style="border-radius: 50%; margin-top:30px" class="img-fluid" data-toggle="tooltip">
        </div>--}}

        <div class="px-2 py-2 whitespace-nowrap" style="margin-left:350px">
            <img src= "{{ asset('storage/' . $item->logo) }}" style="width: 225px; height:185px">
        </div>
       <tr><td> Nama Perusahaan</td><td>:</td><td>  {{ $item['nama_per'] }} </td></tr>
       <tr><td>Alamat</td><td>:</td><td> {{ $item['alamat'] }} </td></tr>
       <tr><td>Telepon</td><td>:</td><td> {{ $item['telp'] }} </td></tr>
       <tr><td>Fax</td><td>:</td><td> {{ $item['fax'] }} </td></tr>
       <tr><td>NPWP</td><td>:</td><td> {{ $item['npwp'] }} </td></tr>
       <tr><td>Website</td><td>:</td><td> {{ $item['website'] }} </td></tr>
       <tr><td>Email</td><td>:</td><td> {{ $item['email'] }} </td></tr>

       @empty
       <tr>
           <td colspan="99" align="center">Data belum ada.</td>
       </tr>
    @endforelse
  </tbody>
</table>

<div class="text-right">
    <a href="/profilperusahaan/{{ $item->id }}/edit" class="btn btn-success" type="submit">Ubah</a>
    <a href="/formprofilperusahaan" class="btn btn-danger" type="reset">Kembali</a>
</div>

</section>
@endsection
