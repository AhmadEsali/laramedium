	<!-- Header -->
	<header id="header">
	    <!-- Nav -->
	    <div id="nav">
	        <!-- Main Nav -->
	        <div id="nav-fixed">
	            <div class="container">
	                <!-- logo -->
	                <div class="nav-logo">
	                    <a href="/" class="logo">Lara Medium</a>
	                </div>
	                <!-- /logo -->

	                <!-- nav -->
	                <ul class="nav-menu nav navbar-nav">

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                    @endguest
	              
	                 
	                </ul>
	                <!-- /nav -->

	           
	            </div>
	        </div>
	        <!-- /Main Nav -->

	     
	    </div>
        <!-- /Nav -->
        
        @yield('page-header')
	</header>
	<!-- /Header -->
