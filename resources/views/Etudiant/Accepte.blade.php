{{-- @extends('layouts/etudiant')
@section('title', 'Page d\'accueil')
@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <div class="w-full mt-1">
                <div class="bg-white overflow-auto">
                    <div class="sm:px-6 w-full">
                        <div class="px-4 md:px-10 py-4 md:py-7">
                            <div class="flex items-center justify-between">
                                <p tabindex="0"
                                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                                    Reclamation</p>
                            </div>
                        </div>
                        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                            <div class="sm:flex items-center justify-between">
                                <div class="flex items-center">
                                    <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('dashboard') }}">
                                        <div
                                            class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>Recemment</p>
                                        </div>
                                    </a>
                                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('Acce') }}">
                                        <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full ">
                                            <p>Accepte</p>
                                        </div>
                                    </a>
                                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('Rejec') }}">
                                        <div
                                            class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                            <p>Rejeter</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-7 overflow-x-auto">
                                <table class="w-full whitespace-nowrap">
                                    <tbody>
                                        @foreach ($acceptedReclamers as $reclamer)
                                            <tr tabindex="0"
                                                class="focus:outline-none h-16 border border-gray-100 rounded">
                                                <td>
                                                    <div class="ml-5">
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="flex items-center pl-5">
                                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                            {{ $reclamer->professeurnom }} {{ $reclamer->professeurprenom }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="pl-24">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">
                                                    <button
                                                        class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                                        envoiyer le
                                                        {{ $reclamer->created_at->format('d') }}/{{ $reclamer->created_at->format('m') }}</button>
                                                </td>
                                                <td class="pl-4">
                                                    <button
                                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                                        {{-- <a href="{{ route('Etudiant.show', ['id' => $reclamer->id]) }}"> --}}
                                                            {{-- View
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection --}}
@extends('layouts/etudiant')
@section('title', 'Page d\'accueil')
@section('content')
    {{-- <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <div class="w-full mt-1">
                <div class="bg-white overflow-auto">
                    <div class="sm:px-6 w-full">
                        <div class="px-4 md:px-10 py-4 md:py-7">
                            <div class="flex items-center justify-between">
                                <p tabindex="0"
                                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                                    Reclamation</p>
                            </div>
                        </div>
                        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                            <div class="sm:flex items-center justify-between">
                                <div class="flex items-center">
                                    <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('dashboard') }}">
                                        <div  class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                            <p>Recemment</p>
                                        </div>
                                    </a>
                                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('Acce') }}">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>Accepte</p>
                                        </div>
                                    </a>
                                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                                        href="{{ route('Rejec') }}">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>Rejeter</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-7 overflow-x-auto">
                                <table class="w-full whitespace-nowrap">
                                    <tbody>
                                        @foreach ($PendingReclamers as $reclamer)
                                            <tr tabindex="0"
                                                class="focus:outline-none h-16 border border-gray-100 rounded">
                                                <td>
                                                    <div class="ml-5">
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="flex items-center pl-5">
                                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                            {{ $reclamer->professeurnom }} {{ $reclamer->professeurprenom }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="pl-24">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">

                                                </td>
                                                <td class="pl-5">
                                                    <button
                                                        class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                                        envoiyer le
                                                        {{ $reclamer->created_at->format('d') }}/{{ $reclamer->created_at->format('m') }}</button>
                                                </td>
                                                <td class="pl-4">
                                                    <button
                                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                                        <a href="{{ route('Etudiant.show', ['id' => $reclamer->id]) }}">
                                                            View
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> --}}
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-2">
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
                                    <div class="">
                                        <p>Recemment</p>
                                    </div>
                                </a>
                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm"
                                    href="{{ route('Acce') }}">
                                    <div class="">
                                        <p>Accepte</p>
                                    </div>
                                </a>
                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100"
                                    href="{{ route('Rejec') }}">
                                    <div class="">
                                        <p>Rejecter</p>
                                    </div>
                                </a>

                            </div>

                            <div class="relative flex items-center mt-4 md:mt-0">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </span>

                                <form class="flex items-center max-w-sm mx-auto" action="{{ route('Acce') }}" method="GET">
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
                                                    {{-- <th scope="col"
                                                        class="px-2 py-2 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        </th> --}}
                                                    <th scope="col"
                                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-600">
                                                        <div class="flex items-center gap-x-3">
                                                            <span class="ml-2">Nom/Prenom</span>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Email address</th>
                                                    <th scope="col"
                                                        class="px-14 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600">
                                                        <div class="flex items-center gap-x-2">
                                                            <span>Status</span>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600">
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
                                                @foreach ($acceptedReclamers as $reclamer)
                                                @if ($reclamer->status == 1)
                                                        <tr>
                                                            {{-- <td class="px-1 py-1 text-sm whitespace-nowrap">
                                                                <div class="flex items-center gap-x-2">
                                                                    <p
                                                                        class="px-3 py-1 text-xs text-blue-500 rounded-full  bg-blue-100/60">
                                                                        {{ $reclamer->nt }}
                                                                    </p>

                                                                </div>
                                                            </td> --}}
                                                            <td
                                                                class="px-4 py-3 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div class="inline-flex items-center gap-x-3">
                                                                    <div class="flex items-center ml-3 gap-x-2">
                                                                        <div>
                                                                            <h2 class="font-medium text-gray-800 ">
                                                                                {{ $reclamer->professeurprenom }}
                                                                            </h2>
                                                                            <p class="text-sm font-normal text-gray-600">
                                                                                {{ $reclamer->professeurnom }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-gray-800 whitespace-nowrap">
                                                                {{ $reclamer->professeurpreEmail }}
                                                            </td>
                                                            <td
                                                                class="px-10 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div
                                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-green-100/60 ">
                                                                <span
                                                                    class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                                <h2 class="text-sm font-normal text-green-500">
                                                                    Accepter</h2>
                                                            </div>
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-gray-800 whitespace-nowrap">

                                                                @if ($reclamer->created_at->isToday())
                                                                    Aujourd'hui à {{ $reclamer->created_at->format('H:i') }}
                                                                @elseif($reclamer->created_at->isYesterday())
                                                                    hier à {{ $reclamer->created_at->format('H:i') }}
                                                                @else
                                                                    {{ $reclamer->created_at->format('d/m H:i') }}
                                                                @endif
                                                            </td>
                                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                                <div class="flex items-center gap-x-6">
                                                                    <button
                                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 hover:text-red-500 focus:outline-none">
                                                                        <i class=" text-blue-500 fas fa-eye"></i>

                                                                    </button>
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
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust the alpha value (last parameter) for transparency */
        }
    </style>




@endsection

