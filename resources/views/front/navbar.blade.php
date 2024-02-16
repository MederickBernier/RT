<!-- Navbar content here -->
<nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <ul class="logotxt">
        <img src="img/logo_blank.png" class="logoimg">
        <a href="{{ route('index') }}" class="logo">RaidSmith</a>
    </ul>

    <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="{{ route('about-us') }}">About Us</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>

    <!-- Seachtoggle if needed later -->
    <!--i class="uil uil-search search-icon" id="searchIcon"></i>
    <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
    </div-->
</nav>
