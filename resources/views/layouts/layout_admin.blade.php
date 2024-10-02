<!DOCTYPE html>
<html lang="en">

<head>
    <title>IT BEEF SHABU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('style')
    @yield('font')
</head>

<body>
    <!-- เมนูฝั่งแอดมิน -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
        <div class="container-fluid ms-3">
            <a class="navbar-brand" href="{{ route('home_admin') }}" style="font-weight: 600; letter-spacing: 1px;">IT
                BEEF SHABU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">

                    <li class="nav-item mx-3">
                        <a class="nav-link {{ request()->routeIs('home_admin*') ? 'active' : '' }}"
                            href="{{ route('home_admin') }}">หน้าหลัก</a>
                    </li>

                    @if (Auth::user()->position_id == 1 || Auth::user()->position_id == 4)
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->routeIs('table_admin*') ? 'active' : '' }}"
                                href="{{ route('table_admin') }}">จัดการโต๊ะ</a>
                        </li>
                    @endif

                    @if (Auth::user()->position_id == 1 || Auth::user()->position_id == 3)
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->routeIs('menulist*') ? 'active' : '' }}"
                                href="{{ route('menulist') }}">รายการอาหารของลูกค้า</a>
                        </li>
                    @endif

                    @if (Auth::user()->position_id == 1 || Auth::user()->position_id == 2)
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->is('empdata*') ? 'active' : '' }}"
                                href="/empdata">ข้อมูลพนักงาน</a>
                        </li>
                    @endif

                    @if (Auth::user()->position_id == 1 || Auth::user()->position_id == 5)
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->is('showstock*') || request()->has('search') ? 'active' : '' }}"
                                href="{{ route('showstock') }}">จัดการเมนู</a>
                        </li>
                    @endif

                    @if (Auth::check() &&(Auth::user()->position_id == 1 || Auth::user()->position_id == 2 || Auth::user()->position_id == 4))
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->is('allbill*') || (request()->has('sbill') || request()->has('stabel')) ? 'active' : '' }}"
                                href="{{ route('all_bill.showBill') }}">บิลทั้งหมด</a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                        class="bi bi-person"></i> Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <button class="dropdown-item" type="submit" @click.prevent="$root.submit();">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- คัวเมนูหน้าแอดมิน -->
    @yield('fixcon')
    <div class="row">
        @yield('menu')
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
