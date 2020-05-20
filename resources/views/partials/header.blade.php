<div id="preloder">
    <div class="loader"></div>
</div>
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="./index.html" class="site-logo">
                        <img src="/img/logo.png" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <form class="header-search-form">
                        <input type="text" placeholder="Search on divisima ....">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="user-panel d-flex">
                        <div class="up-item d-flex">
                            <div class="">
                                <i class="flaticon-profile"></i>
                            </div>
                            <div id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    @auth
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
                                @else
                                <div class="mt-2 mx-1">
                                    <a href="{{ route('login') }}">Sign In</a> or <a href="{{ route('register') }}">Create Account</a>
                                </div>
                                @endauth
                            </div>
                        </div>
                        <div class="up-item">
                            <div class="shopping-card">
                                <i class="flaticon-bag"></i>
                                <span>{{ Cart::getContent()->count() }}</span>
                            </div>
                            <a href="{{route('carts.index')}}">Shopping Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                
                <li><a href="#">Home</a></li>
               
                <li><a href="#">Women</a>
                   <ul class="sub-menu">
                        @foreach($womenCategories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    
                </li>
                
                <li><a href="#">Men</a>
                    <ul class="sub-menu">
                        @foreach($menCategories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">Kids</a>
                    <ul class="sub-menu">
                        @foreach($kidsCategories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>  
                        @endforeach  
                    </ul>
                </li>
                <li>
                    <a href="#">Essentials
                        <span class="new">New</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>
</header>
