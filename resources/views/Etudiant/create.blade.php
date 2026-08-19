@extends('layouts/etudiant')

@section('title', 'Page d\'accueil')

@section('content')

    <section class=" w-full overflow-x-hidden border-t flex flex-col ">
        <div class="w-full flex-grow m-2 pr-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex flex justify-between rounded-lg m-2 bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-2xl font-semibold">
                            Envoyer un réclamation
                        </h6>
                    </div>
                    @if (session('message'))
                        <script>
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "{{ session('message') }}",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        </script>
                    @endif
                </div>
                <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                    <form action="{{ route('Etudiant.store') }}" method="POST">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-4 font-bold uppercase">
                            Informations de Professeur
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="semestre" class="block text-sm font-medium leading-6 text-gray-900">
                                        semestre</label>
                                    <select name="semestre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-3 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">Choose a semestre</option>
                                        @foreach ($semestres as $semestre)
                                            <option value="{{ $semestre->id }}">{{ $semestre->Libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('semestre')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="Module" class="block text-sm font-medium leading-6 text-gray-900">
                                        Module</label>
                                    <select name="Module"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-3 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">Choose a Module</option>
                                        @foreach ($Modules as $Module)
                                            <option value="{{ $Module->id }}">{{ $Module->Libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('Module')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="Matiere" class="block text-sm font-medium leading-6 text-gray-900">
                                        Matiere</label>
                                    <select name="Matiere"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-3 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">Choose a Matiere</option>
                                        @foreach ($Matieres as $Matiere)
                                            <option value="{{ $Matiere->id }}">{{ $Matiere->Libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('Matiere')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="professeur" class="block text-sm font-medium leading-6 text-gray-900">
                                        Professeur</label>
                                    <select name="professeur"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-3 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">Choose a Professeur</option>
                                        @foreach ($Professeurs as $Professeur)
                                            <option value="{{ $Professeur->id }}">{{ $Professeur->Nom }}
                                                {{ $Professeur->Prenom }}</option>
                                        @endforeach
                                    </select>
                                    @error('professeur')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label for="annee_universitaire" class="block text-sm font-medium leading-6 text-gray-900">
                                        Annee universitaire</label>
                                    <select name="annee_universitaire" id="annee"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-3 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">Choose annee scolaire</option>
                                        <option value="2024">2024</option>
                                    </select>
                                    @error('annee_universitaire')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="mt-2 border-b-1 border-blueGray-300">


                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            À propos de moi
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <textarea type="text" name="remarqueEtudiant" placeholder=""
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        rows="4">
                                    </textarea>
                                    @error('remarqueEtudiant')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="submit"
                                        class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        Envoier
                                    </button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <footer class="relative ">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                            <div class="text-sm text-blueGray-500 font-semibold py-1">
                                Fait avec <a href="" class="text-blueGray-500 hover:text-gray-800" target="_blank">
                                    UMP </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>



        </div>
    </section>


@endsection
