@extends('layouts.master')
@section('title', 'Laporan Laba Rugi')
@section('content')


    <section class="section">
        <div class="section-header justify-content-center">


            <div class="text-left">

                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />

                <div class="text-center" style="margin-top:100px">
                    <strong>
                        <h4>LAPORAN LABA RUGI</h4>
                    </strong>
                    <h5>Per {{ date('d-M-Y') }}</h5>
                </div>


                <br></br>
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
                                <td>{{ formatRp($item['total']) }}</td>
                                <td> </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td style="text-indent: 50px;"> Total Pendapatan</td>
                            <td></td>
                            <td>{{ formatRp($jumums['pendapatan']['multi']['total']) }}</td>
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
                <script type="text/javascript">
                    window.print();
                </script>



    </section>

@endsection
