@extends('layouts.master')
@section('title', ' Form Jurnal Penyesuaian')
@section('content')

    <section class="section">
<form method="POST" action="/jurnalpenyesuaian/store">
    @csrf
        <div>
            <div class="section-header">
                <h4> Transaksi <br> Jurnal Penyesuaian</h1>
            </div>

            <div class="section-header">
                <div class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top"> <strong>
                        {{-- Tanggal Transaksi <input type="date" class="form-control" name="tanggal" required> </strong> --}}

                    <strong>Status</strong>

                    <select name="status" class="form-control">
                        <option value ="jupen">jupen</option>

                    </select>
                </div>
            </div>

            <input type="text"  style="width: 195px" name="transaksi_id" value="{{ request()->transaksi_id }}">
            <button onclick="tambah()" type="button" class="btn btn-success" style="margin-bottom: 10px">+ Tambah
                Data</button>
            <div class=" text-right plus float-right" style="margin-bottom: 10px">
                <a href="/jurnalpenyesuaian/" type="reset" class="btn btn-danger">Batal</a>
                <button id="btnSubmit" type="submit" disabled class="btn btn-success">Buat Jurnal Penyesuaian</a>
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

                    <tr id="baris">
                        <td>
                            <select class="form-control" name="no_akun[]">
                                @forelse ($akuns as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['no_akun'] }} --  {{ $item['akun'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="deskripsi[]" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="referensi[]">
                        </td>
                        <td>
                            <input type="text" class="debit form-control" name="debit[]">
                        </td>
                        <td>
                            <input type="text" class="kredit form-control" name="kredit[]">
                        </td>
                        <td>
                            <button type="button" class="hapus btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                        </td>
                    </tr>
                    <tr id="baris">
                        <td>
                            <select class="form-control" name="no_akun[]">
                                @forelse ($akuns as $item)
                                <option value="{{ $item['id'] }}">{{ $item['no_akun'] }} --  {{ $item['akun'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="deskripsi[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="referensi[]">
                        </td>
                        <td>
                            <input type="text" class="debit form-control" name="debit[]">
                        </td>
                        <td>
                            <input type="text" class="kredit form-control" name="kredit[]">
                        </td>
                        <td>
                            <button type="button" class="hapus btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                        </td>
                    </tr>

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

        $(document).on('click','.hapus',function() {
            if(baris > 2){
                $(this).parent().parent().remove();
                baris--;
            }
        });

        $(document).on('change','.debit',function() {
            totalDebit();
            checkGanda();
        });

        $(document).on('change','.kredit',function() {
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

        function totalDebit(){
            let elementDebit = document.querySelectorAll(".debit");
            let jum = 0;
            elementDebit.forEach(element => {
                console.log(element.value);
                if(element.value != ""){
                    jum += parseInt(element.value);
                }
            });
            jumlahDebit = jum;
            $('#displayDebit').html(jum);
        }

        function totalKredit(){
            let elementKredit = document.querySelectorAll(".kredit");
            let jum = 0;
            elementKredit.forEach(element => {
                console.log(element.value);
                if(element.value != ""){
                    jum += parseInt(element.value);
                }
            });
            jumlahKredit = jum;
            $('#displayKredit').html(jum);
        }

        function checkGanda(){
            let baris = document.querySelectorAll("#baris");
            baris.forEach(element => {
                element.children[4].children[0].removeAttribute('readonly');
                element.children[3].children[0].removeAttribute('readonly');

                if(element.children[3].children[0].value != ""){
                    element.children[4].children[0].setAttribute('readonly','true');
                }else if (element.children[4].children[0].value != ""){
                    element.children[3].children[0].setAttribute('readonly','true');
                }
            });
            console.log(jumlahDebit,jumlahKredit);
            if(jumlahDebit == jumlahKredit){
                document.querySelector("#btnSubmit").removeAttribute('disabled');
            }else{
                document.querySelector("#btnSubmit").setAttribute('disabled','true');
            }
        }


    </script>

@endpush
