
@extends('layouts/professeur')

@section('title', 'Page d\'accueil')

@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <div class="w-full mt-1">
            <div class="bg-white rounded-lg overflow-hidden">
                <section class="container mb-4 pt-3 px-4 mx-auto">
                    <div class="flex items-center gap-x-3">
                        <p tabindex="0"
                            class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                            Reclamation</p>
                    </div>
                    <div class="mt-6 md:flex md:items-center md:justify-between">
                        <div
                            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse ">

                            <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100 "
                                    href="{{ route('dashboard') }}">
                                    <div  class="">
                                        <p>Recemment</p>
                                    </div>
                                </a>
                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm"
                                    href="{{ route('Accepter') }}">
                                    <div class="">
                                        <p>Accepte</p>
                                    </div>
                                </a>
                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100"
                                    href="{{ route('Rejecter') }}">
                                    <div class="">
                                        <p>Rejecter</p>
                                    </div>
                                </a>

                        </div>

                        <div class="relative flex items-center mt-4 md:mt-0">
                            <form class="flex items-center max-w-sm mx-auto" action="{{ route('Accepter') }}"
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
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Teams</th>
                                                <th scope="col"
                                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <div class="flex items-center gap-x-3">
                                                        <span class="ml-2">Nom/Prenom</span>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Email address</th>


                                                <th scope="col"
                                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <div class="flex items-center gap-x-2">
                                                        <span>Status</span>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <div class="flex items-center gap-x-2">
                                                        <span>Date</span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="relative py-3.5 px-4">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 ">
                                            @foreach ($Reclames as $reclamer)
                                            @if ($reclamer->status == 1)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-2">

                                                            <p
                                                                class="px-3 py-1 text-xs text-blue-500 rounded-full  bg-blue-100/60">
                                                                {{ $reclamer->N_etud }}</p>

                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <div class="flex items-center ml-3 gap-x-2">

                                                                <div>
                                                                    <h2 class="font-medium text-gray-800 ">
                                                                        {{ $reclamer->etuPrenom }}
                                                                    </h2>
                                                                    <p class="text-sm font-normal text-gray-600">
                                                                        {{ $reclamer->etuNom }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ $reclamer->Nemail }}
                                                    </td>

                                                    <td
                                                        class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        {{-- @if ($reclamer->status == 1) --}}
                                                            <div
                                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-green-100/60 ">
                                                                <span
                                                                    class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                                <h2 class="text-sm font-normal text-green-500">
                                                                    Accepter</h2>
                                                            </div>
                                                        {{--@elseif ($reclamer->status == 0)
                                                            <div
                                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60">
                                                                <span
                                                                    class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                <h2 class="text-sm font-normal text-red-500">Refuser
                                                                </h2>
                                                            </div>
                                                        @else
                                                            <div
                                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-gray-200/60">
                                                                <span
                                                                    class="h-1.5 w-1.5 rounded-full bg-gray-500"></span>
                                                                <h2 class="text-sm font-normal text-gray-500">En attente
                                                                </h2>
                                                            </div>--}}
                                                        {{-- @endif --}}

                                                    </td>

                                                    <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        reçu l'
                                                        {{-- {{ $reclamer->created_at->format('d/m/Y H:i') }} --}}
                                                        @if ($reclamer->created_at->isToday())
                                                        Aujourd'hui à {{ $reclamer->created_at->format('H:i') }}
                                                        @elseif($reclamer->created_at->isYesterday())
                                                            hier à {{ $reclamer->created_at->format('H:i') }}
                                                        @else
                                                            {{ $reclamer->created_at->format('d/m H:i') }}
                                                        @endif

                                                    </td>

                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div x-data="{ isOpen: false }"
                                                                    {{-- class="flex items-center justify-center " --}}
                                                                    >
                                                                    <!-- Button to open modal -->
                                                                    <button @click="isOpen = true" type="button"
                                                                        title="détail"
                                                                        class="text-gray-500 transition-colors duration-200 hover:text-yellow-500 focus:outline-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                        </svg>
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div x-show="isOpen"
                                                                        @keydown.escape.window="isOpen = false"
                                                                        class="relative z-10"
                                                                        aria-labelledby="modal-title" role="dialog"
                                                                        aria-modal="true" style="display: none;">
                                                                        <div
                                                                            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                                        </div>
                                                                        <div
                                                                            class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                                            <div
                                                                                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                                                <div
                                                                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                                    <div
                                                                                        class="bg-white w-40 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                                        <div
                                                                                            class="sm:flex sm:items-start">
                                                                                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17V11" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="#1C274C"></circle> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                                                                            </div>

                                                                                            <div
                                                                                                class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                                                <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                                                                    id="modal-title">{{ $reclamer->etudiantsPrenom }}
                                                                                                    {{ $reclamer->etudiantsNom }}
                                                                                                </h3>
                                                                                                <div class="mt-2">
                                                                                                    <p
                                                                                                        class="text-sm text-gray-500">
                                                                                                        {{ $reclamer->remarqueEtudiant }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                                        <a href="{{ route('professeur.edit', ['id' => $reclamer->id]) }}"
                                                                                            class="w-full px-4 py-2 mt-1 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:w-auto sm:mt-0 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                                            Repondre
                                                                                        </a>
                                                                                        <button @click="isOpen = false"
                                                                                            type="button"
                                                                                            class="mt-3 mr-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </div>
        </div>
    </main>


</div>

<style>
    .black-overlay {
        background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (last parameter) for transparency */
    }
</style>

            </div>
        </div>
    </main>
</div>

@endsection




