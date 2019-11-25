<div class="overlay-navigation">
        <nav role="navigation" class="vh-100">
          <ul>
            <li class="card-link"><a href="/posts/" data-content="fellow members profiles">Staff profiles</a></li>
            <li><a href="/announcements" data-content="Office related announcements">announcements</a></li>
            <li><a href="/announcements" data-content="Upcoming events and staff birthdays">events</a></li>
            <li><a href="/users/create" data-content="Register a new account">create account</a></li>
            <li><a class="dropdown-item" data-content="log me out" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form></li>

          </ul>
        </nav>
      </div>

<div class="">
    <div class="position-absolute">
        <a class="nav-prof-img" href="#" title="My Profile">
            @if(Auth::user()->post)
            <div class="img-container"><img src="/cover_images/{{Auth::user()->post->pic}}"></div>
            @endif
        </a>
        <h6 class="p-0 m-0 text-capitalize no-wrap user-name">
                {{Auth::user()->name}}
                </h6>
        
    </div>
</div>
<div class="open-overlay">
<span class="bar-top"></span>
<span class="bar-middle"></span>
<span class="bar-bottom"></span>
</div>
 <div class="pb-60 w-100 pri-background"></div>