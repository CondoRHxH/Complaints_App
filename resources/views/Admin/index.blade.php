@extends('layouts/admin')

@section('title', 'Page d\'accueil')

@section('content')

    <div class="w-full border-t flex flex-col overflow-hidden">
        <main class="w-full flex-grow p-2">
            <div class="w-full mt-1">

                <div class="bg-white drop-shadow-md rounded-lg overflow-y-auto">
                    <div class="sm:px-6 w-full">
                        <div id="24h" class="mt-4">
                            <h1 class="text-2xl font-medium text-red-500 sm:text-3xl">Dashboard</h1>
                            <div class="hidden mt-3 overflow-y-auto text-sm lg:items-center lg:flex whitespace-nowrap">
                                <a href="#" class="text-hmer hover:underline">
                                    Pages
                                </a>
                                <span class="mx-1 text-gray-500">
                                    /
                                </span>

                                <a href="#" class="text-[#e75d5e] hover:underline">
                                    Dashboard
                                </a>
                            </div>
                            <div id="stats" class="mt-6 grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="bg-[#801818] p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[#e75d5e] text-sm font-medium uppercase leading-4">Etudiant</p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>{{ count($etudiantCount->toArray()) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[#801818] p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>

                                        </div>
                                        <div>
                                            <p class="text-[#e75d5e] text-sm font-medium uppercase leading-4">Réclamation
                                            </p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>{{ count($Reclam->toArray()) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[#801818] p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[#e75d5e] text-sm font-medium uppercase leading-4">Professeur
                                            </p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>{{ $professeurs }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex pt-5 pb-5 items-center justify-between">
                            <p tabindex="0"
                                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-red-500">
                                Reclamation</p>

                        </div>
                        <div class="flex-1 px-2" x-data="{ checkAll: false, filterMessages: false }">
                            <div class="h-16 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="relative flex p-2 bg-gray-300 rounded-lg p-1 px-6 items-center space-x-0.5">
                                        <button class="flex" @click="filterMessages = !filterMessages">
                                            <p @click="checkAll = !checkAll" class="text-white">Status</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-6 w-5 p-1"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>

                                        <div x-show="filterMessages" @click.away="filterMessages = false"
                                        class="bg-gray-200 shadow-2xl absolute left-0 top-12 w-40 py-2 text-gray-900 rounded z-10"
                                        style="display: none;">
                                        <ul class="p-2 space-y-3 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                                            <li class="hover:bg-gray-300 rounded-lg ">
                                                <div class="flex items-center">
                                                    <a href="{{ route('dashboard', ['status' => null]) }}" class="text-sm "><i class="fas fa-envelope ml-3 mr-5"></i>
                                                        All
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="hover:bg-gray-300 rounded-lg ">
                                                <div class="items-center">
                                                    <a href="{{ route('dashboard', ['status' =>0]) }}" class="flex text-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 pt-1 ml-2 mr-5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                    </svg>
                                                        En attente
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="hover:bg-gray-300 rounded-lg ">
                                                <div class="flex items-center">
                                                    <a href="{{ route('dashboard',['status'=> 1]) }}" class="flex text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 mr-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                        d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                    </svg>
                                                    Accepté</a>
                                                </div>
                                              </li>
                                              <li class="hover:bg-gray-300 rounded-lg ">
                                                <div class="flex items-center">
                                                    <a href="{{ route('dashboard', ['status' => 2]) }}" class="flex text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 mr-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                        Rejecter
                                                    </a>
                                                </div>
                                              </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex items-center ml-3">

                                            <form id="reloadForm" action="{{ route('dashboard') }}" method="GET">
                                                @csrf
                                                <button title="Reload" type="submit"
                                                    class="text-gray-700 px-2 py-1 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                        <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>
                                        <form class="flex items-center max-w-sm mx-auto" action="{{ route('dashboard') }}"
                                            method="GET">
                                            @csrf
                                            <input type="text" name="seaarch" placeholder="Search"
                                                value="{{ old('seaarch') }}"
                                                class="block w-2/3 py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 pl-5 rtl:pr-11 rtl:pl-5 focus:border-blue-400  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                            <button type="submit"
                                                class="p-2.5 ms-2 text-sm font-medium text-white bg-gray-300 rounded-lg border hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                                <span class="sr-only">Search</span>
                                            </button>
                                        </form>


                                    </div>
                                </div>
                                <div class="px-2 flex items-center space-x-4">
                                    <!-- Displaying pagination info -->
                                    <span class="text-sm text-gray-500">
                                        {{ $Reclamers->firstItem() }}-{{ $Reclamers->lastItem() }} of
                                        {{ $Reclamers->total() }}
                                    </span>

                                    <!-- Previous Page Button -->
                                    @if ($Reclamers->previousPageUrl())
                                        <a href="{{ $Reclamers->previousPageUrl() }}"
                                            class="bg-gray-200 text-gray-400 p-1.5 rounded-lg" title="Previous Page">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endif

                                    <!-- Next Page Button -->
                                    @if ($Reclamers->nextPageUrl())
                                        <a href="{{ $Reclamers->nextPageUrl() }}"
                                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150"
                                            title="Next Page">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                {{-- <div class="px-2 flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">1-15 of 1,323</span>
                                    <div class="flex items-center space-x-2">
                                        <button class="bg-gray-200 text-gray-400 p-1.5 rounded-lg" title="Newer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <button
                                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150"
                                            title="Older">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="bg-gray-100 mb-6">
                                @if ($Reclamers->isEmpty())
                                    <div class="flex flex-col w-full p-12 max-w-sm px-4 mx-auto h-[290px] mx-auto">
                                        <div class="p-2 w-1/2 p-4 mx-auto text-center border text-blue-500 bg-red-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                            <h1 class="mt-3 text-lg text-gray-800 ">Aucune réclamation trouvée</h1>
                                        </div>

                                    </div>
                                @else
                                    <ul class="border-2 rounded-lg overflow-y-auto max-h-80 h-[290px]">
                                        @foreach ($Reclamers as $Reclamer)
                                            <li class="flex items-center border-y hover:bg-gray-200 px-2">
                                                {{-- <input type="checkbox" class="focus:ring-0 border-2 border-gray-400" :checked="checkAll"> --}}
                                                <div x-data="{ messageHover: false }" @mouseover="messageHover = true"
                                                    @mouseleave="messageHover = false"
                                                    class="w-full flex items-center justify-between p-1 my-1 cursor-pointer">
                                                    <div class="flex items-center">
                                                        <div class="flex items-center mr-4 ml-1 space-x-1">
                                                            <div>
                                                                @if ($Reclamer->status == 1)
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-green-500" viewBox="0 0 20 20"
                                                                        fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                @elseif ($Reclamer->status == 2)
                                                                {{-- 1 =  --}}
                                                                {{-- 2 =  --}}
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-red-500" viewBox="0 0 20 20"
                                                                        fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    @elseif ($Reclamer->status == 0)
                                                                    {{-- 0 = En attende --}}
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="text-gray-500 hover:text-gray-900 h-6 w-6"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                        </path>
                                                                    </svg>
                                                                @endif

                                                            </div>
                                                            {{-- <button title="Click to mark this email as important">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="text-gray-500 hover:text-gray-900 h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z">
                                                                </path>
                                                            </svg>
                                                        </button> --}}

                                                        </div>
                                                        <span class="w-56 pr-2 truncate">{{ $Reclamer->Etudiant->Nom }}
                                                            {{ $Reclamer->Etudiant->Prenom }}</span>
                                                        <span class="w-64 truncate">Lorem ipsum dolor sit amet Lorem ipsum
                                                            dolor sit, amet consectetur adipisicing elit. Saepe numquam
                                                            molestias quo ratione provident qui, blanditiis est aliquid
                                                            facilis
                                                            voluptatum adipisci quis sint officia ex maxime! Minima modi
                                                            nostrum
                                                            ratione.</span>
                                                        {{-- <span class="mx-1">-</span> --}}
                                                        <span class="w-96 text-gray-600 text-sm truncate"></span>
                                                    </div>
                                                    <div class="w-32 flex items-center justify-end">
                                                        <div x-show="messageHover" class="flex items-center space-x-2"
                                                            style="display: none;">
                                                            <a title="voir"
                                                                href="{{ route('Admin.show', ['Admin' => $Reclamer->reclamer_id]) }}">
                                                                <i
                                                                    class="fas fa-eye text-gray-500 hover:text-gray-900"></i>
                                                                {{-- <i class="far fa-eye text-gray-500 hover:text-gray-900"></i> --}}
                                                            </a>
                                                            <a title="Telecharger"
                                                                href="{{ route('generatePDF', ['id' => $Reclamer->reclamer_id]) }}"
                                                                class="btn btn-primary"> <i
                                                                    class="fas fa-download text-gray-500 hover:text-gray-900"></i>
                                                            </a>
                                                        </div>
                                                        <span x-show="!messageHover" class="text-sm text-gray-500">
                                                            {{ \Carbon\Carbon::parse($Reclamer->reclamer_created_at)->isToday() ? 'Today ' . \Carbon\Carbon::parse($Reclamer->reclamer_created_at)->format('H:i') : \Carbon\Carbon::parse($Reclamer->reclamer_created_at)->format('d/m/y H:i') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
