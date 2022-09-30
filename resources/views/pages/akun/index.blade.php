@extends('layouts.master')

@section('title', 'Daftar Akun')
@section('content')

<section class="section">
<div>
    <div class="section-header justify-content-center" >
        <div class ="text-center">
        <h6>PT. Inovindo Digital Media</h6>
        <h5>DAFTAR AKUN</h5>
        </div>
    </div>

<div>


    <div>
        {{-- <a href="/daftarakun/create" button type="button" class="btn btn-success">Tambah</a> --}}
        <i class="fas fa-search" style="margin-left: 700px; margin-top: 15px"></i>
        <form action="" method="GET">
            <div class=" text-right plus float-right">
                <div class="form-group" style="margin-top: -40px">
                    <input type="text" name="search" class="form-control" placeholder="Cari">
                </div>
            </div>
        </form>
    </div>


    <table class="table text-center table-bordered ">
        <thead>
            <tr>
                <th rowspan="2" width="100px">No. Akun</th>
                <th rowspan="2" width="300px">Akun</th>
                <th rowspan="2" width="200px">Nama Kategori</th>
                <th rowspan="2" width="200px">Deskripsi</th>
                {{-- <th colspan="2">Aksi</th> --}}
            </tr>

        </thead>
        <tbody class="text-center">
            @forelse ($akuns as $item)
            <tr>
                <td>
                    {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                   {{$item['no_akun']}}
                </td>
                <td>
                    {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                   {{$item['akun']}}
                </td>
                <td>
                    {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                   {{$item->kategoriakun->nama}}
                </td>
                <td>
                    {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                   {{$item['deskripsi']}}
                </td>
                {{-- <td>
                    <a href="/daftarakun/{{$item->id}}/edit" class="btn btn-primary">Edit</a>

                    <td>
                    <form action="/daftarakun/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                       onclick="return confirm('Are you sure delete this
                       data?')">Hapus</button>
                        </form>
                    </td>
                </td> --}}
            </tr>

            @empty
                <tr>
                    <td colspan="99" align="center">Data belum ada</td>
                </tr>
            @endforelse


        </tbody>
    </table>
    <div class="card-body">
        {{-- ini membuat tampilan pagination --}}
                {{ $akuns->links() }}
            </div>


</section>

@endsection
