@extends('layouts.master')

@section('title', 'Laporan Perubahan Modal')
@section('content')


    <section class="section">
        <div>
            <div class="section-header justify-content-center">
                <div class="text-center">
                    <h5>PT. Inovindo Digital Media</h5>
                    <h5>Laporan Perubahan Modal </h5>
                    <h5>Per {{ date('d-M-Y') }}</h5>
                </div>
            </div>
            <div class="row; text-right plus float-right" style="margin-bottom: 10px">
                <a href="/laporanpermo/cetak" target="_blank" class=" text-right plus float-right btn btn-sm btn-warning">
                    Cetak</a>
            </div>

        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="3" width="200px" class="text-center">
                        <h4>Laporan Perubahan Modal</h4>
                    </th>

                </tr>

            </thead>
            <tbody>


                <tr>

                    <th colspan="1" width="350px">Modal Awal</th>
                    <td>

                    </td>
                    <td>
                        {{ formatRp($jumums['modal']['total']) }}
                    </td>

                </tr>



                <tr>
                    <th colspan="1" width="350px">Laba (Rugi)</th>

                    <td></td>
                    <td>
                        @php
                            $totallaba = $jumums['pendapatan']['multi']['total'] - $jumums['beban']['multi']['total'];
                        @endphp

                        {{ kurung($totallaba, formatRp($totallaba)) }}


                    </td>

                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ formatRp($jumums['modal']['total'] + $jumums['pendapatan']['multi']['total'] - $jumums['beban']['multi']['total']) }}
                    </td>

                </tr>



                <tr>

                    <th colspan="1" width="350px">Prive</th>
                    <td>

                        ({{ formatRp($jumums['prive']['total']) }})

                    </td>
                    <td>
                    </td>

                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>({{ formatRp($jumums['prive']['total']) }})</td>

                </tr>

                <tr>
                    <th colspan="1" width="350px">Modal Akhir</th>
                    <td></td>
                    <td>
                        @php
                            $totalmodal = $jumums['modal']['total'] + $jumums['pendapatan']['multi']['total'] - $jumums['beban']['multi']['total'] - $jumums['prive']['total'];
                        @endphp

                        {{ kurung($totalmodal, formatRp($totalmodal)) }}

                    </td>

                </tr>

            </tbody>
        </table>


    </section>

@endsection
