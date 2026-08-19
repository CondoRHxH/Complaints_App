<!-- resources/views/Admin/Addmo.blade.php -->
@extends('layouts.admin')

@section('title', 'Page d\'accueil')

@section('content')

<div class="container mx-auto max-w-lg mt-8">
    <form action="{{route('Admin/create')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="semestre">
                Code Module
            </label>
            <input name="Code_mod" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Code_semestre" type="text" placeholder="Entrez le Code Module">
            @error('Code_mod')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="module">
                Libelle Module
            </label>
            <input name="Libelle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="module" type="text" placeholder="Entrez le Semestre">
            @error('Libelle')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="selectSemestre">
                Sélectionnez un Semestre
            </label>
            <select name="semestre_id" id="semestre_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Choisissez un semestre</option>
                @foreach ($semestres as $semestre)
                    <option value="{{ $semestre->id }}">{{ $semestre->Libelle }}</option>
                @endforeach
            </select>
            @error('semestre_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Enregistrer
            </button>
            <div>
                <a class="inline-block mr-2 align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('Add')}}">
                    <- Précédent
                </a>
                <a class="inline-block ml-2 align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('Matier')}}">
                    Suivant ->
                </a>
            </div>
        </div>
    </form>
</div>


@endsection
