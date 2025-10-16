
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
     <ul class="navbar-nav mr-auto">
        <li class="nav-item">
              <a  href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}"> Home</a></li>
 
              <li class="nav-item">
              <a  href="{{ route('calculator.index') }}" class="nav-link {{ Request::is('calculator') ? 'active' : '' }}" >Calculator</a></li>     
                    
     <li class="nav-item "> <a  href="{{ route('students.index') }}" class="nav-link {{ Request::is('students') ? 'active' : '' }}">Display Data</a></li>
     <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
               <a href="{{ url('/invoice') }}"  class="nav-link {{ Request::is('invoice') ? 'active' : '' }}">Invoice</a> </li>
          <a href="{{ url('/contact') }}"  class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a> </li>

            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>

                                <li class="nav-item  {{ Request::is('register') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
</ul>
</nav>