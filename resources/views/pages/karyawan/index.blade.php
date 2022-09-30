@extends('layouts.master')

@section('title', 'Karyawan')
@section('content')
    <section class="section">


        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT.Inovindo Digital Media</h5>
                <h5>Perangkat Inovindo</h5>

            </div>
        </div>
<br>
<br>

        <table class="table table-bordered" style="margin-left: -10px">
            <thead text="center" class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Direktur</th>
                    <th scope="col">Accounting</th>

                    <th colspan="1" width="95px">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse ($Karyawans as $item)
                    <tr>
                        {{-- cara memanggil data di database pemanggilan sesuaikan dengan nama kolom di database --}}
                        <td>
                            {{ $item['id'] }}
                        </td>
                        <td>
                            {{ $item['direktur'] }}
                        </td>

                        <td>
                            {{ $item['accounting'] }}
                        </td>

                        <div class="row">
                        <td>
                            <a href="/karyawan/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit" style="color:rgb(13, 0, 255)"></i></a>



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
        <div class="card-body">
            {{ $Karyawans->links() }}
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
