<nav>
    <a href="{{ route('home') }}" class="logo">PHONE<span>B</span>OOK</a>
      <div class="nav-links" id="navLink">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul id="navbar">
            <li><a href="">{{ __('Email:') }} {{ Auth::user()->email }}</a></li>
            <li><a href="{{ route('profile.update') }}">{{ __('Name:') }} {{ Auth::user()->name }}</a></li>
            <li><a href="">{{ __('Phone:') }} {{ Auth::user()->phone }}</a></li>
            <li><a href="{{ route('contact.favorites') }}">{{ __('Favorites') }}</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
      </div>
      
      <i class="fa fa-bars" onclick="showMenu()"></i>
</nav>