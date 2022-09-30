@extends('layouts.master')

@section('title', 'Pdf Laporan Perubahan Arus Kas')
@section('content')
    <section class="section">



        <div class="section-header justify-content-center">


            <div class="text-left">

                <x-kop-surat :logo="$profilperusahaan->logo" :perusahaan="$profilperusahaan->nama_per" :alamat="$profilperusahaan->alamat" :kontak="$profilperusahaan->telp" :website="$profilperusahaan->website" />


                <div class="text-center" style="margin-top:100px">
                    <strong>
                        <h4>Laporan Arus Kas</h4>
                    </strong>
                    <h6>Per 31 Maret 2022</h6>

                    <div class="section-header justify-content-center" style="margin-top:96px;margin-left:60px">

                        <div class="text-left">
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

                                        <table>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                        </table>


                                    </div>

                                    <div class="card" style="width: 52rem; margin-left:50px">
                                        <strong>
                                            <h6>
                                                <p>Pengeluaran Kas</p>
                                            </h6>
                                        </strong>
                                        <table>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                        </table>


                                    </div>

                                </div>


                                <table>
                                    <tr>
                                        <td style="text-indent: 90px;"><strong>Kas Bersih Dari Aktivitas Operasi</strong>
                                        </td>
                                        <td style="text-indent: 300px;">Rp10.000.000</td>
                                        <td style="text-indent: 140px;">-</td>
                                    </tr>
                                </table>



                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <table>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>


                                <div>

                                    <div class="text-left">
                                        <strong>
                                            <h5 style="text-indent: 66px;margin-bottom:20px">Arus Kas Dari Aktivitas
                                                Investasi</h5>
                                        </strong>
                                    </div>
                                </div>



                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <table>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>

                                <div class="text-left">
                                    <strong>
                                        <h5 style="text-indent: 66px;margin-bottom:20px">Arus Kas Dari Aktivitas Pendanaan
                                        </h5>
                                    </strong>
                                </div>


                                <div class="container">

                                    <div class="card" style="width: 52rem; margin-left:50px">

                                        <table>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                            <tr>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                                <td style="text-indent: 50px;">-</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>

                                <table>
                                    <tr>
                                        <td style="text-indent: 100px;"><strong>Kas Bersih Dari Aktivitas Operasi</strong>
                                        </td>
                                        <td style="text-indent: 200px;">Rp10.000.000</td>
                                        <td style="text-indent: 200px;">-</td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td style="text-indent: 100px;"><strong>Kas 01 Maret 2022</strong></td>
                                        <td style="text-indent: 293px;">Rp10.000.000</td>
                                        <td style="text-indent: 200px;">-</td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td style="text-indent: 100px;"><strong>Kas 31 Maret 2022</strong></td>
                                        <td style="text-indent: 293px;">Rp10.000.000</td>
                                        <td style="text-indent: 200px;">-</td>
                                    </tr>
                                </table>



                            </div>
                        </div>



                    </div>

                </div>

            </div>







    </section>
@endsection
