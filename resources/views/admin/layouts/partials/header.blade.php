<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" id="profile_menu" href="javascript:void(0);"
                            data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}"
                                    alt="avatar">

                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <span class="avatar avatar-online">
                                        <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}"
                                            alt="avatar">
                                        <span class="user-name text-bold-700 ml-1">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <a class="dropdown-item" href="#"><i class="ft-edit-2"></i>
                                    {{ __('site.Edit Profile') }}</a>

                                <a class="dropdown-item" href="#"><i class="ft-lock"></i>
                                    {{ __('site.Change Password') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                        class="ft-power"></i>
                                    {{ __('site.Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
