<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de Réclamation</title>
</head>
<body class="font-sans bg-gray-100">
    <div class="max-w-xl mx-auto p-8 bg-white rounded shadow-md">
        <p class="text-lg text-gray-800">Bonjour Professeur,</p>
        <p class="text-gray-700 mt-4">Nous vous informons que vous avez reçu une nouvelle réclamation à examiner.</p>
        <p class="text-gray-700 mt-4">Veuillez cliquer sur le lien ci-dessous pour accéder à la réclamation :</p>
        <a href="{{ $siteUrl }}" class="text-blue-500 hover:text-blue-600 underline">Voir la Réclamation</a>
        <p class="text-gray-700 mt-4">Merci pour votre diligence,</p>
        <p class="text-gray-700">Votre équipe de support</p>
    </div>
</body>
</html>
