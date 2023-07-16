<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('admin.dashboard') }}" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('profesi.index') }}">Profesi</a></li>
                    <li><a href="{{ route('status-pegawai.index') }}">Status Pegawai</a></li>
                    <li><a href="{{ route('ruangan.index') }}">Ruangan</a></li>
                    <li><a href="#">Jenis PK</a></li>
                    <li><a href="#">Area</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-file-import"></i>
                <span class="nav-text">Data Dokumen</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('profesi.index') }}">Profesi</a></li>
                <li><a href="{{ route('status-pegawai.index') }}">Status Pegawai</a></li>
                <li><a href="{{ route('ruangan.index') }}">Ruangan</a></li>
                <li><a href="#">Jenis PK</a></li>
                <li><a href="#">Area</a></li>
            </ul>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Data Pegawai</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span class="nav-text">Pengaturan Akun</span>
            </a>
        </li>
        </ul>
        
        <div class="copyright">
            <p><strong>STR Perawat</strong> © 2023 All Rights Reserved</p>
        </div>
    </div>
</div>