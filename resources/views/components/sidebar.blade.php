<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ Request::is('admin/dashboard') ? 'mm-active' : '' }}"><a href="{{ route('admin.dashboard') }}"
                    class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dasbor</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-master/profesi*') ? 'mm-active' : '' }}"><a
                    href="{{ route('profesi.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Profesi</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-master/status-pegawai*') ? 'mm-active' : '' }}"><a
                    href="{{ route('status-pegawai.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Status Pegawai</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-master/ruangan*') ? 'mm-active' : '' }}"><a
                    href="{{ route('ruangan.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Ruangan</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-master/jenis-pk*') ? 'mm-active' : '' }}"><a
                    href="{{ route('jenisPk.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Jenis PK</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-master/area*') ? 'mm-active' : '' }}"><a
                    href="{{ route('area.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Area</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/dokumen/sipp*') ? 'mm-active' : '' }}"><a
                    href="{{ route('dokumenAdmin.sipp') }}" class="" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">SIPP</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/dokumen/spkk*') ? 'mm-active' : '' }}"><a
                    href="{{ route('dokumenAdmin.spkk') }}" class="" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">SPKK</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/dokumen/str*') ? 'mm-active' : '' }}"><a
                    href="{{ route('dokumenAdmin.str') }}" class="" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">STR</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Data Pegawai</span>
                </a>
            </li>
        </ul>
    </div>
</div>
