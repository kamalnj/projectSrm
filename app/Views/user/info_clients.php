<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form method="post" action="<?= base_url('/my-informations-clients/store'); ?>" class="bg-white shadow-xl rounded-2xl p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Références et Clients</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Les champs marqués d'un astérisque (<span class="text-red-600">*</span>) sont obligatoires
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="principaux_clients" class="block text-sm font-semibold text-gray-700">Principaux clients ou références <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="principaux_clients"
                            id="principaux_clients"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Vos principaux clients ou références"
                            value="<?= isset($data['principaux_clients']) ? $data['principaux_clients'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="exemple_projets" class="block text-sm font-semibold text-gray-700">Exemple de projets réalisés <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="exemple_projets"
                            id="exemple_projets"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Vos projets réalisés"
                            value="<?= isset($data['exemple_projets']) ? $data['exemple_projets'] : '' ?>"
                            required>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button
                        type="button"
                        onclick="window.location.href='/my-informations-flr'"
                        class="px-6 py-3 bg-gray-600 text-white font-medium rounded-lg shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                        Précédent
                    </button>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        Suivant
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>