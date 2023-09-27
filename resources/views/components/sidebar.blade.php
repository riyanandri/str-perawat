<div class="dlabnav">
    <div class="dlabnav-scroll mm-active ps ps--active-y">
        <ul class="metismenu " id="menu">
            <li class="{{ Request::is('admin/dashboard') ? 'mm-active' : '' }}"><a href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li
                class="{{ Request::is('admin/profesi') || Request::is('admin/status-pegawai') || Request::is('admin/ruangan') ? 'mm-active' : '' }}">
                <a href="javascript:void()" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Request::is('admin/profesi') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/profesi') }}">Profesi</a></li>
                    <li class="{{ Request::is('admin/status-pegawai') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/status-pegawai') }}">Status Pegawai</a></li>
                    <li class="{{ Request::is('admin/ruangan') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/ruangan') }}">Ruangan</a></li>
                    <li class="{{ Request::is('admin/jenis-pk') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/jenis-pk') }}">Jenis PK</a></li>
                    <li class="{{ Request::is('admin/area') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/area') }}">Area</a></li>
                </ul>
            </li>

            {{-- <li
                class="{{ Request::is('admin/profesi') || Request::is('admin/status-pegawai') || Request::is('admin/ruangan') || Request::is('admin/jenis-pk') || Request::is('admin/area') ? 'mm-active' : '' }}">
                <a class="has-arrow" href="javascript:void()"
                    aria-expanded="{{ Request::is('admin/profesi') || Request::is('admin/status-pegawai') || Request::is('admin/ruangan') || Request::is('admin/jenis-pk') || Request::is('admin/area') ? 'true' : 'false' }}">
                    <i class="fas fa-folder"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Request::is('admin/profesi') ? 'mm-active' : '' }}"><a
                            href="{{ url('admin/profesi') }}">Profesi</a>
                    </li>
                    <li class="{{ Request::is('status-pegawai') ? 'mm-active' : '' }}"><a
                            href="{{ url('status-pegawai') }}">Status Pegawai</a></li>
                    <li class="{{ Request::is('ruangan') ? 'mm-active' : '' }}"><a
                            href="{{ url('ruangan') }}">Ruangan</a>
                    </li>
                    <li class="{{ Request::is('jenis-pk') ? 'mm-active' : '' }}"><a href="{{ url('jenis-pk') }}">Jenis
                            PK</a></li>
                    <li class="{{ Request::is('area') ? 'mm-active' : '' }}"><a href="{{ url('area') }}">Area</a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class=""><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-import"></i>
                    <span class="nav-text">Data Dokumen</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dokumen.str') }}">STR</a></li>
                </ul>
            </li> --}}
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Data Pegawai</span>
                </a>
            </li>
            <li><a href="{{ route('dokumenAdmin.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Dokumen</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>STR Perawat</strong> © 2023 All Rights Reserved</p>
        </div>
    </div>
</div>
