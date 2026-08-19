<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="../../logo.png">
    <title>Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

    .font-family-karla {
        font-family: karla;
    }

    .bg-sidebar {
        background: #801818;
    }

    .cta-btn {
        color: #801818;
    }

    .upgrade-btn {
        background: #d7d3c2;
    }

    .upgrade-btn:hover {
        background: #0038fd;
    }

    .active-nav-link {
        background: #d7d3c2;
    }

    .nav-item:hover {
        background: #d7d3c2;
    }

    .account-link:hover {
        background: #801818;
    }
</style>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl overflow-auto">
        <div class="p-4">
            <a href="{{ route('dashboard') }}" :active="request() - > routeIs('dashboard')"
                class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                <img src="../../logo.png" class="w-12 md:w-16 rounded-full mx-auto" />
            </a>
        </div>
        <div class="p-4 ">
            <hr class="">
        </div>
        <div
            class="inline-flex w-48 ml-4 items-center p-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
            <i class="fas fa-user mr-3 ml-2" style=" font-size: 20px; line-height: 20px;"></i>
            <div></div>
            <div class="ms-3">
                <h6 class="mb-0 text-md text-Ahmar">{{ Auth::user()->name }}</h6>
                <span class="text-Ahmar">Admin</span>
            </div>
        </div>
        <div class="p-2">
            <hr class="">
        </div>
        <nav class="text-white mt-6 text-base font-semibold">
            <h3 class="px-4 text-md tracking-wider text-hmer uppercase">PAGES</h3>


            <a href="{{ route('dashboard') }}" title=""
                class="flex peer relative w-full items-center border-l-red-600 py-3 px-4 text-hmer outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-500 focus:border-l-4">
                <svg class="mr-4 h-5 w-5 align-middle" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        class=""></path>
                </svg>
                Dashboard
            </a>

            <div class="relative transition">
                <input class="peer hidden" type="checkbox" id="menu-1" />
                <a
                    class="flex peer relative w-full items-center border-l-red-600 py-3 px-4 text-hmer outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-500 focus:border-l-4">
                    <svg fill="currentColor" class="mr-4 h-5 w-5 align-middle" viewBox="0 0 36 36" version="1.1"
                        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>form-line</title>
                            <path
                                d="M21,12H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H21a1,1,0,0,1,1,1v4A1,1,0,0,1,21,12ZM8,10H20V7.94H8Z"
                                class="clr-i-outline clr-i-outline-path-1"></path>
                            <path
                                d="M21,14.08H7a1,1,0,0,0-1,1V19a1,1,0,0,0,1,1H18.36L22,16.3V15.08A1,1,0,0,0,21,14.08ZM20,18H8V16H20Z"
                                class="clr-i-outline clr-i-outline-path-2"></path>
                            <path
                                d="M11.06,31.51v-.06l.32-1.39H4V4h20V14.25L26,12.36V3a1,1,0,0,0-1-1H3A1,1,0,0,0,2,3V31a1,1,0,0,0,1,1h8A3.44,3.44,0,0,1,11.06,31.51Z"
                                class="clr-i-outline clr-i-outline-path-3"></path>
                            <path d="M22,19.17l-.78.79A1,1,0,0,0,22,19.17Z" class="clr-i-outline clr-i-outline-path-4">
                            </path>
                            <path d="M6,26.94a1,1,0,0,0,1,1h4.84l.3-1.3.13-.55,0-.05H8V24h6.34l2-2H7a1,1,0,0,0-1,1Z"
                                class="clr-i-outline clr-i-outline-path-5"></path>
                            <path
                                d="M33.49,16.67,30.12,13.3a1.61,1.61,0,0,0-2.28,0h0L14.13,27.09,13,31.9a1.61,1.61,0,0,0,1.26,1.9,1.55,1.55,0,0,0,.31,0,1.15,1.15,0,0,0,.37,0l4.85-1.07L33.49,19a1.6,1.6,0,0,0,0-2.27ZM18.77,30.91l-3.66.81L16,28.09,26.28,17.7l2.82,2.82ZM30.23,19.39l-2.82-2.82L29,15l2.84,2.84Z"
                                class="clr-i-outline clr-i-outline-path-6"></path>
                            <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
                        </g>
                    </svg>
                    Formes
                    <label for="menu-1" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-0 top-4 ml-auto mr-5 h-4 text-red transition peer-checked:rotate-180 peer-hover:text-red-600"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                <ul
                    class="duration-400 flex m-2 max-h-0 flex-col overflow-hidden rounded-xl bg-[#f5f4f0] font-medium transition-all duration-300 peer-checked:max-h-96">
                    <li
                        class="flex m-2 cursor-pointer border-l-red-600 py-3 pl-5 text-sm text-red-400 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-600">
                        <a href="{{ route('AdEtudiant') }}" class="mr-5">
                            <i class="fas fa-user-graduate mr-3"></i>
                            <span class="ml-3">Etudiant</span>
                        </a>
                    </li>
                    <li
                        class="flex m-2 cursor-pointer border-l-red-600 py-3 pl-4 text-sm text-red-400 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-600">
                        <a href="{{ route('AdProfesseur') }}" class="mr-5">
                            <i class="fas fa-chalkboard-teacher mr-3"></i>
                            <span class="ml-3">Professeur</span>
                        </a>
                    </li>
                    <li
                        class="flex m-2 cursor-pointer border-l-red-600 py-3 pl-5 text-sm text-red-400 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-600">
                        <a href="{{ route('Add') }}" class="">
                            <i class="fas fa-plus-circle mr-3"></i>

                            <span class="ml-3">Ajouter S/M/M</span>
                        </a>
                    </li>
                </ul>
            </div>
            <h3 class="px-4 text-md tracking-wider text-hmer uppercase">PARAMETRE </h3>

            <div class="relative mt-2 transition">
                <input class="peer hidden" type="checkbox" id="menu-2" />
                <a
                    class="flex peer relative w-full items-center border-l-red-600 py-3 px-4 text-hmer outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-500 focus:border-l-4">
                    <span class="flex mr-5 w-5">
                        <i class="fas fa-cog"></i>
                    </span>
                    Parametre
                    <label for="menu-2" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-0 top-4 ml-auto mr-5 h-4 text-red transition peer-checked:rotate-180 peer-hover:text-red-600"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                <ul
                    class="duration-400 flex m-2 max-h-0 flex-col overflow-hidden rounded-xl bg-[#f5f4f0] font-medium transition-all duration-300 peer-checked:max-h-96">
                    {{-- <li
                        class="flex m-2 cursor-pointer border-l-red-600 py-3 pl-5 text-sm text-red-400 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-600">
                        <a href="{{ route('editPass') }}" class="mr-5">
                            <i class="fas fa-edit mr-3"></i>
                            <span class="ml-3">Modifier le mote de passe </span>
                        </a>
                    </li> --}}

                    <li
                        class="flex m-2 cursor-pointer border-l-red-600 py-3 pl-4 text-sm text-red-400 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-600">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('') }}<i class="fas fa-sign-out-alt mr-2"></i>
                                <span class="ml-3">Déconnecter</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-x-hidden ">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-[#801818] py-3 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <form method="POST" action="{{ route('admin.toggle.middleware') }}">
                    @csrf
                    <button name="status" id="toggle-middleware-btn"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150
                        {{ $accessActive ? 'text-white bg-red-300 hover:text-red-700' : 'text-white bg-green-500  hover:text-green-700' }}">
                        demarer les sites
                    </button>
                    {{-- @if ($accessActive)
                    <p>L'accès est désactivé.</p>
                    @else
                        <p>L'accès est activé.</p>

                    @endif --}}
                </form>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard') }}"
                    class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                    <img src="../../logo.png" class="w-12 md:w-16 rounded-full mx-auto" />
                </a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ url('/Admin') }}"
                    class="flex items-center opacity-75 hover:opacity-100 text-white py-2 pl-4 nav-item">
                    <i class="fas fa-envelope mr-3"></i>
                    Reclamation
                </a>

                <a href="{{ url('Etudiant') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Etudiant
                </a>
                <a href="{{ url('/AdProfesseur') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-chalkboard-teacher mr-3"></i>
                    Professeur
                </a>
                <a href=""
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-plus-circle mr-3"></i>
                    Ajouter S/Mo/Ma
                </a>
                <a href=""
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-edit mr-3"></i>
                    Modifier le mote de passe
                </a>
                <form method="POST" action="{{ route('logout') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    @csrf
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('se déconnecter') }}

                    </a>
                </form>
                <div
                    class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-user-cog mr-3"></i> Admin
                </div>
            </nav>

        </header>

        @yield('content')
    </div>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


</body>

</html>
