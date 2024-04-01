<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true"
    data-img="{{ asset('app-assets/images/backgrounds/04.jpg') }}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="{{ asset('app-assets/images/logo/logo.png') }}" />
                    <h3 class="brand-text">BlogManagement</h3>
                </a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0"
                    data-toggle="collapse"><i class="toggle-icon ft-disc font-medium-3" data-ticon="ft-disc"></i></a>
            </li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
       
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @if (\Request::routeIs('admin.blog-posts.*')) open @endif"><a href="{{ route('admin.blog-posts.index') }}"><i class="ft-home"></i><span class="menu-title"
                        data-i18n="">Blogs</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item @if (\Request::routeIs('admin.blog-posts.*')) active @endif" href="{{ route('admin.blog-posts.index') }}">List</a>
                    </li>

                </ul>
               
            </li>

        </ul>

        
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @if (\Request::routeIs('admin.about.*')) open @endif"><a href="{{ route('admin.about.index') }}"><i class="ft-home"></i><span class="menu-title"
                        data-i18n="">Aboutus</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item @if (\Request::routeIs('admin.about.*')) active @endif " href="{{ route('admin.about.index') }}">List</a>
                    </li>

                </ul>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item  @if (\Request::routeIs('admin.contact.*')) open @endif"><a href="{{ route('admin.contact.index') }}"><i class="ft-home"></i><span class="menu-title"
                        data-i18n="">Contactus</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item  @if (\Request::routeIs('admin.contact.*')) active @endif" href="{{ route('admin.contact.index') }}">List</a>
                    </li>

                </ul>
               
            </li>

        </ul>  
        
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @if (\Request::routeIs('admin.user-contacts.*')) open @endif"><a href="{{ route('admin.user-contacts.index') }}"><i class="ft-home"></i><span class="menu-title"
                        data-i18n="">User Contacts</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item @if (\Request::routeIs('admin.user-contacts.*')) active @endif" href="{{ route('admin.user-contacts.index') }}">List</a>
                    </li>

                </ul>
               
            </li>

        </ul>
    </div>
</div>