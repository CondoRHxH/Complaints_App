@extends('layouts/admin')

@section('title', 'Page d\'accueil')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <section class="w-full flex-grow p-2">
            <div class="w-full">
                <div class="bg-white p-3 rounded-lg overflow-hidden">
                    <div class="sm:flex mb-3 sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-xl font-medium  text-gray-800 ">Etudiant</h2>
                                <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full ">{{ $Etudiants->total() }}</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500 ">These companies have purchased in the last 12 months.</p>
                        </div>
                        <form class="flex items-center mt-4 gap-x-3" action="{{ route('AdEtud') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center justify-between">
                                <div class="ml-10 space-x-8 lg:ml-40">
                                    <div class="flex items-center space-x-2">
                                        <label for="fileInput"
                                            class="flex items-center space-x-2 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-300 ease-in-out">
                                            <i class="fas fa-file-upload"></i>
                                            <span>Choose File</span>
                                        </label>
                                        <input id="fileInput" type="file" name="file" accept=".xls, .xlsx"
                                            class="hidden">
                                        <button type="submit"
                                            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto  hover:bg-gray-100 ">
                                            <svg class="h-6 w-6" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polyline points="16 32 32 48 48 32"></polyline><line x1="56" y1="56" x2="8" y2="56"></line><line x1="32" y1="8" x2="32" y2="48"></line></g></svg>
                                            <span>Import</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-end mt-4 md:mt-0">

                        <a class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto  hover:bg-gray-100"
                            href="{{route("ExportEtud")}}">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 20C7.58172 20 4 16.4183 4 12M20 12C20 14.5264 18.8289 16.7792 17 18.2454" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 14L12 4M12 4L15 7M12 4L9 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            Export</a>
                    </div>
                    <div class="mt-6 md:flex md:items-center md:justify-between">
                        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg  rtl:flex-row-reverse ">
                            <form action="{{ route('delete.allE') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600">
                                    <i class="fas fa-trash"></i>
                                    <span>Supprimer la table</span>
                                </button>
                            </form>
                        </div>
                        @if (Session::has('message'))
                            <script>
                                swal("Message", "{{ Session::get('message') }}", 'success', {
                                    button: true,
                                    button: "OK",
                                    timer: 3000,
                                    dangerMode: true,
                                });
                            </script>
                        @endif

                        @if (session('success'))
                            <div class="z-[1050] w-full  m-2 my-8 max-w-sm rounded-lg border border-gray-100 items-center rounded-lg px-12 py-6 bg-white shadow-md fixed block animate-[fade-out_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none"
                                role="alert" id="placement-example" data-twe-alert-init="" data-twe-position="top-right"
                                data-twe-width="538px" data-twe-autohide="true" data-twe-delay="5000"
                                style="width: 538px; top: 10px; right: 10px; bottom: unset; left: 50%; transform: translate(-50%);">

                                <button class="absolute top-0 right-0 p-4 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <p class="relative mb-1 text-sm font-medium">
                                    <span
                                        class="absolute -left-7 flex h-5 w-5 items-center justify-center rounded-xl bg-green-400 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-700">Saved successfuly!</span>
                                </p>
                                <p class="text-sm text-gray-600">{{ session('success') }}</p>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const modal = document.getElementById('placement-example');
                                    const closeButton = modal.querySelector('.text-gray-400');
                                    const closeModal = () => {
                                        modal.style.display = 'none';
                                    };
                                    closeButton.addEventListener('click', closeModal);
                                    setTimeout(closeModal, 3000);
                                });
                            </script>
                        @endif

                        @if (session()->has('error'))
                            <div class="z-[1050] w-full  m-2 my-8 max-w-sm rounded-lg border border-gray-100 items-center rounded-lg px-12 py-6 bg-white shadow-md fixed block animate-[fade-out_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none"
                                role="alert" id="placement-example" data-twe-alert-init="" data-twe-position="top-right"
                                data-twe-width="538px" data-twe-autohide="true" data-twe-delay="5000"
                                style="width: 538px; top: 10px; right: 10px; bottom: unset; left: 50%; transform: translate(-50%);">
                                <button class="absolute top-0 right-0 p-4 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <p class="relative mb-1 text-sm font-medium">
                                    <span
                                        class="absolute -left-7 flex h-5 w-5 items-center justify-center rounded-xl bg-red-400 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-700">Save Failed!</span>
                                </p>
                                <span class="block sm:inline ml-3">{{ session('error') }}</span>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const modal = document.getElementById('placement-example');
                                    const closeButton = modal.querySelector('.text-gray-300');
                                    const closeModal = () => {
                                        modal.style.display = 'none';
                                    };
                                    closeButton.addEventListener('click', closeModal);
                                    setTimeout(closeModal, 3000);
                                });
                            </script>
                        @endif


                        <div class="relative flex items-center mt-4 md:mt-0">
                            <form class="flex items-center max-w-sm mx-auto" action="{{ route('AdEtudiant') }}"
                                method="GET">
                                @csrf
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </span>

                                <input type="text" name="search" placeholder="Search" value="{{ old('search') }}"
                                    class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                <button type="submit"
                                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200  md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 ">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <div class="flex items-center gap-x-3 focus:outline-none">
                                                        <span>N_appose</span>
                                                    </div>
                                                </th>

                                                <th scope="col"
                                                    class="px-12 py-3 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                    Email
                                                </th>

                                                <th scope="col"
                                                    class="px-10 py-3 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                    Nom / Prenome
                                                </th>

                                                <th scope="col"
                                                    class="px-4 py-3 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                    Niveai
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                    Filier
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                    Groupe
                                                </th>
                                                <th scope="col" class="relative py-3 px-4">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 ">
                                            @foreach ($Etudiants as $Etudiant)
                                                <tr>

                                                    <td class="px-4 py-1 text-sm font-medium whitespace-nowrap">
                                                        <div
                                                            class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60">
                                                            {{ $Etudiant->N_appose }}
                                                        </div>
                                                    </td>
                                                    <td class="px-4  text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-sm text-gray-700 ">{{ $Etudiant->Email }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-12  text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800 ">{{ $Etudiant->Prenom }}
                                                                / {{ $Etudiant->Nom }}</h2>
                                                            {{-- <p class="text-sm font-normal text-gray-600"> {{ $Etudiant->Nom }}</p> --}}
                                                        </div>
                                                    </td>

                                                    <td class="px-4  text-sm whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $Etudiant->Niveau }}
                                                        </div>
                                                    </td>

                                                    <td class="px-4  text-sm whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $Etudiant->Filiere }}
                                                        </div>
                                                    </td>
                                                    <td class="px-4 text-sm whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $Etudiant->Groupe }}
                                                        </div>
                                                    </td>

                                                    <td class="px-5 py-1 text-sm whitespace-nowrap">

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 sm:flex sm:items-center sm:justify-between">
                        <div class="text-sm text-gray-500">
                            Page <span class="font-medium text-gray-700">{{ $Etudiants->firstItem() }} -
                                {{ $Etudiants->lastItem() }} of {{ $Etudiants->total() }}</span>
                        </div>

                        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                            @if ($Etudiants->previousPageUrl())
                                <a href="{{ $Etudiants->appends(['seaarch' => request('seaarch')])->previousPageUrl() }}"
                                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>

                                    <span>
                                        Previous
                                    </span>
                                </a>
                            @endif

                            @if ($Etudiants->nextPageUrl())
                                <a href="{{ $Etudiants->appends(['seaarch' => request('seaarch')])->nextPageUrl() }}"
                                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                                    <span>
                                        Next
                                    </span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
