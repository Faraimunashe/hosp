<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Home</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashbard
                    </a>
                </li>
                @if (Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin-patients') }}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Patients
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-hospitals') }}">
                            <i class="metismenu-icon pe-7s-culture"></i>
                            Facilities
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-collections') }}">
                            <i class="metismenu-icon pe-7s-note2"></i>
                            Collection
                        </a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</div>
