@extends('layouts.professeur')

@section('title', 'Page d\'accueil')

@section('content')


    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <form action="{{ route('professeur.update', $Reclamer->id) }}" method="POST" class="p-3 overflow-x-hidden" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="max-w-full mx-auto p-5 bg-white rounded-lg shadow-md">
            <h2 class="text-center mt-4">Université Mohammed 1</h2>
            <h2 class="text-center">L'École Nationale de Commerce et de Gestion Oujda</h2>
            <section class="border p-4 mt-6">
                <h2 class="mb-3">P.V. Individuel de rectification des notes</h2>
                <div class="mb-4">
                    <span> Je soussigne, <strong>Professeur</strong> </span>
                    <span> {{ $Reclamer->professeurnom }} {{ $Reclamer->professeurprenom }}</span><br>
                    <span>Avoir examiné la réclamation de l'étudiant <span class="text-lg ">{{ $Reclamer->etudiantsNom }} {{ $Reclamer->etudiantsPrenom }}</span></span><br>
                    <span>Inscrit au Semestre <strong>{{ $Reclamer->semestresLibelle }}</strong></span>
                    <span>l'année universitaire{{ $Reclamer->annee_universitaire }} 2023-2024 Sous le N d'inscriptions <span> {{ $Reclamer->N_appose }}</span></span><br>
                    <span>Concernant l'élément du module </span><strong>{{ $Reclamer->Libelle }}</strong>
                </div>
                <table class="w-full mb-4 border-collapse">
                    <thead>
                        <tr>
                            <th class="p-2 border" scope="col">Note Contrôle Continu</th>
                            <th class="p-2 border" scope="col">Note Examen</th>
                            <th class="p-2 border" scope="col">Note Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border"><input type="text" name="N_C_Continu"
                                class="text-center border border-gray-300 p-1 w-full">
                            </td>
                            @error('N_C_Continu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                            <td class="p-2 border"><input type="text" name="N_Examen"
                                class="text-center border border-gray-300 p-1 w-full">
                            </td>
                            @error('N_Examen')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                            <td class="p-2 border"><input type="text" name="N_Finale"
                                class="text-center border border-gray-300 p-1 w-full">
                            </td>
                            @error('N_Finale')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                        </tr>
                    </tbody>
                </table>
                <div class="mb-4">
                    <span>Et après vérification, je demande de :</span><br>
                    <div class="form-check mb-2">
                        <label class="form-check-label" for="maintenir">
                            1-Maintenir la note
                        </label>
                        <input type="radio" value="2" name="status"
                                        @if ($Reclamer->status == 2) checked @endif class="h-8 w-8"><br>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="changer">
                            2-Changer la note
                        </label>
                        <input type="radio" value="1" name="status"
                                        @if ($Reclamer->status == 1) checked @endif class="h-8 w-8"><br>
                    </div>
                    @error('status')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                </div>
                <div class="mb-4">
                    <span>Nouvelle Note :</span>
                    <table class="w-full mb-4 border-collapse">
                        <thead>
                            <tr>
                                <th class="p-2 border" scope="col">Note Contrôle Continu</th>
                                <th class="p-2 border" scope="col">Note Examen</th>
                                <th class="p-2 border" scope="col">Note Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="w-full rounded" type="text" name="N_C_Continu_N" value="{{ old('N_C_Continu_N') }}" ></td>
                                @error('N_C_Continu_N')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <td><input class="w-full rounded" type="text" name="N_Examen_N" value="{{ old('N_Examen_N') }}" ></td>
                                @error('N_Examen_N')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <td><input class="w-full rounded" type="text" name="N_Finale_N" value="{{ old('N_Finale_N') }}" ></td>
                                @error('N_Finale_N')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="mt-4">Motif du Changement</h2>
                <div class="border p-3">
                    <textarea class="w-full rounded" type="text" value="{{ old('remarqueProf') }}" name="remarqueProf" ></textarea>
                    @error('remarqueProf')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <input class="mt-4" type="file" name="photo">
                @error('photo')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                <div class="container mx-auto mt-5">
                    <h4 class="flex underline">Fait a Oujda, Le : <div class="ml-2 italic text-gray-400 text-basic">
                            {{ date('d / m / y') }}</div>
                        {{-- <input type="text" value="{{ date('d / m / y') }}"
                            class="text-center border-b border-black ml-2" disabled> --}}
                    </h4>
                </div>
                <button type="submit" class="btn mt-4">envoyer</button>
            </section>
        </div>
    </form>



@endsection
