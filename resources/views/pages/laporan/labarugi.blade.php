@extends('layouts.master')
@section('title', 'Laporan Laba Rugi')
@section('content')


    <section class="section">
        <div>
            <div class="section-header justify-content-center">
                <div class="text-center">
                    <h5>PT. Inovindo Digital Media</h5>
                    <h5><strong>Laporan Laba Rugi </strong></h5>
                    <h5>Per {{ date('d-M-Y') }}</h5>
                </div>
            </div>
            <div class=" text-right plus float-right" style="margin-bottom:10px">
                <a href="/laporanlabarugi/cetak" target="_blank" class=" text-right plus float-right btn btn-sm btn-warning">
                    Cetak</a>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pendapatan</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jumums['pendapatan']['single'] as $item)
                    <tr>

                        <td> {{ $item['akun'] }}</td>
                        <td> {{ formatRp($item['total']) }}</td>
                        <td></td>
                    </tr>
                @endforeach

                <tr>
                    <td style="text-indent: 50px;"> Total Pendapatan</td>
                    <td></td>
                    <td style="text-indent: -10px;">{{ formatRp($jumums['pendapatan']['multi']['total']) }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col">Beban</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jumums['beban']['single'] as $item)
                    <tr>

                        <td> {{ $item['akun'] }}</td>
                        <td>({{ formatRp($item['total']) }})</td>
                        <td> </td>
                    </tr>
                @endforeach
                <tr>
                    <td style="text-indent: 50px;"> Total Beban</td>
                    <td></td>
                    <td>
                       ( {{ formatRp($jumums['beban']['multi']['total']) }})
                    </td>
                </tr>

                <thead>
                    <tr>
                        <th scope="col">Laba (Rugi)</th>
                        <th scope="col"></th>
                        <th scope="col">

                            @php
                                $totalpendapatan = $jumums['pendapatan']['multi']['total'] - $jumums['beban']['multi']['total'];
                            @endphp

                            {{ kurung($totalpendapatan, formatRp($totalpendapatan)) }}
                        </th>
                    </tr>
                </thead>
            </tbody>
        </table>


    </section>

@endsection
