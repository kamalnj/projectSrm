<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Clients</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <form method="post" action="<?= base_url('/my-informations-clients/store'); ?>" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-full">
        <div class="grid grid-cols-2 gap-4">
            <!-- Principaux clients ou références -->
            <div>
                <label for="principaux_clients" class="block text-sm font-medium text-gray-600">Principaux clients ou références</label>
                <input
                    type="text"
                    name="principaux_clients"
                    id="principaux_clients"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Principaux clients ou références"
                    value="<?= isset($data['principaux_clients']) ? $data['principaux_clients'] : '' ?>"
                    required>
            </div>
            <!-- Exemple de projets réalisés -->
            <div>
                <label for="exemple_projets" class="block text-sm font-medium text-gray-600">Exemple de projets réalisés</label>
                <input
                    type="text"
                    name="exemple_projets"
                    id="exemple_projets"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Exemple de projets réalisés"
                    value="<?= isset($data['exemple_projets']) ? $data['exemple_projets'] : '' ?>"
                    required>
            </div>
        </div>

            <!-- Bouton Précédent -->
            <div class="flex justify-between">
                <button
                    type="button"
                    onclick="window.location.href='/my-informations-flr'"
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
    </div>
</body>

</html>