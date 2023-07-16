<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">Dashboard Light</a></li>
                    <li><a href="index-2.html">Dashboard Dark</a></li>
                    <li><a href="project-page.html">Project</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="kanban.html">Kanban</a></li>
                    <li><a href="calendar-page.html">Calendar</a></li>
                    <li><a href="message.html">Messages</a></li>	
                </ul>

            </li> --}}
            <li><a href="{{ route('dashboard') }}" class="" aria-expanded="false">
                <i class="fas fa-home"></i>
                <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-upload"></i>
                <span class="nav-text">Upload Dokumen</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="#">STR</a></li>
                <li><a href="">SIPP</a></li>
                <li><a href="#">SPKK</a></li>
            </ul>
            </li>
            <li><a href="#" class="" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">Dokumen</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span class="nav-text">Pengaturan Akun</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="#">Update Akun</a></li>
                <li><a href="">Detail Akun</a></li>
            </ul>
            </li>
        </ul>
    </div>
</div>