@extends('layouts.master')

@section('title', 'Detail Bukti Transaksi Keluar')
@section('content')
    <section class="section">


        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT.Inovindo Digital Media</h5>
                <h5>Detail Bukti Transaksi Keluar</h5>

            </div>
        </div>


        <div>

            <a href="/transaksikeluar/create" type="button" class="btn btn-success" style="margin-top: 15px"> + Tambah
                Data</a>
            <a href="/transaksikeluar/cetaktrkeluar" class="btn btn-warning" target="_blank" style="margin-top:15px"><i
                    class="fas fa-print" style="color:#ffa500)"></i> </a>

            <form action="" method="GET">
                <div class=" text-right plus float-right">
                    <div class="form-group" style="margin-top: -45px">
                        <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Cari">
                    </div>
                </div>
            </form>
            <br></br>
        </div>




        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">No.Transaksi</th>
                    <th scope="col">Dibayar</th>
                    <th scope="col">Total</th>
                    <th scope="col">Terbilang</th>
                    <th scope="col">Keterangan</th>

                    <th colspan="3">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse ($butranskeluars as $item)
                    <tr>
                        {{-- cara memanggil data di database --}}
                        <td>
                            {{ $item['tanggal'] }}
                        </td>
                        <td>
                            {{ $item['notr'] }}
                        </td>
                        <td>
                            {{ $item['dibayar'] }}
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






                        <div class="row">
                            <td>
                                <a href="/transaksikeluar/{{ $item->id }}/edit" class="btn btn-info"><i
                                        class="fas fa-edit" style="color:rgb(13, 0, 255)"></i></a>

                            <td>
                                <form action="/transaksikeluar/{{ $item->id }}/hapus" method="POST"></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure delete this data?')">

                                        <i class="fas fa-trash-alt" style="color:rgb(255, 255, 255)"></i></button>
                                </form>
                            </td>
                            <td>

                                <a href="/transaksikeluar/{{ $item->id }}/cetak" target="_blank"
                                    class="btn btn-warning"><i class="fas fa-print" style="color:#ffa500)"></i></a>
                            </td>
                            </td>
                        </div>







                        {{-- cara memanggil data di database --}}

                    </tr>
                @empty
                    <tr>
                        <td colspan="99" align="center">Data belum ada.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="pull-left">
            {{ $butranskeluars->firstItem() }}
            to
            {{ $butranskeluars->lastItem() }}
            of
            {{ $butranskeluars->total() }}
            entires


        </div>
        <div class="card-body">
            {{ $butranskeluars->links() }}
        </div>


    </section>
@endsection
