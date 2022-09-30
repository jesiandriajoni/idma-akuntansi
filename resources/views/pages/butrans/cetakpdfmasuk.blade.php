@extends('layouts.master')
@section('title', 'PDF Bukti Transaksi Masuk')
@section('content')
    <section class="section">
        <div class="section-header justify-content-center">


            <div class="text-left">

                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />


                <div style="margin-top: 30px">
                    <center>
                        <h4> Laporan Bukti Transaksi Masuk </h4>
                    </center>
                </div>


                <table class="table table-bordered" style="margin-top:20px">
                    <thead text="center" class="thead-light">
                        <tr>
                            <th scope="col"> <center>Tanggal</center> </th>
                            <th scope="col"> <center> No.Transaksi</center></th>
                            <th scope="col"> <center> Diterima </center></th>
                            <th scope="col"> <center></center> Total </center></th>
                            <th scope="col"><center>Terbilang</center></th>
                            <th scope="col"> <center> Keterangan </center></th>

                        </tr>
                    </thead>
                    <tbody>
            @forelse ($butransmasuks as $item)
            <tr>
                        {{-- cara memanggil data di database pemanggilan sesuaikan dengan nama kolom di database --}}
                        <td>
                            {{ $item['tanggal'] }}
                        </td>
                        <td>
                            {{ $item['notr'] }}
                        </td>
                        <td>
                            {{ $item['diterima'] }}
                        </td>

                        <td>
                            {{ formatRp($item['nominal']) }}
                        </td>
                        <td>
                            {{ $item['terbilang'] }}
                        </td>
                        <td>
                            {{ $item['ket'] }}
                        </td>
            </tr>
                    </tbody>


                    </div>



                        {{-- cara memanggil data di database --}}

        </tr>
                @empty
                    <tr>
                        <td colspan="99" align="center">Data belum ada.</td>
                    </tr> @endforelse
                        </table>
                        <script type="text/javascript">
                            window.print();
                        </script>
    </section>
@endsection
