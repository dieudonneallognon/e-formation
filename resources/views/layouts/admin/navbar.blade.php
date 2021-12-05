<div class="header @@classList">
    <nav class="navbar-classic navbar navbar-expand-lg">
        <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center" method="POST"
                @auth
                    @if (!auth()->user()->isAdmin())
                        action="{{ route('user.formations.search') }}"
                    @else
                        action="{{ route('formations.search') }}"
                    @endif
                @endauth
                @guest
                    action="{{ route('formations.search') }}"
                @endguest
            >
                @csrf
            <input name="search" type="text" class="form-control w-100" placeholder="Rechercher une formation..." />
        </form>
    </div>
    <!--Navbar nav -->
    @auth
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="{{ asset(auth()->user()->getAvatar()) }}" class="rounded-circle" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="px-4 pb-0 pt-2">
                        <div class="lh-1 ">
                            <h5 class="mb-1">{{ auth()->user()->lastName }}
                                {{ auth()->user()->firstName }} </h5>

                            <a href="{{ route('user.profile.show') }}" class="text-inherit fs-6">
                                Mon profil&nbsp;
                                <span class="fs-6 fst-italic">({{ auth()->user()->role->name }})</span>
                            </a>
                        </div>
                        <div class=" dropdown-divider mt-3 mb-2"></div>
                    </div>

                    <ul class="list-unstyled">
                        <li>
                            <a id="logout-link" class="dropdown-item" href="#">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>
                                Déconnexion
                            </a>
                            <form id="logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    @endauth
</nav>
</div>
