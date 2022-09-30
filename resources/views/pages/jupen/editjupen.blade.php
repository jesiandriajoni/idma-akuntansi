@extends('layouts.master')
@section('title', ' Edit Jurnal Penyesuaian')
@section('content')

    <section class="section">
        <form method="POST" action="/jurnalpenyesuaian/{{ $transaksi_id }}/update">
            {{-- menampilkan data di tabel --}}
            @csrf
            @method("POST")

            <div>
                <div class="section-header">
                    <h4> Transaksi <br> Jurnal Penyesuaian</h1>
                </div>



                <input type="hidden" name="tanggal2" value="{{ $jurnalpenyesuaians[0]->Transaksi->tanggal }}">

                <button onclick="tambah()" type="button" class="btn btn-success" style="margin-bottom: 10px">+ Tambah
                    Data</button>
                <div class=" text-right plus float-right" style="margin-bottom: 10px">
                    <a href="/jurnalpenyesuaian/" type="reset" class="btn btn-danger">Batal</a>
                    <button id="btnSubmit" type="submit" disabled class="btn btn-success">Edit Jurnal Penyesuaian</button>
                </div>

                <table class="table">
                    <thead>

                        <th scope="col" width="250px">Akun</th>
                        <th scope="col" width="140px">Deskripsi</th>
                        <th scope="col" width="100px">Referensi</th>
                        <th scope="col" width="170px">Debit</th>
                        <th scope="col" width="150px" colspan="2">Kredit</th>
                    </thead>
                    <tbody id="bungkus">
                        @foreach ($jurnalpenyesuaians as $jurnal)
                            <tr id="baris">
                                <td>
                                    <select class="form-control" name="no_akun[]">
                                        @forelse ($akuns as $item)
                                        @php
                                        $select= '';
                                         if ($item['id'] == $jurnal['akun_id']) {
                                             $select='selected';
                                         }
                                        @endphp
                                            <option value="{{ $item['id'] }}" {{ $select }} >{{ $item['no_akun'] }} --
                                                {{ $item['akun'] }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="id[]" value="{{ $jurnal->id ?? "" }}">

                                    <input type="text" class="form-control" name="deskripsi[]"
                                        value="{{ old('deskripsi') ?? $jurnal->deskripsi }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="referensi[]"
                                        value="{{ old('referensi') ?? $jurnal->referensi }}">
                                </td>
                                <td>
                                    <input type="text" class="debit form-control" name="debit[]"
                                        value="{{ old('debit') ?? $jurnal->debit }}">
                                </td>
                                <td>
                                    <input type="text" class="kredit form-control" name="kredit[]"
                                        value="{{ old('kredit') ?? $jurnal->kredit }}">
                                </td>
                                <td>
                                    <button type="button" class="hapus btn btn-icon btn-danger"><i
                                            class="fas fa-times"></i></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>

                </table>
            <div class="row">
                <div style="margin-left:425px">

                    <b>Total Debit</b>
                </div>

                <div style="margin-left:40px">

                    <span id="displayDebit">Rp. 0</span>
                </div>

            </div>

            <div class="row">

                <div style="margin-left:425px">
                    <b>Total Kredit</b>
                </div>


                <div style="margin-left:210px">
                    <span id="displayKredit">Rp. 0</span>
                </div>
        </form>
    </section>

@endsection

@push('script')
    <script>
        //maksud var yaitu berapa baris yang ingin kita tampilkan secara default
        //maksud $(this).parent().parent().remove(); yaitu kita mau menghapus berapa induk misalkan
        //cuman parent() pertama berarti cuman hapus button (td) kalau parent() kedua menghapus (tr)
        //'.hapus' jika menggunakan ini maka di button classnya ditambah hapus, namun '#hapus' maka
        //menambah id="hapus"
        var baris = 2;
        var jumlahDebit = 0;
        var jumlahKredit = 0;

        $(document).on('click', '.hapus', function() {
            if (baris > 2) {
                $(this).parent().parent().remove();
                baris--;
            }
        });

        $(document).on('change', '.debit', function() {
            totalDebit();
            checkGanda();
        });

        $(document).on('change', '.kredit', function() {
            totalKredit();
            checkGanda();
        });

        function tambah() {
            let inputTemp = $('#baris').clone();

            //menghapus isi input yang sudah ada
            inputTemp.find('input').val("").end();

            $('#bungkus').append(inputTemp);
            baris++;
            checkGanda();
        }

        function totalDebit() {
            let elementDebit = document.querySelectorAll(".debit");
            let jum = 0;
            elementDebit.forEach(element => {
                console.log(element.value);
                if (element.value != "") {
                    jum += parseInt(element.value);
                }
            });
            jumlahDebit = jum;
            $('#displayDebit').html(jum);
        }

        function totalKredit() {
            let elementKredit = document.querySelectorAll(".kredit");
            let jum = 0;
            elementKredit.forEach(element => {
                console.log(element.value);
                if (element.value != "") {
                    jum += parseInt(element.value);
                }
            });
            jumlahKredit = jum;
            $('#displayKredit').html(jum);
        }

        function checkGanda() {
            let baris = document.querySelectorAll("#baris");
            baris.forEach(element => {
                element.children[4].children[0].removeAttribute('readonly');
                element.children[3].children[0].removeAttribute('readonly');

                if (element.children[3].children[0].value != "") {
                    element.children[4].children[0].setAttribute('readonly', 'true');
                } else if (element.children[4].children[0].value != "") {
                    element.children[3].children[0].setAttribute('readonly', 'true');
                }
            });
            console.log(jumlahDebit, jumlahKredit);
            if (jumlahDebit == jumlahKredit) {
                document.querySelector("#btnSubmit").removeAttribute('disabled');
            } else {
                document.querySelector("#btnSubmit").setAttribute('disabled', 'true');
            }
        }

        totalDebit();
        totalKredit();
        checkGanda();
    </script>
@endpush
