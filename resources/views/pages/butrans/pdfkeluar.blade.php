@extends('layouts.master')
@section('title','PDF Bukti Transaksi Keluar')
@section('content')
<section class="section">
    <div class="section-header justify-content-center">


        <div class="text-left">

              <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />

            <div>
        <center>
            <br><strong>BUKTI TRANSAKSI KELUAR </strong>

            <br> BT. No : {{ $butranskeluars->notr }}
            <br> Tanggal : {{ $butranskeluars->tanggal }}
        </center>

    </div>


    <table class="table">

        <thead>
            <tr>
                <th colspan="6l">Dibayarkan Kepada : {{ $butranskeluars->dibayar }} </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jumlah Bayar : {{ $butranskeluars->terbilang }}</td>
            </tr>
            <tr>
                <td>Keterangan : {{ $butranskeluars->ket }}</td>
            </tr>
            <th scope="row">
                <table style="float:right" border="1">

                    <tr>
                        <td>Rp {{number_format( $butranskeluars['nominal']) }}</td>
                    </tr>

                </table>
            </th>
        </tbody>

    </table>
    <div class="row" style="margin-top:60px">
        <p style="text-indent: 260px; ">Direktur,</p>

        <p style="text-indent: 360px">Accounting,</p>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <p style="text-indent: 220px; ">{{ $butranskeluars->nama_direktur }}</p>
        <p style="text-indent: 300px">{{ $butranskeluars->nama_karyawan }}</p>
    </div>

    <script type="text/javascript">
        window.print();

    </script>
</section>
@endsection
