
@extends('layouts/admin')

@section('title', 'Page d\'accueil')

@section('content')





<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <div class="w-full mt-1">
            <div class="bg-white overflow-auto">
                <div class="sm:px-6 w-full">
                    <div class="px-4 md:px-10 py-4 md:py-7">
                        <div class="flex items-center justify-between">
                            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Reclamation</p>
                        </div>
                    </div>
                    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                        <div class="sm:flex items-center justify-between">
                            <div class="flex items-center">
                                <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href="{{route('dashboard')}}">
                                    <div class="py-2 px-4 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                        <p>Recemment</p>
                                    </div>
                                </a>
                                <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="{{route('AdAccepter')}}">
                                    <div class="py-2 px-4 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                        <p>Accepte</p>
                                    </div>
                                </a>
                                <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="{{route('AdRejecter')}}">
                                    <div class=" py-2 px-4 bg-indigo-100 text-indigo-700 rounded-full ">
                                        <p>Rejecter</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mt-7 overflow-x-auto">
                            <table class="w-full whitespace-nowrap ">
                                <tbody>
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">Bouikourdassen Oussama</p>
                                            </div>
                                        </td>

                                        <td class="pl-5">
                                            <button class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">today at 18:00</button>
                                        </td>
                                        <td class="pl-4">
                                            <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection




