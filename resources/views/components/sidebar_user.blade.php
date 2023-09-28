<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}"><a href="{{ route('dashboard') }}" class=""
                    aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dasbor</span>
                </a>
            </li>
            <li class="{{ Request::is('dokumen/sipp', 'dokumen/sipp/*') ? 'mm-active' : '' }}"><a
                    href="{{ route('sipp.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">SIPP</span>
                </a>
            </li>
        </ul>
    </div>
</div>
