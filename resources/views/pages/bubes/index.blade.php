@extends('layouts.master')

@section('title', 'Buku Besar')
@section('content')



    <section class="section">
        <div class="section-header justify-content-center">
            <div class="text-center">
                <h5>PT. Inovindo Digital Media</h5>
                <h5>Buku Besar</h5>
            </div>
        </div>


        @forelse ($jumums as $key => $item)
            <table class="table text-center table-bordered ">
                <thead>
                    <br>
                    <label type="string" name="akun_id" style="font-size: 20px"> <b> {{ $item['no_akun'] }} --
                            {{ $item['nama_akun'] }} </b></label>

                    </br>
                    <tr>
                        <th rowspan="2" width="150px">Tanggal</th>
                        <th rowspan="2" width="150px">Deskripsi</th>
                        <th rowspan="2" width="20px">Referensi</th>
                        <th rowspan="2" width="170px">Debit</th>
                        <th rowspan="2" width=" 170px">Kredit</th>
                        <th colspan="2">Saldo</th>
                    </tr>

                    <tr>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>

                </thead>
                <tbody class="text-center">

                    @foreach ($item['data'] as $item2)
                        <tr>

                            {{-- $item merupakan isi data database yg disimpan dalam variabel item untuk ditampilkan di website --}}
                            <td> {{ $item2['tanggal'] }} </td>
                            <td> {{ $item2['deskripsi'] }} </td>
                            <td> {{ $item2['referensi'] }} </td>
                            <td> {{ $item2['debit'] != '' ? formatRp($item2['debit']) : '' }} </td>
                            <td> {{ $item2['kredit'] != '' ? formatRp($item2['kredit']) : '' }} </td>

                            <td>
                                {{-- untuk menampilkan debitkolom --}}
                                @php

                                    if ($item2['total_debit_akhir'] > 0) {
                                        echo formatRp($item2['total_debit_akhir']);
                                    }

                                @endphp
                            </td>
                            <td>
                                {{-- untuk menampilkan kreditkolom --}}
                                @php
                                    if ($item2['total_debit_akhir'] < 0) {
                                        echo formatRp($item2['total_debit_akhir'] * -1);
                                    }

                                @endphp
                            </td>

                        </tr>
                    @endforeach


                    <tr>
                        <td colspan="3"> Total </td>
                        <td>
                            @php

                                if ($item['total_debit'] > 0) {
                                    echo formatRp($item['total_debit']);
                                }

                            @endphp
                        </td>
                        <td>
                            @php

                                if ($item['total_kredit'] > 0) {
                                    echo formatRp($item['total_kredit']);
                                }

                            @endphp
                        </td>
                        <td>
                            @php

                                if ($item['total_debit_akhir'] > 0) {
                                    echo formatRp($item['total_debit_akhir']);
                                }

                            @endphp
                        </td>
                        <td>

                            @php

                                if ($item['total_debit_akhir'] < 0) {
                                    echo formatRp($item['total_debit_akhir'] * -1);
                                }

                            @endphp
                        </td>

                    </tr>
                </tbody>
            </table>

        @empty
            <tr>
                <td colspan="99" align="center">Data belum ada</td>
            </tr>
        @endforelse

    </section>

@endsection
