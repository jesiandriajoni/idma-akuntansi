@extends('layouts.master')
@section('title', 'Tampilan Jurnal Penyesuaian')
@section('content')

<section class="section">

<div>
    <div class="section-header">
        <h1> Jurnal Penyesuaian</h1>
    </div>

    <div class="section-header" button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Transaksi Bulan April
        "><strong> Tanggal Transaksi  <br> 01/04/2022 </strong>
        </button>
    </div>

    <div class=" text-right plus float-right" style="margin-bottom: 10px">
             <button type="button"  class="btn btn-success" >Edit</button>
            <button type="button"  class="btn btn-success">Detail</button>
    </div>
</div>


<table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">No.Akun</th>
                          <th scope="col">Akun</th>
                          <th scope="col">Deskripsi</th>
                          <th scope="col">Referensi</th>
                          <th scope="col">Debit</th>
                          <th scope="col">Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($jurnalpenyesuaians as $item)
                        <tr>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{$item->Akun->no_akun}}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                                {{$item->Akun->akun}}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                               {{$item['deskripsi']}}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                               {{$item['referensi']}}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                               {{$item['debit']}}
                            </td>
                            <td>
                                {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                               {{$item['kredit']}}
                            </td>


                        </tr>

                        @empty
                            <tr>
                                <td colspan="99" align="center">Data belum ada</td>
                            </tr>
                        @endforelse

                      </tbody>
                    </table>
                   <div class ="row">
                 <p style="margin-left:690px"> Total Debit</p>
                 <p style="margin-left:73px"> Total Kredit</p>
                </div>
        </section>

@endsection
