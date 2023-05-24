@if(auth() -> user() -> level == 'admin')
<a href="/dashboard" class="nav_link {{ Request::is('dashboard') ? 'active' : '' }}"> 
    <i class='bx bx-home nav_icon'></i> 
    <span class="nav_name">Dashboard</span> 
</a>
<a href="/statistik" class='nav_link {{ Request::is("statistik") ? "active" : "" }}'> 
    <i class="bx bx-bar-chart-alt-2 nav_icon"></i> 
    <span class="nav_name">Statistika</span> 
</a>

<a href="/pelanggaran" class="nav_link {{ Request::is('pelanggaran') ? 'active' : '' }}"> 
    <i class='bx bx-receipt nav_icon}' size='lg'></i> 
    <span class="nav_name">Pelanggaran</span> 
</a>
<a href="/input-pelanggaran" class="nav_link {{ Request::is('input-pelanggaran') ? 'active' : '' }}"> 
    <i class='bx bx-check-circle nav_icon'></i> 
    <span class="nav_name">Input Pelanggaran</span> 
</a>

<a href="/users" class="nav_link {{ Request::is('users') ? 'active' : '' }}"> 
    <i class='bx bx-group nav_icon ' size='lg'></i> 
    <span class="nav_name">Users</span> 
</a>

<a href="/kategori" class="nav_link {{ Request::is('kategori') ? 'active' : '' }}"> 
    <i class='bx bx-category-alt nav_icon ' size='lg'></i> 
    <span class="nav_name">Kategori</span> 
</a>

<a href="/kelas" class="nav_link {{ Request::is('kelas') ? 'active' : '' }}"> 
    <i class='bx bx-door-open nav_icon ' size='lg'></i> 
    <span class="nav_name">Kelas</span> 
</a>

@endif

@if(auth() -> user() -> level == 'siswa' || auth() -> user() -> level == 'guru')
<a href="/dashboard" class="nav_link {{ Request::is('dashboard') ? 'active' : '' }}"> 
    <i class='bx bxs-dashboard nav_icon'></i> 
    <span class="nav_name">Dashboard</span> 
</a>
@endif

@if(auth() -> user() -> level == 'siswa')
<a href="/statistik" class='nav_link {{ Request::is("statistik") ? "active" : "" }}'> 
    <i class="bx bx-bar-chart-alt-2 nav_icon"></i> 
    <span class="nav_name">Statistika</span> 
</a>

<a href="/kategori" class="nav_link {{ Request::is('kategori') ? 'active' : '' }}"> 
    <i class='bx bxs-category-alt nav_icon ' size='lg'></i> 
    <span class="nav_name">Kategori</span> 
</a>

<a href="/pelanggaran" class="nav_link {{ Request::is('pelanggaran') ? 'active' : '' }}"> 
    <i class='bx bx-receipt nav_icon}' size='lg'></i> 
    <span class="nav_name">Pelanggaran</span> 
</a>
@endif

@if(auth() -> user() -> level == 'guru')
<a href="/input-pelanggaran" class="nav_link {{ Request::is('input-pelanggaran') ? 'active' : '' }}"> 
    <i class='bx bx-check-circle nav_icon'></i> 
    <span class="nav_name">Input Pelanggaran</span> 
</a>
@endif