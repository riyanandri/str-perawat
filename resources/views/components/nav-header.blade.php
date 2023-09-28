<div class="nav-header">
    <a href="{{ route('admin.dashboard') }}" class="brand-logo">
        <img class="logo-abbr" src="{{ asset('assets/images/logo-rsu.png') }}" alt="logo">
        <div class="brand-title">
            <h2>RSUD</h2>
            <span class="brand-sub-title">{{ Auth::user()->nama }}</span>
        </div>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
