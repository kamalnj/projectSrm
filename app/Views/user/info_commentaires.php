<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires et Remarques</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <form method="post" action="/my-informations-commentaires/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-full">
        <div class="grid grid-cols-1 gap-4">
            <!-- Commentaire -->
            <div>
                <label for="commentaire" class="block text-sm font-medium text-gray-600">Commentaire</label>
                <input
                    type="text"
                    name="commentaire"
                    id="commentaire"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre commentaire"
                    value="<?= isset($data['commentaire']) ? htmlspecialchars($data['commentaire']) : '' ?>"
                    required>
            </div>
            <!-- Remarque -->
            <div>
                <label for="remarque" class="block text-sm font-medium text-gray-600">Remarque</label>
                <input
                    type="text"
                    name="remarque"
                    id="remarque"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Votre remarque"
                    value="<?= isset($data['remarque']) ? htmlspecialchars($data['remarque']) : '' ?>"
                    required>
            </div>
        </div>

        <!-- Bouton Précédent -->
        <div class="flex justify-between">
            <button
                type="button"
                onclick="window.location.href='/my-informations-contact'"
                class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Précédent
            </button>
            <!-- Submit Button -->
            <button
                type="submit"
                class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Soumettre
            </button>
        </div>
    </form>
</body>

</html> 