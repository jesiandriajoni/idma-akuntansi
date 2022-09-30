@extends('layouts.master')

@section('title', 'Laporan Neraca')
@section('content')


    <section class="section">
        <div>
            <div class="section-header justify-content-center">
                <div class="text-center">
                    <h5>PT. Inovindo Digital Media</h5>
                    <h5>Laporan Neraca</h5>
                    <h5>Per {{date('d-M-Y') }}</h5>
                </div>
            </div>
            <div class="row; text-right plus float-right">
                <a href="/laporan/cetak" target="_blank" class=" text-right plus float-right btn btn-sm btn-warning"> Cetak</a>
            </div>

            <div class="row">

                <p style="margin-left:10px; margin-top:50px"><b>Aset</b></p>
                <p style="margin-left:650px; margin-top:50px"><b>Kewajiban & Modal</b></p>

            </div>

        </div>
        <table class="table table-bordered" style="table-layout: fixed">
            <thead>
                <tr>
                    <th colspan="3">Aset </th>
                    <th colspan="3">Kewajiban </th>
                </tr>

            </thead>
            <tbody>


                <tr>
                    <th colspan="3">Aktiva Lancar</th>
                    <th colspan="3">Kewajiban Lancar</th>
                </tr>
                @php
                    $jumlancar = count($jumums['asetlancar']['single']);
                    $jumwajib = count($jumums['wajiblancar']['single']);
                    $pembataslancarwajib = $jumwajib;
                    if ($jumlancar >= $jumwajib) {
                        $pembataslancarwajib = $jumlancar;
                    }

                @endphp
                <tr>
                    <td colspan="3" style="padding:0; border:0">
                        <table style="width:100%;table-layout: fixed">

                            @php
                                $ini_coba = [];
                                foreach ($jumums['asetlancar']['single'] as $test) {
                                    $ini_coba[] = $test;
                                }
                            @endphp

                            @for ($i = 0; $i < $pembataslancarwajib; $i++)
                                <tr>
                                    <td>
                                        {{ isset($ini_coba[$i]) ? $ini_coba[$i]['akun'] : '' }}
                                    </td>
                                    <td>
                                        {{ isset($ini_coba[$i]) ? formatRp($ini_coba[$i]['total']) : '' }}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endfor
                        </table>

                    </td>
                    <td colspan="3" style="padding:0; border:0">
                        <table style="width:100%; height:100%;table-layout: fixed">

                            @php
                                $ini_coba_2 = [];
                                foreach ($jumums['wajiblancar']['single'] as $test) {
                                    $ini_coba_2[] = $test;
                                }
                            @endphp

                            @for ($i = 0; $i < $pembataslancarwajib; $i++)
                                <tr>
                                    <td style="border-left: 0">
                                        {{ isset($ini_coba_2[$i]) ? $ini_coba_2[$i]['akun'] : '' }}
                                    </td>
                                    <td>
                                        {{ isset($ini_coba_2[$i]) ? formatRp($ini_coba_2[$i]['total'] * -1): '' }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </td>

                </tr>
                <tr>
                    <th colspan="1"></th>
                    <td style="border-top:0"></td>
                    <td></td>
                    <th colspan="3">Kewajiban Jangka Panjang</th>
                </tr>
                {{-- @php
                $jum = count($jumums['asetlancar']['single']);
                $jumwajib= count($jumums['wajiblancar']['single']);
                $pembataslancarwajib = $jumwajib;
                if($jumlancar >= $jumwajib){
                    $pembataslancarwajib = $jumlancar;
                }

            @endphp --}}

                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        Utang Bank
                    </td>
                    <td></td>
                    <td>
                        {{ formatRp($jumums['wajibpanjang']['total']) }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">Jumlah Aktiva Lancar</th>
                    <td></td>
                    <td>{{ formatRp($jumums['asetlancar']['multi']['total']) }}</td>
                    <th scope="row">Jumlah Kewajiban</th>
                    <td></td>
                    <td>

                              {{ formatRp($jumums['wajibpanjang']['total'] +  $jumums['wajiblancar']['multi']['total'] * -1)}}

                    </td>
                </tr>
                <tr>
                    <th colspan="3">Aktiva Tetap</th>
                    <th colspan="3">Modal</th>
                </tr>
                @php
                    $jumtetap = count($jumums['asettetap']['single']);
                    $jummodal = count($jumums['wajiblancar']['single']);
                    $pembataslancarwajib = $jumwajib;
                    if ($jumtetap >= $jumwajib) {
                        $pembataslancarwajib = $jumtetap;
                    }

                @endphp
                <tr>
                    <td colspan="3" style="padding:0; border:0">
                        <table style="width:100%; table-layout: fixed">

                            @php
                                $ini_coba = [];
                                foreach ($jumums['asettetap']['single'] as $test) {
                                    $ini_coba[] = $test;
                                }
                            @endphp

                            @for ($i = 0; $i < $pembataslancarwajib; $i++)
                                <tr>
                                    <td>
                                        {{ isset($ini_coba[$i]) ? $ini_coba[$i]['akun'] : '' }}
                                    </td>
                                    <td>
                                        {{ isset($ini_coba[$i]) ? formatRp($ini_coba[$i]['total'] ): '' }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endfor
                        </table>

                    </td>
                    <td colspan="3" style="padding:0; border:0">
                        <table style="width:100%; height:100%; table-layout: fixed" >

                            @php
                                $ini_coba_2 = [];
                                foreach ($jumums['wajiblancar']['single'] as $test) {
                                    $ini_coba_2[] = $test;
                                }
                            @endphp

                            @for ($i = 0; $i < $pembataslancarwajib; $i++)
                                <tr>
                                    @if ($i == 0)
                                        <td>Modal Akhir</td>
                                        <td>
                                            {{ formatRp($jumums['modal']['total']+ $jumums['pendapatan']['multi']['total'] -$jumums['beban']['multi']['total'] -$jumums['prive']['total'] )}}
                                        </td>
                                        <td>
                                        </td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif

                                </tr>
                            @endfor
                        </table>
                    </td>

                </tr>
                {{-- <tr>
                    @foreach ($jumums['asettetap']['single'] as $item)
                <tr>

                    <td>
                        {{ $item['akun'] }}
                    </td>
                    <td>
                        {{ $item['total'] }}
                    </td>
                </tr>
                @endforeach
                <td>modal</td>
                <td>{{ $jumums['modal']['total'] + $jumums['pendapatan']['multi']['total'] - $jumums['beban']['multi']['total'] - $jumums['prive']['total'] }}
                </td>
                </tr> --}}

                {{-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> --}}
                <tr>
                    <th scope="row">Jumlah Aktiva Tetap</th>
                    <td></td>
                    <td>{{ formatRp($jumums['asettetap']['multi']['total']) }}</td>
                    <th scope="row">Jumlah Modal</th>
                    <td></td>
                    <td>   {{ formatRp($jumums['modal']['total']+ $jumums['pendapatan']['multi']['total'] -$jumums['beban']['multi']['total'] -$jumums['prive']['total']) }}</td>
                </tr>
                <tr>
                    <th colspan="3"></th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th scope="row">Jumlah Aset</th>
                    <td></td>
                    <td>{{ formatRp($jumums['asetlancar']['multi']['total'] + $jumums['asettetap']['multi']['total'])}}</td>
                    <th scope="row">Jumlah Kewajiban dan Modal</th>
                    <td></td>
                    <td>{{ formatRp($jumums['modal']['total']+ $jumums['pendapatan']['multi']['total'] -$jumums['beban']['multi']['total'] -$jumums['prive']['total'] + $jumums['wajibpanjang']['total'] +  $jumums['wajiblancar']['multi']['total'] * -1) }}
                  </td>
                </tr>

            </tbody>
        </table>


    </section>

@endsection
