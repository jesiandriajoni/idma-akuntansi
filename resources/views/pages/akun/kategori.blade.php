@extends('layouts.master')

@section('title', 'Kategori Akun')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Kategori Akun</h1>
    </div>
    <div style="margin-bottom: 10px">
        <a href="/kategoriakun/create" button type="button" class="btn btn-success">Tambah</a>
    </div>

    <table class="table text-center table-bordered ">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th colspan="2">Aksi</th>

            </tr>
        </thead>
        <tbody class="text-center">
            {{-- $level merupakan nama variabel yang dipanggil dari LevelController --}}
            @forelse ($kategoriakuns as $item)
            <tr>
                <td>
                    {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                   {{$item['nama']}}
                </td>
                <td>
                    <a href="/kategoriakun/{{$item->id}}/edit" class="btn btn-primary">Edit</a>

                    <td>
                    <form action="/kategoriakun/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                       onclick="return confirm('Are you sure delete this
                       data?')">Hapus</button>
                        </form>
                    </td>
                </td>
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
                {{ $kategoriakuns->links() }}
            </div>


</section>

@endsection
