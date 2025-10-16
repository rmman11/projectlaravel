
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
     <ul class="navbar-nav mr-auto">

            @guest
                         @if (\Illuminate\Support\Facades\Route::has('login'))
                                      <li class="nav-item ">   <a class="nav-link  {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }} ">{{ __('Login') }}</a>
                                </li>
 @endif

                              @if (\Illuminate\Support\Facades\Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }} ">{{ __('Register') }}</a>
                                </li>

                                 <li class="nav-item ">
                                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }} ">{{ __('About') }}</a>
                                </li>
                                          
                            @endif
                        @else
                        </ul>
                           <ul class="navbar-nav mr-auto">
              
        <li class="nav-item">
              <a  href="{{ route('dashboard') }}" class="nav-link   {{ request()->is('dashboard') ? 'active' : '' }}"> Dashboard</a></li>
 
              <li class="nav-item">
              <a  href="{{ route('videos.index') }}" class="nav-link {{ request()->is('videos') ? 'active' : '' }}" >Video</a></li>     
                    
     <li class="nav-item "> <a  href="{{ route('students.index') }}" class="nav-link {{ request()->is('students') ? 'active' : '' }}">Display Data</a></li>

     <li class="nav-item">
               <a href="{{ route('invoices.index') }}"  class="nav-link {{ request()->is('invoices.index') ? 'active' : '' }}">Invoice</a> </li>
     <li class="nav-item">
          <a href="{{ url('/contact') }}"  class="nav-link {{ request()->is('contact') ? 'active' : '' }}}">Contact</a> </li>

           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <span>Welcome, {{ auth()->user()->name }}</span>
                                </a>
                              
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
           @endguest


</ul>
</nav>