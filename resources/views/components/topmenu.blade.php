<style>
    .top-nav-bar {
        background-color: rgb(35, 35, 35);
        height: 50px;
        color: white;
        list-style: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0px 20px;
    }

    .link-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px 20px;
        color: white;
        border-radius: 3px;
        border: solid white 2px;
        background-color: rgb(41, 41, 41);
    }

    .link-btn:hover {
        transition: background-color 0.5s;
        background-color: rgb(0, 0, 0);
    }

    .auth-container {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .carshop-btn {
        border: solid white 2px;
        padding: 5px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
    }
</style>

<div class="top-nav-bar">
    <a href="/">MARKETPLACE</a>

    @guest
        <div class="auth-container">
            <a class="link-btn" href="/login">SIGN IN</a>
            <a class="link-btn" href="/register">SIGN UP</a>
        </div>
    @else
        <div style="display: flex; flex-direction:row; align-items:center; gap:10px">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    {{-- Logout --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>

            </li>
            <a href="/carshop" class="carshop-btn">Shopping Car</a>
        </div>

    @endguest

</div>
