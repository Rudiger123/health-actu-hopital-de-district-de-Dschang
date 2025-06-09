<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Désabonnement réussi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-4 text-green-600">Désabonnement réussi !</h1>
        <p class="mb-6 text-gray-700">Vous avez été désabonné(e) avec succès de notre newsletter.</p>
        <p class="text-gray-700">Nous sommes désolés de vous voir partir.</p>
        <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
            Retour à l'accueil
        </a>
    </div>
</body>
</html>