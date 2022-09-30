@extends('layouts.master')

@section('title', 'Neraca Saldo Setelah Penyesuaian')
@section('content')

<section class="section">
<div>
    <div class="section-header justify-content-center" >
        <div class ="text-center">
        <h5>PT. Inovindo Digital Media</h5>
        <h5>Neraca Saldo Setelah Penyesuaian</h5>
        <h5>Per {{ date('d-M-Y') }}</h5>
        </div>
    </div>
    <div class="buttons">

        <a href="/nesasuai/pdf" target="_blank" class=" text-right plus float-right btn btn-sm btn-warning"> Cetak</a>

    </div>
</div>

                <table class="table table-bordered" >
                    <thead class="text-center">
                      <tr>
                        <th scope="col">No Akun</th>
                        <th scope="col">Nama Akun</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Kredit</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                    $jumdebit = 0;
                    $jumkredit = 0;

                @endphp
                        @forelse ($jurnalumums as $key => $item)
                        <tr>
                            <td> {{ $item['no_akun'] }} </td>
                            <td> {{ $item['nama_akun'] }} </td>
                            <td>
                                @php

                                    if ($item['total_debit_akhir'] > 0) {
                                        echo formatRp($item['total_debit_akhir']);
                                        $jumdebit += $item['total_debit_akhir'];
                                    }

                                @endphp
                            </td>
                            <td>

                                @php

                                    if ($item['total_debit_akhir'] < 0) {
                                        echo formatRp($item['total_debit_akhir'] * -1);
                                        $jumkredit += $item['total_debit_akhir'] * -1;
                                    }

                                @endphp
                            </td>
                        </tr>
                        @empty
                <tr>
                    <td colspan="99" align="center">Data belum ada</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="2">
                        Total
                    </td>
                    <td>
                        {{ formatRp($jumdebit) }}
                    </td>
                    <td>
                        {{ formatRp($jumkredit) }}
                    </td>
                </tr>
                      </tbody>
                    </table>




</section>

@endsection
