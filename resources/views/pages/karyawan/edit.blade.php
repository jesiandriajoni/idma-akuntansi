@extends('layouts.master')
@section('title', ' Edit Karyawan ')
@section('content')
<section class="section">
    <div class="section-header justify-content-center" >
        <div class ="text-center">
        <h5>PT. Inovindo Digital Media</h5>

        </div>
    </div>
    <div class ="text-center">
        <div>
        <h6>Karyawan</h6>

        </div>
    </div>
            <div class="container">
                <form method="POST" action="/karyawan/update/{{ $Karyawans->id }}">
                    {{-- menmapilkan data di tabel --}}
                    @csrf
                    @method("PUT")
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Direktur:</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control"  name="direktur" value="{{ old('direktur') ?? $Karyawans->direktur}}">
                          </div>
                      </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Accounting :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="accounting" value="{{ old('accounting') ?? $Karyawans->accounting}}">
                        </div>
                      </div>





                    <div class="text-center">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        <a href="/karyawan" button class="btn btn-danger" type="reset">Batal</a>
                      </div>

                  </div>

                </form>

            </div>


</section>

@endsection


