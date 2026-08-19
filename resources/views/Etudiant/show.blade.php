@extends('layouts/etudiant')

@section('title', 'Page d\'accueil')

@section('content')
@if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
<section class="w-full overflow-x-hidden border-t flex flex-col">
    <div class="w-full flex-grow m-2 pr-4">
        <div
            class="font-sans relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white overflow-auto border-0 p-4">
            <!-- Nav -->
            <h3 class="text-center">Universite Mohammed V</h3>
            <h3 class="text-center">L'Ecole Nationale de Commerce et de Gestion</h3>
            <h3 class="text-center">Oujda</h3>
            <div class="h-px w-4/5 bg-black mx-auto"></div>

            <h1 class="text-center mt-3 underline mb-4">P.V. Individuel de rectification des notes</h1>
            <!-- 1PremierSection -->
            <div class="container mx-auto">
                <h5 class="mt-3">Je sousigne, Professeur <input type="text" disabled
                        class="text-center border-b border-black ml-2"
                        value="{{ $Reclamer->professeurnom }} {{ $Reclamer->professeurprenom }}"></h5>
                <h5 class="mt-3">Avoir examine la reclamation de l'etudiant <input type="text" disabled
                        class="text-center border-b border-black ml-2"
                        value="{{ $Reclamer->etudiantsNom }} {{ $Reclamer->etudiantsPrenom }}"></h5>
                <div class="flex mt-3">
                    <div class="w-2/5">
                        <h5 class="flex mt-3">Inscrit au semestre <input type="text" disabled
                                value="{{ $Reclamer->semestresLibelle }}" class="text-center border-b border-black ml-2">

                        </h5>
                    </div>

                    <div class="w-2/5">
                        <h5 class="flex mt-3">Annee
                            <input type="text" name="annee_universitaire" disabled
                                value="{{ $Reclamer->annee_universitaire }}" class="text-center border-b border-black ml-2">
                        </h5>
                    </div>
                    <div class="w-2/5">
                        <h5 class="flex mt-3">Inscrit au semestre <input type="text" disabled
                                value="{{ $Reclamer->N_appose }}" class="text-center border-b border-black ml-2"></h5>
                    </div>
                </div>
                <h5 class="mt-3">Concernant l'element du module <input type="text" disabled
                        class="text-center border-b border-black ml-2" value="{{ $Reclamer->Libelle }}"></h5>
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
                                            value="{{ $Reclamer->N_C_Continu }}"></td>
                                    <td class="border p-2"><input type="text" disabled
                                            class="text-center border border-gray-300 p-1 w-full"
                                            value="{{ $Reclamer->N_Examen }}"></td>
                                    <td class="border p-2"><input type="text" disabled
                                            class="text-center border border-gray-300 p-1 w-full"
                                            value="{{ $Reclamer->N_Finale }}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2DeuxiemeSection -->
            <div class="container mx-auto mt-5">
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
                                @if ($Reclamer->status == 0) checked @endif class="h-8 w-8">
                        </div>

                        <div class="w-1/4">
                            <h5>2- Changer la note</h5>
                        </div>
                        <div class="w-3/4">
                            <input type="radio" value="1" name="status" disabled
                                @if ($Reclamer->status == 1) checked @endif class="h-8 w-8">
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
                                                value="{{ $Reclamer->N_C_Continu_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                        <td class="border p-2">
                                            <input type="text" name="N_Examen_N" disabled
                                                value="{{ $Reclamer->N_Examen_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                        <td class="border p-2">
                                            <input type="text" name="N_Finale_N" disabled
                                                value="{{ $Reclamer->N_Finale_N }}"
                                                class="text-center border border-gray-300 p-1 w-full">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3TroisiemeSection -->
            <div class="container mx-auto mt-5">
                <h5>Motif du Changement</h5>
                <fieldset>
                    <div class="form-group">
                        <textarea type="text" name="Remarque" disabled class="w-full h-32 border-4 border-black p-2 resize-none"
                            rows="4">{{ $Reclamer->Remarque }}
                            </textarea>
                    </div>
                </fieldset>
            </div>
            <!-- 4QuatriemeSection -->
            <div class="container mx-auto mt-5">
                <h4 class="underline">Fait a Oujda, Le : <input type="text" value="{{ date('d / m / y') }}"
                        class="text-center border-b border-black ml-2" disabled></h4>
            </div>

            <div class="container mx-auto mt-3 mb-7">
                <div class="flex">
                    <div class="w-1/3">
                        <h5 class="underline">Avis de l'administration : </h5>
                    </div>
                    <div class="w-1/2 text-center">
                        <h5 class="underline">Avis du Departement :</h5>
                    </div>
                    <div class="w-1/4 text-right">
                        <h5 class="underline">Signature de l'Enseignant :</h5>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mt-7 mb-5">
                <div class="form-group border-4 border-black p-2">
                    <div class="flex">
                        <div class="w-1/3">
                            <h5 class="underline italic">Changement effectue par : .............</h5>
                        </div>
                        <div class="w-2/3 text-right">
                            <h5 class="underline italic">le : ...............</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-px w-4/5 bg-black mx-auto"></div>
            <h6 class="text-center font-bold">Ecole Nationale de Commerce et de Gestion d'Oujda</h6>
            <h6 class="text-center">Complexe universitaire BP 650- Oujda principale 60000</h6>
            <h6 class="text-center">Tel : 0536506983/85/89| Fax: 0536506984</h6>
            <h6 class="text-center">E-mail: <span class="underline">
        </div>
    </form>
    </div>
</section>

@endsection
