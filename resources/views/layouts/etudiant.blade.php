<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etudaint</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

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
        background: #6d071a;
    }

    .upgrade-btn:hover {
        background: #0038fd;
    }

    .active-nav-link {
        background: #6d071a;
    }

    .nav-item:hover {
        background: #6d071a;
    }

    .account-link:hover {
        background: #801818;
    }
</style>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="rounded-xl relative h-lg m-2 hidden sm:block shadow-xl bg-sidebar">
        <div class=" w-64 rounded-lg">
            <div class="p-4 mb-14">
                <a href="{{ route('dashboard') }}"
                    class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                    <img src="../../lo.png" class="w-12 md:w-20 mt-4 rounded-full mx-auto" />
                    <img src="../../go.png" class="w-12 md:w-24 mt-2 rounded-full mx-auto" />
                </a>
            </div>
            {{-- <div class="p-4">
                    <hr>
                </div> --}}
            {{-- <nav class="text-white text-base font-semibold pt-3"> --}}
            <nav class="text-white mx-2 mt-4 text-base font-semibold">
                <h3 class="px-4 mb-2 mt-5 text-md tracking-wider text-hmer uppercase">PAGES</h3>


                <a href="{{ route('dashboard') }}" title="Reclamation"
                    class="flex peer relative w-full items-center border-l-red-600 py-3 px-4 text-hmer outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-red-500 focus:border-l-4">
                    <svg class="mr-4 h-5 w-5 align-middle" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3 9L21 9M12 9V20M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.0799 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    Reclamation
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
                                <path d="M22,19.17l-.78.79A1,1,0,0,0,22,19.17Z"
                                    class="clr-i-outline clr-i-outline-path-4"></path>
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
                            <a href="{{ url('enRecla') }}" class="mr-2">
                                <svg class="mr-2 h-5 w-5 align-middle" viewBox="0 0 52 52"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <rect fill="none" height="4.8" rx="1.6" width="27.2" x="12.4"
                                            y="26"></rect>
                                        <rect fill="none" height="4.8" rx="1.6" width="24" x="12.4"
                                            y="35.6"></rect>
                                        <g>
                                            <path
                                                d="m36.4 14.8h8.48a1.09 1.09 0 0 0 1.12-1.12 1 1 0 0 0 -.32-.8l-10.56-10.56a1 1 0 0 0 -.8-.32 1.09 1.09 0 0 0 -1.12 1.12v8.48a3.21 3.21 0 0 0 3.2 3.2z">
                                            </path>
                                            <path
                                                d="m44.4 19.6h-11.2a4.81 4.81 0 0 1 -4.8-4.8v-11.2a1.6 1.6 0 0 0 -1.6-1.6h-16a4.81 4.81 0 0 0 -4.8 4.8v38.4a4.81 4.81 0 0 0 4.8 4.8h30.4a4.81 4.81 0 0 0 4.8-4.8v-24a1.6 1.6 0 0 0 -1.6-1.6zm-32-1.6a1.62 1.62 0 0 1 1.6-1.55h6.55a1.56 1.56 0 0 1 1.57 1.55v1.59a1.63 1.63 0 0 1 -1.59 1.58h-6.53a1.55 1.55 0 0 1 -1.58-1.58zm24 20.77a1.6 1.6 0 0 1 -1.6 1.6h-20.8a1.6 1.6 0 0 1 -1.6-1.6v-1.57a1.6 1.6 0 0 1 1.6-1.6h20.8a1.6 1.6 0 0 1 1.6 1.6zm3.2-9.6a1.6 1.6 0 0 1 -1.6 1.63h-24a1.6 1.6 0 0 1 -1.6-1.6v-1.6a1.6 1.6 0 0 1 1.6-1.6h24a1.6 1.6 0 0 1 1.6 1.6z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                Envoiyer Reclamation
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>


            {{-- <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-edit mr-3"></i>
                Modifier le mote de passe
            </a> --}}
            {{-- </nav> --}}
            <div class="absolute w-full rounded-b-lg bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-user-graduate mr-3"></i>
                Etudiant
            </div>
        </div>
    </aside>

    <div class="w-full flex flex-col h-screen mr-2 overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center rounded-lg bg-red-900 mt-2 py-5 px-10 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <div
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <i class="fas fa-user mr-3"></i>
                    <div>{{ Auth::user()->name }}</div>
                </div>
                <button
                    class="inline-flex items-center ml-2 pl-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('') }}<i class="fas fa-sign-out-alt text-red-500 mr-3"></i>
                        </a>
                    </form>
                </button>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard') }}"
                    class="text-white text-3xl font-semibold uppercase hover:text-gray-300"><img src="../../logo.png"
                        class="w-12 md:w-16 rounded-full mx-auto" /></a>

                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ url('Etudiant/Rclamer') }}"
                    class="flex items-center opacity-75 hover:opacity-100 text-white py-2 pl-4 nav-item">
                    <i class="fas fa-envelope mr-3"></i>
                    Reclamation
                </a>

                <a href="{{ url('Etudiant/Form') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Envoiyer un Reclamation
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
                    <i class="fas fa-user-graduate mr-3"></i> Etudiant
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
