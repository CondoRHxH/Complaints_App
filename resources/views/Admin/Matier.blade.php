<!-- resources/views/Admin/Addmo.blade.php -->
@extends('layouts.admin')

@section('title', 'Page d\'accueil')

@section('content')

    <div class="container mx-auto max-w-lg mt-8">
        <form action="{{ route('Matier/store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Matiere">
                    Code Matiere
                </label>
                <input name="Code_matiere"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="Code_matiere" type="text" placeholder="Entrez le Code Matiere">
                    @error('Code_matiere')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Matiere">
                    Libelle Matiere
                </label>
                <input name="Libelle"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="Libelle" type="text" placeholder="Entrez le Matiere">
                    @error('Libelle')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="selectModule">
                    Sélectionnez un Module
                </label>
                <select name="module_id" id="module_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choisissez un Module</option>
                    @foreach ($Modules as $module)
                        <option value="{{ $module->id }}">{{ $module->Libelle }}</option>
                    @endforeach
                </select>
                @error('module_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="selectModule">
                    Sélectionnez un Professeur
                </label>
                <select name="professeur_id" id="professeur_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choisissez un Professeur</option>
                    @foreach ($Professeurs as $Professeur)
                        <option value="{{ $Professeur->id }}">{{ $Professeur->Nom }}</option>
                    @endforeach
                </select>
                @error('professeur_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Enregistrer
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    href="{{ route('Admin.create') }}">
                    <- Précédent </a>
            </div>
        </form>
    </div>


@endsection
