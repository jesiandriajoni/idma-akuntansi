@extends('layouts.master')
@section('title', 'Edit Profil Perusahaan')
@section('content')
    <section class="section">

        <section class="section">
            <div>
                <form method="POST" action="/profilperusahaan/{{ $ProfilPerusahaan->id }}/update"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="section-header justify-content-center">
                        <div class="text-center">
                            <h5>PT. Inovindo Digital Media</h5>
                            <h5><strong>Profil Perusahaan </strong></h5>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-3 col-form-label" style="margin-left: 20px">Logo (250px X 70px)</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="logo"
                                value="{{ old('logo') ?? $ProfilPerusahaan->logo }}" placeholder="250px X 70px">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputnamaperusahaan" class="col-sm-3 col-form-label" style="margin-left: 20px">Nama
                            Perusahaan</label>
                        <div class="col-sm-8">
                            <input type="namaperusahaan" class="form-control" id="inputnamaperusahaan"
                                placeholder="Nama Perusahaan" name="nama_per"
                                value="{{ old('nama_per') ?? $ProfilPerusahaan->nama_per }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputalamat" class="col-sm-3 col-form-label" style="margin-left: 20px">Alamat</label>
                        <div class="col-sm-8">
                            <input type="alamat" class="form-control" id="inputalamat" placeholder="Alamat" name="alamat"
                                value="{{ old('alamat') ?? $ProfilPerusahaan->alamat }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtelepon" class="col-sm-3 col-form-label" style="margin-left: 20px">Telepon</label>
                        <div class="col-sm-8">
                            <input type="telepon" class="form-control" id="inputtelepon" placeholder="Telepon" name="telp"
                                value="{{ old('telp') ?? $ProfilPerusahaan->telp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputfax" class="col-sm-3 col-form-label" style="margin-left: 20px">Fax</label>
                        <div class="col-sm-8">
                            <input type="fax" class="form-control" id="inputfax" placeholder="Fax" name="fax"
                                value="{{ old('fax') ?? $ProfilPerusahaan->fax }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputnpwp" class="col-sm-3 col-form-label" style="margin-left: 20px">NPWP</label>
                        <div class="col-sm-8">
                            <input type="npwp" class="form-control" id="inputnpwp" placeholder="NPWP" name="npwp"
                                value="{{ old('npwp') ?? $ProfilPerusahaan->npwp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputwebsite" class="col-sm-3 col-form-label" style="margin-left: 20px">Website</label>
                        <div class="col-sm-8">
                            <input type="website" class="form-control" id="inputwebsite" placeholder="Website"
                                name="website" value="{{ old('website') ?? $ProfilPerusahaan->website }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-3 col-form-label" style="margin-left: 20px">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="inputemail" placeholder="Email" name="email"
                                value="{{ old('email') ?? $ProfilPerusahaan->email }}">
                        </div>
                    </div>

                    <div style="margin-left:880px">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        <a href="/profilperusahaan" class="btn btn-danger" type="button">Batal</a>
                    </div>

                </form>
            </div>

        </section>
    @endsection
