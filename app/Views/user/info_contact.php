<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de Contact</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <form method="post" action="/my-informations-contact/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-full">
        <div class="grid grid-cols-1 gap-4">
            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-600">Nom</label>
                <input
                    type="text"
                    name="nom"
                    id="nom"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre nom">
            </div>
            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-600">Prénom</label>
                <input
                    type="text"
                    name="prenom"
                    id="prenom"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre prénom">
            </div>
            <!-- Fonction au sein de l'entreprise -->
            <div>
                <label for="fonction" class="block text-sm font-medium text-gray-600">Fonction au sein de l'entreprise</label>
                <input
                    type="text"
                    name="fonction"
                    id="fonction"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre fonction">
            </div>
            <!-- Téléphone direct -->
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-600">Téléphone direct</label>
                <input
                    type="tel"
                    name="telephone"
                    id="telephone"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre téléphone direct"
                    pattern="[0-9]*">
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre email">
            </div>
        </div>

        <!-- Bouton Précédent -->
        <div class="flex justify-between">
            <button
                type="button"
                onclick="window.location.href='/my-informations-clients'"
                class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Précédent
            </button>
            <!-- Submit Button -->
            <button
                type="submit"
                class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Suivant
            </button>
        </div>
    </form>

</body>

</html>