@extends('layouts.master')

@section('title', 'Detail Laporan Perubahan Modal')
@section('content')
    <section class="section">



        <div class="section-header justify-content-center">


            <div class="text-left">

                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />
                <br>
                <table class="table table-bordered" style="margin-top:50px">
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
                <script type="text/javascript">
                    window.print();
                </script>


    </section>

@endsection
