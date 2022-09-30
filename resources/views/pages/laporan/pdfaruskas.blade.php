@extends('layouts.master')

@section('title', 'Pdf Laporan Perubahan Arus Kas')
@section('content')
    <section class="section">



        <div class="section-header justify-content-center">


            <div class="text-left">


                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />


                <div class="text-center"style="margin-top:10px">
                    <strong><h4>LAPORAN PERUBAHAN ARUS KAS</h4></strong>
                    <h5>Per {{date('d-M-Y') }}</h5>
                </div>


                <div class="section-header justify-content-center" style="margin-top:100px">
                    <div class="text-center">

                        <div class="text-left" style="margin-top:90px">
                            <div>
                                <div>
                                    <div class="text-left">
                                        <strong>
                                            <h5 style="text-indent: 66px;margin-bottom:20px">Arus Kas Dari Aktivitas Operasi
                                            </h5>
                                        </strong>
                                    </div>
                                </div>




                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <strong>
                                            <h6>
                                                <p>Penerimaan Kas</p>
                                            </h6>
                                        </strong>

                                        <table class="table table-bordered">
                                            @foreach ($jumums['kas_masuk']['single'] as $item)
                                                <tr>

                                                    <td>
                                                        {{ $item['akun'] }}
                                                    </td>
                                                    <td>
                                                        {{ formatRp($item['total']) }}
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Penerimaan Kas Dari Aktivitas
                                                        Operasi</strong></td>
                                                <td style="text-indent: 50px;"></td>
                                                <td>{{ formatRp($jumums['kas_masuk']['multi']['total']) }}</td>
                                            </tr>
                                        </table>


                                    </div>

                                    <div class="card" style="width: 52rem; margin-left:50px">
                                        <strong>
                                            <h6>
                                                <p>Pengeluaran Kas</p>
                                            </h6>
                                        </strong>
                                        <table class="table table-bordered">
                                            @foreach ($jumums['kas_keluar']['single'] as $item)
                                                <tr>

                                                    <td>
                                                        {{ $item['akun'] }}
                                                    </td>
                                                    <td>
                                                        ({{ formatRp($item['total']) }})
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Pengeluaran Kas Dari Aktivitas
                                                        Operasi</strong></td>
                                                <td style="text-indent: 50px;"></td>
                                                <td>({{ formatRp($jumums['kas_keluar']['multi']['total']) }})</td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Kas Bersih Dari Aktivitas
                                                        Operasi</strong></td>

                                                <td>
                                                    @php
                                                        $totalkasbersih = $jumums['kas_masuk']['multi']['total'] - $jumums['kas_keluar']['multi']['total'];
                                                    @endphp

                                                    {{ kurung($totalkasbersih, formatRp($totalkasbersih)) }}

                                                </td>
                                            </tr>
                                        </table>


                                    </div>

                                </div>


                                <div>

                                    <div class="text-left">
                                        <strong>
                                            <h5 style="text-indent: 66px;margin-bottom:20px">Arus Kas Dari Aktivitas Investasi
                                            </h5>
                                        </strong>
                                    </div>
                                </div>



                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <table class="table table-bordered">
                                            @foreach ($jumums['investasi']['single'] as $item)
                                                <tr>

                                                    <td>
                                                        {{ $item['akun'] }}
                                                    </td>
                                                    <td>
                                                        ({{ formatRp($item['total']) }})
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Kas Bersih Dari Aktifitas
                                                        Investasi</strong></td>
                                                <td style="text-indent: 50px;"></td>
                                                <td> ({{ formatRp($jumums['investasi']['multi']['total']) }})</td>
                                            </tr>
                                        </table>


                                    </div>
                                </div>

                                <div class="text-left">
                                    <strong>
                                        <h5 style="text-indent: 66px;margin-bottom:20px">Arus Kas Dari Aktivitas Pendanaan</h5>
                                    </strong>
                                </div>


                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <table class="table table-bordered">
                                            @foreach ($jumums['pendanaan']['single'] as $item)
                                                <tr>

                                                    <td>
                                                        {{ $item['akun'] }}
                                                    </td>
                                                    <td>
                                                        {{ formatRp($item['total']) }}
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Kas Bersih Aktivitas Pendanaan</strong>
                                                </td>
                                                <td style="text-indent: 50px;"></td>
                                                <td>
                                                    @php
                                                        $totalkasbersihap = $jumums['pendanaan']['multi']['total'] * -1;
                                                    @endphp

                                                    {{ kurung($totalkasbersihap, formatRp($totalkasbersihap)) }}


                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td style="text-indent: 50px;"><strong>Total Perubahan Arus Kas</strong></td>

                                                <td>

                                                    @php
                                                        $totalaruskas = $jumums['kas_masuk']['multi']['total'] - $jumums['kas_keluar']['multi']['total'] - $jumums['investasi']['multi']['total'] + $jumums['pendanaan']['multi']['total'] * -1;
                                                    @endphp

                                                    {{ kurung($totalaruskas, formatRp($totalaruskas)) }}


                                                </td>
                                            </tr>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <script type="text/javascript">
                    window.print();
                </script>



            </div>







    </section>
@endsection
