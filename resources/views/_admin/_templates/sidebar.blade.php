<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('events') }}"><i class="icon-note"></i><span class="menu-title" data-i18n="nav.templates.main">Events</span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('peserta') }}"><i class="icon-drawer"></i><span class="menu-title" data-i18n="nav.layouts.temp">Peserta</span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('absensi') }}"><i class="icon-folder"></i><span class="menu-title" data-i18n="nav.category.general">Absensi</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="icon-screen-tablet"></i><span class="menu-title" data-i18n="nav.category.pages">Laporan</span></a>
          <ul class="menu-content">
                <li><a class="menu-item" href="icons-feather.html" data-i18n="nav.icons.icons_feather">Event</a>
                </li>
                <li><a class="menu-item" href="icons-font-awesome.html" data-i18n="nav.icons.icons_font_awesome">Peserta</a>
                </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>