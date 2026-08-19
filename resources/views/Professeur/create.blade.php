@extends('layouts/professeur')

@section('title', 'Page d\'accueil')

@section('content')





<section class=" w-full overflow-x-hidden border-t flex flex-col ">
    <div class="w-full flex-grow m-2 pr-4">
    <div class="font-sans relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white overflow-auto border-0 p-4">

    <!-- Nav -->
    <h3 class="text-center">Universite Mohammed V</h3>
    <h3 class="text-center">L'Ecole Nationale de Commerce et de Gestion</h3>
    <h3 class="text-center">Oujda</h3>
    <div class="h-px w-4/5 bg-black mx-auto"></div>

    <h1 class="text-center mt-3 underline mb-4">P.V. Individuel de rectification des notes</h1>
    <!-- 1PremierSection -->

    <div class="container mx-auto">
        <h5 class="mt-3">Je sousigne, Professeur <input type="text" class="text-center border-b border-black ml-2"></h5>
        <h5 class="mt-3">Avoir examine la reclamation de l'etudiant <input type="text" class="text-center border-b border-black ml-2"></h5>
        <div class="flex mt-3">
            <div class="w-2/5">
                <h5 class="flex mt-3">Inscrit au semestre <input type="text" class="text-center border-b border-black ml-2"></h5>
            </div>
            <div class="w-2/5">
                <h5 class="flex mt-3">l'année universitaire <input type="text" class="text-center border-b border-black ml-2"></h5>
            </div>
            <div class="w-2/5">
                <h5 class="flex mt-3">Sous le N° d'inscription <input type="text" class="text-center border-b border-black ml-2"></h5>
            </div>
        </div>
        <h5 class="mt-3">Concernant l'element du module <input type="text" class="text-center border-b border-black ml-2"></h5>
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
                            <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
                            <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
                            <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
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
                    <input type="checkbox" class="h-8 w-8">
                </div>
            </div>
        </div>
        <div class="container mx-auto mt-5">
            <div class="flex">
                <div class="w-1/4">
                    <h5>1- Changer la note</h5>
                </div>
                <div class="w-3/4">
                    <input type="checkbox" class="h-8 w-8">
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
                                <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
                                <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
                                <td class="border p-2"><input type="text" class="text-center border border-gray-300 p-1 w-full"></td>
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
                <textarea class="w-full h-32 border-4 border-black p-2 resize-none" id="exampleTextarea" textholder=".........."></textarea>
            </div>
        </fieldset>
    </div>
    <!-- 4QuatriemeSection -->
    <div class="container mx-auto mt-5">
        <h4 class="underline">Fait a Oujda, Le : <input type="text" class="text-center border-b border-black ml-2"></h4>
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
</div>
</section>


@endsection
