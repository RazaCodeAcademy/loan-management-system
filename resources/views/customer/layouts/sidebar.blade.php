  @php
    $title = app()->view->getSections()['title'];
    $sub_title = app()->view->getSections()['sub_title'] ?? '';
  //  dd($sub_title)
  @endphp
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="menu-item">
            <a href="{{ route('customer.dashboard') }}">
                <i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
            </a>
        </li>
      </ul>
    </div>
  </div>