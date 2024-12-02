<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Générales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form method="post" action="/user/my-informations-general/store" class="bg-white shadow-xl rounded-2xl p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Informations Générales</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Les champs marqués d'un astérisque (<span class="text-red-600">*</span>) sont obligatoires
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="entreprise" class="block text-sm font-semibold text-gray-700">Nom de l'entreprise</label>
                        <input
                            type="text"
                            id="entreprise"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700"
                            value="<?= isset($supplier['nom']) ? $supplier['nom'] : '' ?>"
                            readonly>
                    </div>

                    <div class="space-y-2">
                        <label for="date_creation" class="block text-sm font-semibold text-gray-700">Date de création <span class="text-red-600">*</span></label>
                        <input
                            type="date"
                            name="date_creation"
                            id="date_creation"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['date_creation']) ? $data['date_creation'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="effectif" class="block text-sm font-semibold text-gray-700">Effectif <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="effectif"
                            id="effectif"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['effectif']) ? $data['effectif'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="forme_juridique" class="block text-sm font-semibold text-gray-700">Forme juridique <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="forme_juridique"
                            id="forme_juridique"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['forme_juridique']) ? $data['forme_juridique'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="capital_social" class="block text-sm font-semibold text-gray-700">Capital social <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="capital_social"
                            id="capital_social"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['capital_social']) ? $data['capital_social'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="adresse_siege" class="block text-sm font-semibold text-gray-700">Adresse du siège social <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="adresse_siege"
                            id="adresse_siege"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['adresse_siege']) ? $data['adresse_siege'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="n_rc" class="block text-sm font-semibold text-gray-700">N° RC <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="n_rc"
                            id="n_rc"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['n_rc']) ? $data['n_rc'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="lieu_immatriculation" class="block text-sm font-semibold text-gray-700">Lieu d'immatriculation <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="lieu_immatriculation"
                            id="lieu_immatriculation"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['lieu_immatriculation']) ? $data['lieu_immatriculation'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="n_if" class="block text-sm font-semibold text-gray-700">N° IF <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="n_if"
                            id="n_if"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['n_if']) ? $data['n_if'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="n_patente" class="block text-sm font-semibold text-gray-700">N° Patente <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="n_patente"
                            id="n_patente"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['n_patente']) ? $data['n_patente'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="n_ice" class="block text-sm font-semibold text-gray-700">N° ICE <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="n_ice"
                            id="n_ice"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['n_ice']) ? $data['n_ice'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email <span class="text-red-600">*</span></label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['email']) ? $data['email'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="telephone" class="block text-sm font-semibold text-gray-700">Téléphone <span class="text-red-600">*</span></label>
                        <input
                            type="tel"
                            name="telephone"
                            id="telephone"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['telephone']) ? $data['telephone'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="site_web" class="block text-sm font-semibold text-gray-700">Site web</label>
                        <input
                            type="url"
                            name="site_web"
                            id="site_web"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['site_web']) ? $data['site_web'] : '' ?>">
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
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