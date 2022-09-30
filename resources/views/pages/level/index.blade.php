@extends('layouts.master')

@section('title', 'Produk')
@section('content')


<section class="section">
    <div class="section-header">
        <h1> LEVEL</h1>
    </div>

    <div >

        <button type="button" class="btn btn-success" >Tambah</button>
        <i class="fas fa-search" style="margin-left: 700px; margin-top: 15px"></i>
        <div class=" text-right plus float-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari">
            </div>
        </div>
    </div>


    <table class="table text-center table-bordered ">
        <thead>
            <tr>

                <th rowspan="2" width="300px">Nama</th>
                <th colspan="2">Aksi</th>
            {{--  cara membuat komentar. blok dulu saru baris ctrl + / --}}
            </tr>
        </thead>
        <tbody class="text-center">

            @forelse ($levels as $item )
            <tr>
                {{-- cara memanggil data di database --}}
                <td>{{ $item['nama'] }}</td>
                {{-- cara memanggil data di database --}}

                <td><a href="#" class="btn btn-primary">Edit</a></td>

                <td><a href="#" class="btn btn-danger">Hapus</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="99" align="center">Data belum ada.</td>
            </tr>

            @endforelse





        </tbody>
    </table>

    <div class="card-body">
        {{ $levels->links() }}
    </div>


</section>

@endsection
