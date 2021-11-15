<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" @auth href="{{ route('user.formations.index') }}" @endauth @guest
            href="{{ route('formations.index') }}" @endguest>
            <!-- <img src="./assets/images/brand/logo/logo.svg" alt="" /> -->
            <span class="logo-text"> E-Formation</span>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Administration</div>
            </li>
            <li class="nav-item">
                <a class="nav-link has-arrow  active " href="{{ route('user.formations.index') }}">
                    <i data-feather="lock" class="nav-icon icon-xs me-2"></i>
                    Tableau de bord
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Par Catégories</div>
            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                    aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="nav-icon icon-xs me-2">
                    </i> Catégories
                </a>

                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link " href="./pages/profile.html">
                                {{ Str::of($category->name)->limit(20) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </li>





        </ul>

    </div>
</nav>
