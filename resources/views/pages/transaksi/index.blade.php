@extends('layouts.master')

@section('title', 'Transaksi')
@section('content')
    <section class="section">


        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT.Inovindo Digital Media</h5>
                <h5>Transaksi</h5>

            </div>
        </div>
        <div>

            <a href="/transaksi/create" type="button" class="btn btn-success" style="margin-top: 15px"> + Tambah Data</a>

            <form action="" method="GET">
                <div class=" text-right plus float-right">
                    <div class="form-group" style="margin-top: -45px">
                        <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Cari">
                    </div>
                </div>
            </form>
            <br></br>
        </div>






        <table class="table table-bordered" style="margin-left: -10px">
            <thead text="center" class="thead-light">
                <tr>
                    <th scope="col">No.Transaksi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>

                    <th colspan="5" width="95px">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse ($Transaksis as $item)
                    <tr>
                        {{-- cara memanggil data di database pemanggilan sesuaikan dengan nama kolom di database --}}
                        <td>
                            {{ $item['no_transaksi'] }}
                        </td>
                        <td>
                            {{ $item['tanggal'] }}
                        </td>

                        <td>
                            {{ $item['keterangan'] }}
                        </td>


                        <div class="row">
                            <td>
                                <a href="/transaksi/edit/{{ $item->id }}" title="Edit" class="btn btn-info"><i
                                        class="fas fa-edit" style="color:rgb(13, 0, 255)"></i></a>

                            <td>
                                <form action="/transaksi/{{ $item->id }}/hapus" title="Hapus" method="POST"></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure delete this data?')">

                                        <i class="fas fa-trash-alt" style="color:rgb(255, 255, 255)"></i></button>
                                </form>
                            </td>

                            <td>
                                <a href="/jurnalumum/create?transaksi_id={{ $item->id }}" title="Tambah Jurnal Umum"
                                    class="btn btn-success"><i class="fas fa-newspaper" style="color:#ffa500)"></i> </a>

                            </td>
                            <td>

                                <a href="/jurnalpenyesuaian/create?transaksi_id={{ $item->id }}"
                                    title="Tambah Jurnal Penyesuaian" class="btn btn-success"><i class="fas fa-swatchbook"
                                        style="color:#ffa500)"></i></a>



                            </td>
                            <td>
                                <a href="/jurnalpenutup/create?transaksi_id={{ $item->id }}"
                                    title="Tambah Jurnal Penutup" class="btn btn-success"><i class="fas fa-book"
                                        style="color:#ffa500)"></i> </a>

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
            {{ $Transaksis->firstItem() }}
            to
            {{ $Transaksis->lastItem() }}
            of
            {{ $Transaksis->total() }}
            entires


        </div>
        <div class="pull-right">
            {{ $Transaksis->links() }}
        </div>
        {{-- <div class="pull-left">
            {{ $butransmasuks->firstItem() }}
            to
            {{ $butransmasuks->lastItem() }}
            of
            {{ $butransmasuks->total() }}
            entires


        </div>
        <div class="pull-right">
            {{ $butransmasuks->links() }}
        </div> --}}


    </section>
@endsection
