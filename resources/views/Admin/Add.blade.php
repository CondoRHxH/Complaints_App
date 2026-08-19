@extends('layouts/admin')

@section('title', 'Page d\'accueil')

@section('content')

<div class="container mx-auto max-w-lg mt-8">
    <form action="{{route("Admin.store")}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="semestre">
                Code Semestre
            </label>
            <input name="Code_semestre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Code_semestre" type="text" placeholder="Entrez le code Semestre">
            @error('Code_semestre')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="module">
                Libelle Semestre
            </label>
            <input name="Libelle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="module" type="text" placeholder="Entrez le Semestre">
            @error('Libelle')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Enregistrer
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('Admin.create')}}">
                Suivant ->
            </a>
        </div>
    </form>
</div>

@endsection
