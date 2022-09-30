@extends('layouts.master')
@section('title', 'PDF Bukti Transaksi Masuk')
@section('content')
    <section class="section">
        <div class="section-header justify-content-center">


            <div class="text-left">

                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />


                <div>
                    <center>
                        <br><strong>BUKTI TRANSAKSI MASUK </strong>

                        <br> BT. No : {{ $butransmasuks->notr }}
                        <br> Tanggal : {{ $butransmasuks->tanggal }}
                    </center>
                </div>
                <br>


                <table class="table">

                    <thead>
                        <tr>
                            <th colspan="6l">Diterima Dari : {{ $butransmasuks->diterima }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jumlah Terima : {{ $butransmasuks->terbilang }}</td>
                        </tr>
                        <tr>
                            <td>Keterangan : {{ $butransmasuks->ket }}</td>
                        </tr>
                        <th scope="row">
                            <table style="float:right" border="1">

                                <tr>

                                    <td>Rp {{ number_format($butransmasuks['nominal']) }}</td>
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

                    <p style="text-indent: 220px; ">{{ $butransmasuks->nama_direktur }}</p>
                    <p style="text-indent: 300px">{{ $butransmasuks->nama_karyawan }}</p>


                </div>
            </div>

            <script type="text/javascript">
                window.print();
            </script>
    </section>
@endsection
