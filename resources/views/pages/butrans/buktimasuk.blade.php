@extends('layouts.master')
@section('title','Bukti Transaksi Masuk')
@section('content')
<section class="section">

    <div class="section-header justify-content-center">
        <div class="text-center">
            <h5>PT. Inovindo Digital Media</h5>
        </div>
    </div>

<div>
    <center>
    <br><strong>BUKTI TRANSAKSI MASUK </strong></br>

    <br> BT. No   : TM.001/VII/2021 </br>
    <br> Tanggal : 10 Maret 2022  </br> </center>

    <div class=" text-right plus float-right">
        <button type="button" class="btn btn-warning">Cetak</button>
    </div>
    </div>


<table class="table">

                      <thead>
                          <tr>
                            <th colspan="6l">Diterima Dari : Bapak Imran </th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jumlah Terima : Lima Ratus Ribu Rupiah</td>
                        </tr>
                        <tr>
                          <td>Keterangan     : Pembayaran Pelunasan Hutang</td>
                        </tr>
                        <th scope="row">
                          <table style="float:right" border="1">

                                <tr>
                                    <td>(Rp)500.000</td>
                                </tr>

                          </table>
                          </th>
                      </tbody>

                      </table>
                      <div class="row">
                        <p style="text-indent: 230px">Direktur,</p>
                        <p style="text-indent: 350px">Accounting,</p>

                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <p style="text-indent: 190px">( Novi Setia Nurviat )</p>
                        <p style="text-indent: 320px">( Alexa )</p>

                    </div>>
</section>
@endsection
