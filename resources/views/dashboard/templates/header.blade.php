<nav class="navbar navbar-expand px-3 border-bottom">
    <a class="text-decoration-none" id="sidebar-toggle" type="button">
        <i class="fa-solid fa-bars"></i>
    </a>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-icon pe-md-0 avatar {{ request()->routeIs('showprofile') ? 'active' : '' }}">
                    {{-- <img src="{{ asset($user->img ? 'storage/' . $user->img : 'img/assets/avatar2.svg') }}" class="avatarhead"> --}}
                    @php
            $user = Auth::user();
            $defaultImg =
                $user && $user->gender === 'perempuan'
                    ? 'img/assets/girl.svg' // Default untuk perempuan
                    : 'img/assets/boy.svg'; // Default untuk laki-laki
        @endphp

        <img src="{{ asset($user && $user->img ? 'storage/' . $user->img : $defaultImg) }}" class="avatarhead" alt="Profile Picture">
                </a>
                <div class="dropdown-menu dropdown-menu-end list-avatar">
                    <a href="{{ route('showprofile', ['id' => Auth::id()]) }}"
                        class="dropdown-item {{ request()->routeIs('showprofile') ? 'active' : '' }}">
                        <i class="fa-solid fa-list pe-2" style="font-size: 12px; margin-right: -2px;"></i>
                        Profile
                    </a>
                    @if (auth()->user()->role == 'developer')
                        <a href="/developersite"
                            class="dropdown-item {{ request()->is('developersite') ? 'active' : '' }}">
                            Developer
                        </a>
                    @endif
                    <a href="/logout" class="dropdown-item">
                        <i class="fa-solid fa-sign-out-alt pe-2" style="font-size: 12px; margin-right: -2px;"></i>
                        Logout</a>
                </div>
            </li>
        </ul>
        <div class="theme-switch">
            <span class="theme-label light-label">Light</span>
            <label class="switch">
                <input type="checkbox" id="theme-toggle">
                <span class="slider">
                    <i class="bi bi-moon-stars-fill moon-icon"></i>
                    <i class="bi bi-brightness-high-fill sun-icon"></i>
                </span>
            </label>
            <span class="theme-label dark-label">Dark</span>
        </div>

    </div>
</nav>
