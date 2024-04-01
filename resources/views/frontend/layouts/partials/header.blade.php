<div class="container">
    
    <div class="navbar-header">
         <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon icon-bar"></span>
              <span class="icon icon-bar"></span>
              <span class="icon icon-bar"></span>
         </button>

         <!-- lOGO TEXT HERE -->
         <a href="#" class="navbar-brand">Blog Management</a>
    </div>

    <!-- MENU LINKS -->
    <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-nav-first">
              <li class="@if (\Request::routeIs('frontend.index')) active @endif"><a href="{{ route('frontend.index') }}">Home</a></li>
              <li class=" @if (\Request::routeIs('frontend.blog')) active @endif"><a href="{{ route('frontend.blog') }}">Blog</a></li>
              <li class="@if (\Request::routeIs('frontend.aboutus')) active @endif"><a href="{{ route('frontend.aboutus') }}">About Us</a></li>
              <li class="@if (\Request::routeIs('frontend.contactus')) active @endif"><a href="{{ route('frontend.contactus') }}">Contact Us</a></li>
         </ul>
    </div>

</div>