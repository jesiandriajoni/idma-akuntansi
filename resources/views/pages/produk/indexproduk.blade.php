@extends('layouts.master')

@section('title', 'Produk')
@section('content')


    <section class="section">
        <div class="section-header">
            <h1>PRODUK</h1>
        </div>

        <div>
            <a href="/produk/create" button type="button" class="btn btn-success">Tambah</a>
            <div class=" text-right plus float-right">
                <form action="" method="GET">
                    <div>
                        <input type="search" name="search" class="form-control" placeholder="Cari">
                    </div>
                </form>
            </div>
        </div>


        <table class="table text-center table-bordered " style="margin-top: 20px">
            <thead>

                <tr>
                    <th rowspan="2" width="100px">Kode Produk</th>
                    <th rowspan="2" width="300px">Nama Produk</th>
                    <th rowspan="2" width="200px">Harga</th>
                    {{-- <th rowspan="2" width="200px">Keterangan</th> --}}

                    <th rowspan="2" width="300px">Gambar Produk</th>
                    <th colspan="3">Aksi</th>
                </tr>

            </thead>
            <tbody class="text-center">


                @forelse ($Produk as $item)
                    <tr>
                        {{-- cara memanggil data di database pemanggilan sesuaikan dengan nama kolom di database --}}
                        <td>
                            {{ $item['kode_jasa'] }}
                        </td>
                        <td>
                            {{ $item['nama_jasa'] }}
                        </td>
                        <td>
                            {{ formatRp($item['harga']) }}
                        </td>
                        {{-- <td>
                            {{ $item['keterangan'] }}
                        </td> --}}


                        <td class="px-2 py-2 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $item->gambar_jasa) }}" style="width: 150px; height:70px">
                        </td>

                        <td>
                            <a href="/produk/{{ $item->id }}/edit" class="btn btn-info" title="Edit Data">
                                <i class="fas fa-edit" style="color:rgb(13, 0, 255)"></i></a>
                        </td>

                        <td>
                            <form action="/produk/{{ $item->id }}/hapus" method="POST"></a>
                                @csrf
                                @method('DELETE')
                                <button title="Hapus Data" class="btn btn-danger"
                                    onclick="return confirm('Are you sure delete this data?')">
                                    <i class="fas fa-trash-alt" style="color:rgb(255, 255, 255)"></i></button>
                            </form>
                        </td>
                        <td>
                            <a id="dtl" data-toggle="modal" data-target="#contohModal" class="btn btn-warning"
                                data-kode=" {{ $item['kode_jasa'] }}" data-nama=" {{ $item['nama_jasa'] }}"
                                data-harga=" {{ formatRp($item['harga']) }}"
                                data-keterangan=" {{ $item['keterangan'] }}"
                                data-gambar=" {{ asset('storage/' . $item->gambar_jasa) }}">
                                <i class="fas fa-eye" style="color:#ffa500)"></i>
                            </a>


                        </td>

                        {{-- cara memanggil data di database --}}

                    </tr>
                @empty
                @endforelse



            </tbody>
        </table>
        <div class="card-body">
            {{-- ini membuat tampilan pagination --}}
            {{ $Produk->links() }}
        </div>

    </section>

    {{-- popup detail data produk --}}

    <div class="modal hide fade modal-admin" id="contohModal" role="dialog" arialabelledby="modalLabel" area-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="width:1000px">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4>Detail Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body table-responsive ">
                    <table class="table table-bordered table-hover" style="width: 100%">
                        <tbody>

                            <tr>
                                <th rowspan="4" class="px-2 py-2 whitespace-nowrap" style="margin-left:1000px">

                                    <img id="gambar_jasa" width="320px">




                                </th>
                                <th style="width: 10%">Kode Jasa</th>
                                <th><span id="kode_jasa"></span></th>
                            </tr>
                            <tr>
                                <th>Nama Jasa</th>
                                <td> <span id="nama_jasa"></span> </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td> <span id="harga"></span> </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><span id="keterangan"> </span> </td>
                            </tr>



                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#dtl', function() {
                var kode = $(this).data('kode');
                var nama = $(this).data('nama');
                var harga = $(this).data('harga');
                var keterangan = $(this).data('keterangan');
                var gambar = $(this).data('gambar');

                $('#kode_jasa').text(kode);
                $('#nama_jasa').text(nama);
                $('#harga').text(harga);
                $('#keterangan').text(keterangan);
                $('#gambar_jasa').attr('src', gambar);


            })

        })
    </script>
@endpush
