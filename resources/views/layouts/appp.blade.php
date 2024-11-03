<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Restaurant') }}</title>
    <link rel="stylesheet" href="{{ mix('sass/app.scss') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <!-- Site Name -->
                <li><a href="{{ url('/') }}">{{ config('app.name', 'Restaurant') }}</a></li>

                <!-- General Links -->
                <li><a href="{{ url('/menu') }}">Menu</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>

                <!-- Only show the cart for all users -->
                <li><a href="{{ url('/cart') }}">Cart</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <!-- Only authenticated users see the following -->
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                    <li><a href="{{ url('/order-history') }}">Order History</a></li>

                    <!-- Logout option -->
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
