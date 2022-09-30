
{{-- no print ini berfungsi untuk tidak menampilkan siderbar pada saat melakukan pencetakan --}}
<div class="main-sidebar noprint">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img alt="image" src="{{ asset('assets/img/IDM.png') }}" width="80" height="80"
                style="border-radius: 50%; margin-top:30px" class="img-fluid" data-toggle="tooltip">
        </div>

        <ul class="sidebar-menu" style="margin-top:90px">


            <li><a class="nav-link {{ Request::is('dashboard/index') ? 'active' : '' }}" href="/dashboard"><i class="far fa-chart-bar"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="/indexproduk"><i class="nav-icon far fa-plus-square"></i> <span>Produk</span></a></li>

<li class="nav-item dropdown">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/transaksimasuk"><i class="fas fa-arrow-alt-circle-down"></i><span>Bukti Transaksi Masuk</span></a></li>
                    <li><a class="nav-link" href="/transaksikeluar"><i class="fas fa-arrow-alt-circle-up"></i><span>Bukti Transaksi Keluar</span></a></li>
                    <li><a class="nav-link" href="/transaksi"><i class="fas fa-pager"></i><span>Transaksi</span></a></li>

                    <li><a class="nav-link" href="/jurnalumum"><i class="fas fa-newspaper"></i> <span>Jurnal
                                Umum</span></a></li>
                    <li><a class="nav-link" href="/bubes"><i class="fas fa-book-open"></i> <span>Buku
                                Besar</span></a></li>
                    <li><a class="nav-link" href="/neracasaldo"><i class="fas fa-balance-scale"></i> <span>Neraca
                                Saldo</span></a></li>
                    <li><a class="nav-link" href="/jurnalpenyesuaian"><i class="fas fa-swatchbook"></i> <span>Jurnal
                                Penyesuaian</span></a></li>
                    <li style="margin-top:20px"><a class="nav-link" href="/nesasuai"><i
                                class="fas fa-balance-scale"></i> <span>Neraca Saldo <br> Setelah
                                Penyesuaian</span></a></li>
                    <li style="margin-top:20px"><a class="nav-link" href="/laporanlabarugi"><i class="far fa-file-alt"></i> <span>Laporan Laba Rugi</span></a></li>
                    <li><a class="nav-link" href="/laporanpermo"><i class="far fa-file-alt"></i> <span>Laporan Perubahan Modal</span></a></li>
                    <li><a class="nav-link" href="/laporanneraca"><i class="far fa-file-alt"></i> <span>Laporan Neraca</span></a></li>
                    <li><a class="nav-link" href="/aruskas"><i class="far fa-file-alt"></i> <span>Laporan Perubahan Arus Kas</span></a></li>
                    <li><a class="nav-link" href="/jurnalpenutup"><i class="fas fa-book"></i> <span>Jurnal
                                Penutup</span></a></li>
                    <li><a class="nav-link" href="/nesasetup"><i class="fas fa-balance-scale"></i> <span>Neraca Saldo
                                Setelah Penutup</span></a></li>
                </ul>
            </li>


            <li><a class="nav-link" href="/karyawan"><i class="fas fa-user-friends"></i> <span>Karyawan</span></a>
            <li><a class="nav-link" href="/formprofilperusahaan"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
            </li>
            <li><a class="nav-link" href="/kontak"><i class="far fa-user"></i> <span>Kontak</span></a></li>
            <li><a class="nav-link" href="/daftarakun"><i class="fas fa-plug"></i> <span>Daftar Akun</span></a></li>
            </li>



    </aside>
</div>
