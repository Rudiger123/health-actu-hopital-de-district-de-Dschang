<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer le désabonnement</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Optionnel: Google Fonts pour une meilleure typographie --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8">
    <div class="bg-white p-8 sm:p-10 rounded-xl shadow-2xl w-full max-w-lg text-center border border-gray-200">
        <div class="mb-6">
            <svg class="mx-auto h-16 w-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-extrabold mb-5 text-gray-800 tracking-tight">Confirmer le désabonnement</h1>

        @if ($subscriber)
            <p class="mb-4 text-lg text-gray-700 leading-relaxed">
                Vous êtes sur le point de vous désabonner de notre newsletter. L'adresse e-mail concernée est :
                <br>
                <strong class="text-blue-600 font-bold break-all">{{ $subscriber->email }}</strong>.
            </p>
            <p class="mb-8 text-xl text-red-700 font-semibold animate-pulse">
                Êtes-vous sûr de vouloir vous désabonner ?
            </p>

            <form action="{{ route('newsletter.unsubscribe') }}" method="POST"
                class="space-y-4 md:space-y-0 md:flex md:justify-center md:gap-4">
                @csrf
                <input type="hidden" name="token" value="{{ $subscriber->unsubscribe_token }}">
                <button type="submit"
                    class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75">
                    Oui, me désabonner définitivement
                </button>
                <a href="{{ route('home') }}"
                    class="w-full md:w-auto bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 block mt-4 md:mt-0">
                    Non, garder mon abonnement
                </a>
            </form>
        @else
            <p class="text-xl text-red-600 font-semibold mb-6">
                Le lien de désabonnement est invalide ou a expiré.
            </p>
            <a href="{{ route('home') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                Retour à l'accueil
            </a>
        @endif
    </div>
</body>

</html>
