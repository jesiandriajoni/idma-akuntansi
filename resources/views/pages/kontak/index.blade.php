@extends('layouts.master')

@section('title', ' Detail Kontak')
@section('content')


    <section class="section">
        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT. Inovindo Digital Media</h5>
                <h5>Kontak</h5>
            </div>
        </div>



        <div class=" text-right plus float-right">
            <div class="form-group">
                <div style="margin-top: 20px;">


                    <a href="/kontak/create" button type="button" class="btn btn-success">Tambah</a>
                </div>
            </div>
        </div>

        <div class="card-body" style="font-size:16px">
            <table class="table text-center table-bordered" style="margin-left: -25px">

                <thead text="center" class="thead-light">

                    <tr>


                        <th scope="col" width="250px">Nama Customer</th>
                        <th scope="col" width="140px">Nama Perusahaan</th>
                        <th scope="col" width="100px">Alamat</th>
                        <th scope="col" width="150px">Email</th>
                        <th scope="col" width="100px">Telepon</th>
                        <th scope="col" width="170px">Harga</th>
                        <th scope="col" width="150px" colspan="2">Aksi</th>




                    </tr>

                </thead>
                <tbody class="text-center">

                    @forelse ($Kontaks as $item)
                        <tr>
                            {{-- cara memanggil data di database --}}
                            <td>{{ $item['nama_cus'] }}</td>
                            <td>{{ $item['nama_perusahan'] }}</td>
                            <td>{{ $item['alamat_cus'] }}</td>
                            <td>{{ $item['email_cus'] }}</td>
                            <td>{{ $item['telp_cus'] }}</td>
                            <td>{{ $item['harga'] }}</td>



                            {{-- cara memanggil data di database --}}


                            <td>
                                <a href="/kontak/edit/{{ $item->id }}" class="btn btn-info" title="Edit Data"><i class="fas fa-edit"
                                        style="color:rgb(13, 0, 255)"></i></a>

                            <td>

                                <form action="/kontak/{{ $item->id }}/hapus" method="POST"></a>
                                    @csrf
                                    @method('DELETE')
                                    <button title="Hapus Data" class="btn btn-danger"
                                        onclick="return confirm('Are you sure delete this data?')">
                                        <i class="fas fa-trash-alt" style="color:rgb(255, 255, 255)"></i></button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="99" align="center">Data belum ada.</td>
                        </tr>
                    @endforelse



                </tbody>
            </table>



    </section>

@endsection
