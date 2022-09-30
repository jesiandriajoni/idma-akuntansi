@extends('layouts.master')
@section('title', ' Edit Transaksi Masuk')
@section('content')
    <section class="section">
        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT. Inovindo Digital Media</h5>

            </div>
        </div>
        <div class="text-center">
            <div>
                <h6>Transaksi Keluar</h6>

            </div>
        </div>
        @include('components.error')
        <div class="container">
            <form method="POST" action="/transaksikeluar/{{ $butranskeluars->id }}/update">
                {{-- menmapilkan data di tabel --}}
                @csrf
                @method("PUT")
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">TR NO :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" readonly name="notr"
                                value="{{ old('notr') ?? $butranskeluars->notr }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" name="tanggal"
                                value="{{ old('tanggal') ?? $butranskeluars->tanggal }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dibayarkan Oleh :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="dibayar"
                                value="{{ old('dibayar') ?? $butranskeluars->dibayar }}">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal :</label>
                        <div class="col-sm-12 col-md-7">
                            <input id="nominal" onkeyup="kataterbilang()" type="text" class="form-control" name="nominal"
                                autocomplete="off" value="{{ old('niminal') ?? $butranskeluars->nominal }}">
                            {{-- {{ convert_to_rupiah($item['nominal']) }} --}}
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Terbilang :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" id="terbilang" class="form-control" name="terbilang"
                                value="{{ old('terbilang') ?? $butranskeluars->terbilang }}">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="ket" value="">{{ old('ket') ?? $butranskeluars->ket }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Direktur :</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control"  readonly name="nama_direktur"
                                value="{{ old('nama_direktur') ?? $butranskeluars->nama_direktur }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Accounting:</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control"  readonly name="nama_karyawan"
                                value="{{ old('nama_karyawan') ?? $butranskeluars->nama_karyawan }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        <a href="/transaksikeluar" button class="btn btn-danger" type="reset">Batal</a>
                    </div>

                </div>

            </form>

        </div>


    </section>

@endsection
@push('script')
    <script>
        // untuk membuat angka di nominal ada titiknya
        $(document).ready(function() {

            $('#nominal').inputmask({
                alias: "numeric",
                prefix: "Rp. ",
                rightAlign: false,
                digits: 2,
                groupSeparator: ",",
                autoGroup: true,
                digitsOptional: false,
                removeMaskOnSubmit: true,
                autoUnmask: true,
            });
            isi()
        })
        // caea membuat bikin function pake ()
        function kataterbilang() {
            //let = pengenalan variabel
            let nominal = $('#nominal').inputmask('unmaskedvalue');
            $('#terbilang').val(terbilang(parseInt(nominal)).toLowerCase().replace("  ", " ") + " rupiah");
        }

        function terbilang(angka) {

            var bilne = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh",
                "Sebelas"
            ];

            if (angka < 12) {

                return bilne[angka];

            } else if (angka < 20) {

                return terbilang(angka - 10) + " Belas";

            } else if (angka < 100) {

                return terbilang(Math.floor(parseInt(angka) / 10)) + " Puluh " + terbilang(parseInt(angka) % 10);

            } else if (angka < 200) {

                return "seratus " + terbilang(parseInt(angka) - 100);

            } else if (angka < 1000) {

                return terbilang(Math.floor(parseInt(angka) / 100)) + " Ratus " + terbilang(parseInt(angka) % 100);

            } else if (angka < 2000) {

                return "seribu " + terbilang(parseInt(angka) - 1000);

            } else if (angka < 1000000) {

                return terbilang(Math.floor(parseInt(angka) / 1000)) + " Ribu " + terbilang(parseInt(angka) % 1000);

            } else if (angka < 1000000000) {

                return terbilang(Math.floor(parseInt(angka) / 1000000)) + " Juta " + terbilang(parseInt(angka) % 1000000);

            } else if (angka < 1000000000000) {

                return terbilang(Math.floor(parseInt(angka) / 1000000000)) + " Milyar " + terbilang(parseInt(angka) %
                    1000000000);

            } else if (angka < 1000000000000000) {

                return terbilang(Math.floor(parseInt(angka) / 1000000000000)) + " Trilyun " + terbilang(parseInt(angka) %
                    1000000000000);

            }

        }
    </script>
@endpush
