@extends('layouts.master')

@section('title', 'Detail Jurnal Umum')
@section('content')
    <section class="section">

        <div>
            <div class="section-header">
                <h4> Laporan <br> Jurnal Umum</h1>
            </div>
            {{-- <label>Filter Data Jurnal Umum Berdasarkan Tanggal</label>
            <form action="/jurnalumum/search" method="GET">
                <input type="search" name="search" autocomplete="off" value="{{ request()->search }}">
                <button type="submit">Cari</button>

            </form> --}}
            <br>
            {{-- <div class="text-right plus float-right" style="margin-bottom: 30px">
                <a href="/jurnalumum/create" button type="button" class="btn btn-success">Tambah</a>

            </div> --}}
        </div>

        @php
            $tgl = '';
            $jum = 0;
            $jumdata = 1;
            $jumdebit = 0;
            $jumkredit = 0;
        @endphp

        @forelse ($jurnalumums as $item)
            <table class="table">
                <thead>
                    <tr>
                        <div class="row">
                            <th colspan="6" type="date" name="tanggal">Tanggal: {{ $item['tanggal'] }}
                                <br>{{ $item->keterangan }}
                                <div class="row" style="margin-left:870px;margin-top:-30px">
                                    <a href="/jurnalumum/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>

                                    <form action="/jurnalumum/{{ $item->id }}/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-indigo-600 hover:text-indigo-900 btn btn-danger"
                                            onclick="return confirm('Apakah yakin menghapus data?')">Hapus</button>
                                    </form>

                                </div>
                            </th>
                        </div>
                    </tr>
                    <tr>
                        <th scope="col">No.Akun</th>
                        <th scope="col">Nama Akun</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Referensi</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Kredit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->jurnalumum as $item2)
                        @php
                            $jumdebit += $item2['debit'];
                            $jumkredit += $item2['kredit'];
                            $jumdata++;
                        @endphp
                        <tr>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ $item2->Akun->no_akun }}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ $item2->Akun->akun }}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ $item2['deskripsi'] }}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ $item2['referensi'] }}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ formatRp($item2['debit']) }}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{ formatRp($item2['kredit']) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @empty
        @endforelse


        <div class="row">
            <div style="margin-left:500px">

                <b>Total Keseluruhan</b>
            </div>
            <div style="margin-left:32px">

                <span>{{ formatRp($jumdebit) }}</span>
            </div>
            <div style="margin-left:65px">

                <span>{{ formatRp($jumkredit) }}</span>
            </div>
        </div>
    </section>

@endsection
