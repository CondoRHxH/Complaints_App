@extends('layouts/etudiant')
@section('title', 'Page d\'accueil')
@section('content')


    <style>
        /* Hide the modal by default */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* Close button */
        .close {
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-2">
            <div class="w-full mt-1">

                <div class="bg-white rounded-lg overflow-hidden">

                    @if(session('success'))
                    <div class="z-[1050] w-full  m-2 my-8 max-w-sm rounded-lg border border-gray-100 items-center rounded-lg px-12 py-6 bg-white shadow-md fixed block animate-[fade-out_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none" role="alert" id="placement-example" data-twe-alert-init="" data-twe-position="top-right" data-twe-width="538px" data-twe-autohide="true" data-twe-delay="5000" style="width: 538px; top: 10px; right: 10px; bottom: unset; left: 50%; transform: translate(-50%);">

                        <button class="absolute top-0 right-0 p-4 text-gray-400">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                        <p class="relative mb-1 text-sm font-medium">
                          <span class="absolute -left-7 flex h-5 w-5 items-center justify-center rounded-xl bg-green-400 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
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

                            // Function to close the modal
                            const closeModal = () => {
                                modal.style.display = 'none'; // Hide the modal
                            };

                            // Add click event listener to close button
                            closeButton.addEventListener('click', closeModal);

                            // Auto-hide the modal after 5 seconds
                            setTimeout(closeModal, 5000);
                        });
                    </script>

                    @endif
{{-- <div class="z-[1050] w-full items-center rounded-lg  px-6 py-5 fixed block animate-[fade-out_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none" role="alert" id="placement-example" data-twe-alert-init="" data-twe-position="top-right" data-twe-width="538px" data-twe-autohide="true" data-twe-delay="5000" style="width: 538px; top: 10px; right: 10px; bottom: unset; left: 50%; transform: translate(-50%);">
    Show me wherever you want!
  </div> --}}
                    <section class="container mb-4 pt-3 px-4 mx-auto">
                        <div class="flex items-center gap-x-3">
                            <p tabindex="0"
                                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                                Reclamation</p>
                        </div>
                        <div class="mt-6 md:flex md:items-center md:justify-between">
                            <div
                                class="inline-flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse ">

                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm "
                                    href="{{ route('dashboard') }}">
                                    <div class="">
                                        <p>Recemment</p>
                                    </div>
                                </a>
                                <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100"
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

                                <form class="flex items-center max-w-sm mx-auto" action="{{ route('dashboard') }}" method="GET">
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
                            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="border border-gray-200  md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50 ">
                                                <tr>
                                                    {{-- <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Identifiant</th> --}}
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
                                                        class="px-14 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
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
                                            <tbody class="bg-white relative bg-white rounded-lg overflow-hidden shadow-xl max-w-screen-md w-full divide-y divide-gray-200">
                                                @foreach ($PendingReclamers as $reclamer)
                                                    @if ($reclamer->status != 1 && $reclamer->status != 2)
                                                        <tr>
                                                            {{-- <td class="px-4 py-4 text-sm whitespace-nowrap">
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
                                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                                {{ $reclamer->professeurEmail }}
                                                            </td>
                                                            <td
                                                                class="px-10 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div
                                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-gray-200/60">
                                                                    <span
                                                                        class="h-1.5 w-1.5 rounded-full bg-gray-500"></span>
                                                                    <h2 class="text-sm font-normal text-gray-500">En attente
                                                                    </h2>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
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
                                                                    {{-- <button
                                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 hover:text-red-500 focus:outline-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                                            stroke="currentColor" class="w-5 h-5">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                        </svg>
                                                                    </button> --}}

                                                                    <button class="delete-btn text-gray-500 transition-colors duration-200 dark:hover:text-red-500 hover:text-red-500 focus:outline-none"
                    data-id="{{ $reclamer->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
                <form class="delete-form"
                    action="{{ route('delete', ['id' => $reclamer->id]) }}"
                    method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                                                                    {{-- @if ($reclamer->status != 1 && $reclamer->status != 0)
                                                                        <form
                                                                            action="{{ route('delete', ['id' => $reclamer->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 hover:text-red-500 focus:outline-none">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="w-5 h-5">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    @endif --}}

                                                                    {{-- supp --}}


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach

                                                <script>
                                                    document.querySelectorAll('.delete-btn').forEach(function(button) {
                                                        button.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            const form = this.nextElementSibling;
                                                            if (form && form.classList.contains('delete-form')) {
                                                                Swal.fire({
                                                                    title: "Are you sure?",
                                                                    text: "You won't be able to revert this!",
                                                                    icon: "warning",
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: "#3085d6",
                                                                    cancelButtonColor: "#d33",
                                                                    confirmButtonText: "Yes, delete it!"
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        form.submit();
                                                                    }
                                                                });
                                                            } else {
                                                                console.error("Delete form not found for button:", this);
                                                            }
                                                        });
                                                    });
                                                </script>



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
