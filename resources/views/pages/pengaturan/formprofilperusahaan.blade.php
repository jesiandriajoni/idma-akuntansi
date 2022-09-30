@extends('layouts.master')
@section('title','Form Profil Perusahaan')
@section('content')
<section class="section">

<section class="section">
<div>
    <form method="POST" action ="/profilperusahaan/6/update" enctype="multipart/form-data">
        @csrf
    <div class="section-header justify-content-center" >
        <div class ="text-center">
        <h5>PT. Inovindo Digital Media</h5>
        <h5><strong>Profil Perusahaan </strong></h5>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title"> Form Profil Perusahaan</h2>
        <p class="section-lead">
            Anda dapat mengisi semua Profil Perusahaan disini
        </p>
    </div>
    <div style="margin-bottom:20px">
    <a  href="/profilperusahaan" button type="button" class="btn btn-primary" > Lihat Detail</button> </a>
    </div>
    <div class="form-group row">
        <label for="file" class="col-sm-3 col-form-label" style="margin-left: 20px">Logo</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="logo">
        </div>
 </div>
   <div class="form-group row">
     <label for="inputnamaperusahaan" class="col-sm-3 col-form-label" style="margin-left: 20px">Nama Perusahaan</label>
     <div class="col-sm-8">
       <input type="namaperusahaan" class="form-control" id="inputnamaperusahaan" placeholder="Nama Perusahaan" name="nama_per">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputalamat" class="col-sm-3 col-form-label" style="margin-left: 20px">Alamat</label>
     <div class="col-sm-8">
       <input type="alamat" class="form-control" id="inputalamat" placeholder="Alamat" name="alamat">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputtelepon" class="col-sm-3 col-form-label" style="margin-left: 20px">Telepon</label>
     <div class="col-sm-8">
       <input type="telepon" class="form-control" id="inputtelepon" placeholder="Telepon" name="telp">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputfax" class="col-sm-3 col-form-label" style="margin-left: 20px">Fax</label>
     <div class="col-sm-8">
       <input type="fax" class="form-control" id="inputfax" placeholder="Fax" name="fax">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputnpwp" class="col-sm-3 col-form-label" style="margin-left: 20px">NPWP</label>
     <div class="col-sm-8">
       <input type="npwp" class="form-control" id="inputnpwp" placeholder="NPWP" name="npwp">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputwebsite" class="col-sm-3 col-form-label" style="margin-left: 20px">Website</label>
     <div class="col-sm-8">
       <input type="website" class="form-control" id="inputwebsite" placeholder="Website" name="website">
     </div>
   </div>
   <div class="form-group row">
     <label for="inputemail" class="col-sm-3 col-form-label" style="margin-left: 20px">Email</label>
     <div class="col-sm-8">
       <input type="email" class="form-control" id="inputemail" placeholder="Email" name="email">
     </div>
   </div>

                    <div style="margin-left:700px">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                    </div>

    </form>
</div>

</section>
@endsection
