<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{{-- <section class="w-full overflow-x-hidden border-t flex flex-col">
    <div class="w-full flex-grow m-2 pr-4">
        <div
            class="font-sans relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white overflow-auto border-0 p-4">
            <!-- Nav -->
            <h3 class="text-center text-orangg">Universite Mohammed 1</h3>
            <h3 class="text-center">L'Ecole Nationale de Commerce et de Gestion</h3>
            <h3 class="text-center">Oujda</h3>
            <div class="h-px w-4/5 bg-black mx-auto"></div>
            <h1 class="text-center mt-3 underline mb-4">P.V. Individuel de rectification des notes</h1>
            <!-- 1PremierSection -->
            <div class="container mx-auto">
                <h5 class="mt-3">Je sousigne, Professeur <input type="text" disabled
                        class="text-center border-b border-black ml-2"
                        value="{{ $reclamer->professeur->Nom }} {{ $reclamer->professeur->Prenom }}"></h5>
                <h5 class="mt-3">Avoir examine la reclamation de l'etudiant <input type="text" disabled
                        class="text-center border-b border-black ml-2"
                        value="{{ $reclamer->etudiant->Nom }} {{ $reclamer->etudiant->Prenom }}"></h5>
                <div class="flex mt-3">
                    <div class="w-2/5">
                        <h5 class="flex mt-3">Inscrit au semestre <input type="text" disabled
                                {{-- value="{{ $reclamer->Semestre->Libelle }}" --}}
                                 {{-- class="text-center border-b border-black ml-2">

                        </h5>
                    </div>

                    <div class="w-2/5">
                        <h5 class="flex mt-3">Annee
                            <input type="text" name="annee_universitaire" disabled
                                value="{{ $reclamer->annee_universitaire }}" class="text-center border-b border-black ml-2">
                        </h5>
                    </div>
                    <div class="w-2/5">
                        <h5 class="flex mt-3">Inscrit au semestre <input type="text" disabled
                                value="{{ $reclamer->etudiant->N_appose }}" class="text-center border-b border-black ml-2"></h5>
                    </div>
                </div>
                <h5 class="mt-3">Concernant l'element du module <input type="text" disabled
                        class="text-center border-b border-black ml-2" --}}
                        {{-- value="{{ $reclamer->matiere->libelle }}" --}}
                        {{-- ></h5>
                <div class="flex mt-3">
                    <div class="mt-3 mr-3">
                        <h5>Dont la note est :</h5>
                    </div>
                    <div>
                        <table class="table-auto border border-collapse">
                            <thead>
                                <tr>
                                    <th class="border p-2">Note Controle Continu</th>
                                    <th class="border p-2">Note Examen</th>
                                    <th class="border p-2">Note Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2"><input type="text" disabled
                                            class="text-center border border-gray-300 p-1 w-full"
                                            value="{{ $reclamer->note->N_C_Continu }}"></td>
                                    <td class="border p-2"><input type="text" disabled
                                            class="text-center border border-gray-300 p-1 w-full"
                                            value="{{ $reclamer->note->N_Examen }}"></td>
                                    <td class="border p-2"><input type="text" disabled
                                            class="text-center border border-gray-300 p-1 w-full"
                                            value="{{ $reclamer->note->N_Finale }}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}

            <!-- 2DeuxiemeSection -->
            {{-- <div class="container mx-auto mt-5">
                <h6 class="mt-3 italic">Et apres verification, je demande de :</h6>
            </div><br>
            <div class="flex">
                <div class="container mx-auto mt-5">
                    <div class="flex">
                        <div class="w-1/4">
                            <h5>1- Maintenir la note</h5>
                        </div>
                        <div class="w-3/4">
                            <input type="radio" value="0" name="status" disabled
                                @if ($reclamer->status == 0) checked @endif class="h-8 w-8">
                        </div>

                        <div class="w-1/4">
                            <h5>2- Changer la note</h5>
                        </div>
                        <div class="w-3/4">
                            <input type="radio" value="1" name="status" disabled
                                @if ($reclamer->status == 1) checked @endif class="h-8 w-8">
                        </div>
                    </div>
                    <div class="flex mt-3">
                        <div>

                            <span class="font-bold">Nouvelle Note :</span>
                        </div>
                        <div class="ml-4">
                            <table class="table-auto border border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border p-2">Note Controle Continu</th>
                                        <th class="border p-2">Note Examen</th>
                                        <th class="border p-2">Note Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border p-2">
                                            <input type="text" name="N_C_Continu_N" disabled
                                                value="{{ $reclamer->note->N_C_Continu_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                        <td class="border p-2">
                                            <input type="text" name="N_Examen_N" disabled
                                                value="{{ $reclamer->note->N_Examen_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                        <td class="border p-2">
                                            <input type="text" name="N_Finale_N" disabled
                                                value="{{ $reclamer->note->N_Finale_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- 3TroisiemeSection -->
            {{-- <div class="container mx-auto mt-5">
                <h5>Motif du Changement</h5>
                <fieldset>
                    <div class="form-group">
                        <textarea type="text" name="Remarque" disabled class="w-full h-32 border-4 border-black p-2 resize-none"
                            rows="4">{{ $reclamer->remarqueProf }}
                            </textarea>
                    </div>
                </fieldset>
            </div>
            <div class="mx-auto w-[100px]">
                <img src="{{ url(Storage::url($reclamer->photo)) }}" alt="Reclamer Photo">
            </div> --}}
            <!-- 4QuatriemeSection -->
            {{-- <div class="container mx-auto mt-5">
                <h4 class="underline">Fait a Oujda, Le : <input type="text" value="{{ date('d / m / y') }}"
                        class="text-center border-b border-black ml-2" disabled></h4>
            </div>
        </div> --}}
        <!-- Add this button where you want it in your view -->
        {{-- <a href="{{ route('generate-pdf') }}" class="btn btn-primary">Download PDF</a> --}}

    {{-- </form>
    </div>
</section>

@extends('layouts.professeur')

@section('title', 'Page d\'accueil')

@section('content') --}}
    <div class="p-3 overflow-x-hidden">
        <div class="max-w-full mx-auto p-5 bg-white rounded-lg shadow-md">
            <h2 class="text-center mt-4">Université Mohammed 5</h2>
            <h2 class="text-center">L'École Nationale de Commerce et de Gestion Oujda</h2>
            <section class="border p-4 mt-6">
                <h2 class="mb-3">P.V. Individuel de rectification des notes</h2>
                <div class="mb-4">
                    <span> Je soussigne, <strong>Professeur</strong> </span>
                    <span> {{ $reclamer->professeur->Nom }} {{ $reclamer->professeur->Prenom }}</span><br>
                    <span>Avoir examiné la réclamation de l'étudiant <span class="text-lg ">{{ $reclamer->etudiant->Nom }} {{ $reclamer->etudiant->Prenom }}</span></span><br>
                    <span>Inscrit au Semestre <strong>
                        {{-- {{ $reclamer->Semestre->Libelle }} --}}
                    </strong></span>
                    <span>l'année universitaire {{ $reclamer->annee_universitaire }} 2023-2024 Sous le N d'inscriptions <span> {{ $reclamer->etudiant->N_appose }}</span></span><br>
                    <span>Concernant l'élément du module </span><strong>
                        {{-- {{ $reclamer->matiere->Libelle }} --}}
                    </strong>
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
                            <td class="p-2 border">
                                {{ $reclamer->note->N_C_Continu }}
                            </td>
                            <td class="p-2 border">
                                {{ $reclamer->note->N_Examen }}
                            </td>
                            <td class="p-2 border">
                                {{ $reclamer->note->N_Finale }}
                            </td>
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
                                        @if ($reclamer->status == 2) checked @endif class="h-8 w-8"><br>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="changer">
                            2-Changer la note
                        </label>
                        <input type="radio" value="1" name="status"
                                        @if ($reclamer->status == 1) checked @endif class="h-8 w-8"><br>
                    </div>
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
                                <td>{{ $reclamer->note->N_C_Continu_N }}</td>
                                <td>{{ $reclamer->note->N_Examen_N }}</td>
                                <td>{{ $reclamer->note->N_Finale_N }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="mt-4">Motif du Changement</h2>
                <div class="border p-3">
                    <textarea class="w-full rounded" type="text" name="remarqueProf" >{{ $reclamer->remarqueProf }}</textarea>
                </div>
                <!-- <div class="mx-auto w-[100px]">
                    <img src="{{ url(Storage::url($reclamer->photo)) }}" alt="Reclamer Photo">
                </div>                 -->
                <div class="container mx-auto mt-5">
                    <h4 class="flex underline">Fait a Oujda, Le : <div class="ml-2 italic text-gray-400 text-basic">
                            {{ date('d / m / y') }}</div>
                        {{-- <input type="text" value="{{ date('d / m / y') }}"
                            class="text-center border-b border-black ml-2" disabled> --}}
                    </h4>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
