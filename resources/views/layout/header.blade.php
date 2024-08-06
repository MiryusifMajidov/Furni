<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">{{nova_get_setting('header_logo')}}<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                @foreach($headerSettings as $setting)
                    <li class="nav-item {{ Request::is($setting->menu_url) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url($setting->menu_url) }}">
                            {{ $setting->menu }}
                        </a>
                    </li>
                @endforeach
            </ul>


            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="#"><img src="images/user.svg" alt="User"></a></li>
                <li><a class="nav-link" href="{{route('cart')}}"><img src="images/cart.svg" alt="Cart"></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe nav-link"></i>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">Russian</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'az') }}">Azerbaijani</a></li>
                        <!-- Add more languages as needed -->
                    </ul>

                </li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
