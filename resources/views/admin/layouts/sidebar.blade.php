  @php
    $title = app()->view->getSections()['title'];
    $sub_title = app()->view->getSections()['sub_title'] ?? '';
  @endphp
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}">
                <i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
            </a>
        </li>
        <li class=" navigation-header">
          <span style="font-size: 22px">Components</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>
        <li class=" nav-item {{ $title == 'Sliders' ? 'has-sub menu-collapsed-open' : '' }}"><a href="#"><i class="la la-home"></i><span class="menu-title">Home Page</span></a>
          <ul class="menu-content">
            <li class="{{ $sub_title == 'Home Sliders' ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('slides.index') }}">Slides</a>
            </li>
            <li class="{{ $sub_title == 'Create Slider' ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('slides.create') }}">Add Slide</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item {{ $title == 'Loans' ? 'has-sub menu-collapsed-open' : '' }}"><a href="#"><i class="la la-list"></i><span class="menu-title">Loan Types</span></a>
          <ul class="menu-content">
            <li {{ $sub_title == 'Loan Type' ? 'active' : '' }}>
                <a class="menu-item" href="{{ route('loans.index') }}">Loan List</a>
            </li>
            <li {{ $sub_title == 'Create Loan' ? 'active' : '' }}>
                <a class="menu-item" href="{{ route('loans.create') }}">Add Type</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item {{ $title == 'Payments' ? 'has-sub menu-collapsed-open' : '' }}"><a href="#"><i class="la la-list"></i><span class="menu-title">Payment Types</span></a>
          <ul class="menu-content">
            <li {{ $sub_title == 'Payment Type' ? 'active' : '' }}>
                <a class="menu-item" href="{{ route('payment_types.index') }}">All Types</a>
            </li>
            <li {{ $sub_title == 'Create Payment' ? 'active' : '' }}>
                <a class="menu-item" href="{{ route('payment_types.create') }}">Add Type</a>
            </li>
          </ul>
        </li>
        <li>
            <a class="nav-item" href="{{ route('agreement.index') }}">
              <i class="la la-money"></i>
              <span class="menu-title">All Loans</span>
            </a>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-cc-visa"></i><span class="menu-title">Payments</span></a>
          <ul class="menu-content">
            <li>
                <a class="menu-item" href="{{ route('payments.index') }}">All Payments</a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('payments.create') }}">Add Payment</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title">Services</span></a>
          <ul class="menu-content">
            <li>
                <a class="menu-item" href="navbar-light.html">All Services</a>
            </li>
            <li>
                <a class="menu-item" href="navbar-dark.html">Add Service</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title">Loanee</span></a>
          <ul class="menu-content">
            <li>
                <a class="menu-item" href="{{ route('loanee.index') }}">All Loanee</a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('loanee.create') }}">Add Loanee</a>
            </li>
          </ul>
        </li>
        <li>
            <a class="nav-item" href="navbar-light.html">
              <i class="la icon-bag"></i>
              <span class="menu-title">Products</span>
            </a>
        </li>
        <li>
          <a class="nav-item" href="{{ route('contacts.index') }}">
            <i class="la icon-notebook"></i>
            <span class="menu-title">Contacts</span>
          </a>
        </li>
      </ul>
    </div>
  </div>