<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Générales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    
    <?php include 'navUser.php'; ?>

    <form method="post" action="/my-informations-general/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-full">
        <div class="grid grid-cols-2 gap-4">
            <!-- 1ère moitié des champs (0% à 50%) -->
            <div>
                <label for="entreprise" class="block text-sm font-medium text-gray-600">Nom de l'entreprise</label>
                <input
                    type="text"
                    name="entreprise"
                    id="entreprise"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Nom de l'entreprise"
                    value="<?= isset($data['entreprise']) ? $data['entreprise'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="date_creation" class="block text-sm font-medium text-gray-600">Date de création</label>
                <input
                    type="date"
                    name="date_creation"
                    id="date_creation"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['date_creation']) ? $data['date_creation'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="effectif" class="block text-sm font-medium text-gray-600">Effectif</label>
                <input
                    type="number"
                    name="effectif"
                    id="effectif"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['effectif']) ? $data['effectif'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="forme_juridique" class="block text-sm font-medium text-gray-600">Forme juridique</label>
                <input
                    type="text"
                    name="forme_juridique"
                    id="forme_juridique"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['forme_juridique']) ? $data['forme_juridique'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="capital_social" class="block text-sm font-medium text-gray-600">Capital social</label>
                <input
                    type="number"
                    name="capital_social"
                    id="capital_social"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['capital_social']) ? $data['capital_social'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="adresse_siege" class="block text-sm font-medium text-gray-600">Adresse du siège social</label>
                <input
                    type="text"
                    name="adresse_siege"
                    id="adresse_siege"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['adresse_siege']) ? $data['adresse_siege'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="n_rc" class="block text-sm font-medium text-gray-600">N RC</label>
                <input
                    type="number"
                    name="n_rc"
                    id="n_rc"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['n_rc']) ? $data['n_rc'] : '' ?>"
                    required>
            </div>

            <!-- 2ème moitié des champs (50% à 100%) -->
            <div>
                <label for="lieu_immatriculation" class="block text-sm font-medium text-gray-600">Lieu d'immatriculation</label>
                <input
                    type="text"
                    name="lieu_immatriculation"
                    id="lieu_immatriculation"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['lieu_immatriculation']) ? $data['lieu_immatriculation'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="n_if" class="block text-sm font-medium text-gray-600">N IF</label>
                <input
                    type="number"
                    name="n_if"
                    id="n_if"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['n_if']) ? $data['n_if'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="n_patente" class="block text-sm font-medium text-gray-600">N Patente</label>
                <input
                    type="number"
                    name="n_patente"
                    id="n_patente"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['n_patente']) ? $data['n_patente'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="n_ice" class="block text-sm font-medium text-gray-600">N ICE</label>
                <input
                    type="number"
                    name="n_ice"
                    id="n_ice"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['n_ice']) ? $data['n_ice'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['email']) ? $data['email'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-600">Téléphone</label>
                <input
                    type="tel"
                    name="telephone"
                    id="telephone"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['telephone']) ? $data['telephone'] : '' ?>"
                    required>
            </div>
            <div>
                <label for="site_web" class="block text-sm font-medium text-gray-600">Site web</label>
                <input
                    type="url"
                    name="site_web"
                    id="site_web"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="<?= isset($data['site_web']) ? $data['site_web'] : '' ?>">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Suivant
            </button>
        </div>
    </form>
</body>

</html>