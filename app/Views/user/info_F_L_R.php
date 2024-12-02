<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Financières et Légales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form method="post" action="/user/my-informations-flr/store" class="bg-white shadow-xl rounded-2xl p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Informations Financières, Légales et Réglementaires</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Les champs marqués d'un astérisque (<span class="text-red-600">*</span>) sont obligatoires
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="space-y-2">
                        <label for="chiffre_affaires_1" class="block text-sm font-semibold text-gray-700">Chiffre d'affaires année 1 <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="chiffre_affaires_1"
                            id="chiffre_affaires_1"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['chiffre_affaires_1']) ? $data['chiffre_affaires_1'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="chiffre_affaires_2" class="block text-sm font-semibold text-gray-700">Chiffre d'affaires année 2 <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="chiffre_affaires_2"
                            id="chiffre_affaires_2"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['chiffre_affaires_2']) ? $data['chiffre_affaires_2'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="chiffre_affaires_3" class="block text-sm font-semibold text-gray-700">Chiffre d'affaires année 3 <span class="text-red-600">*</span></label>
                        <input
                            type="number"
                            name="chiffre_affaires_3"
                            id="chiffre_affaires_3"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['chiffre_affaires_3']) ? $data['chiffre_affaires_3'] : '' ?>"
                            required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="conditions_paiement" class="block text-sm font-semibold text-gray-700">Conditions de paiement</label>
                        <input
                            type="text"
                            name="conditions_paiement"
                            id="conditions_paiement"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['conditions_paiement']) ? $data['conditions_paiement'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="modalites_facturation" class="block text-sm font-semibold text-gray-700">Modalités de facturation</label>
                        <input
                            type="text"
                            name="modalites_facturation"
                            id="modalites_facturation"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['modalites_facturation']) ? $data['modalites_facturation'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="principaux_actionnaires" class="block text-sm font-semibold text-gray-700">Principaux Actionnaires <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="principaux_actionnaires"
                            id="principaux_actionnaires"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['principaux_actionnaires']) ? $data['principaux_actionnaires'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="representant_legal" class="block text-sm font-semibold text-gray-700">Représentant légal <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="representant_legal"
                            id="representant_legal"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['representant_legal']) ? $data['representant_legal'] : '' ?>"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label for="qualite_representant_legal" class="block text-sm font-semibold text-gray-700">Qualité du représentant légal</label>
                        <input
                            type="text"
                            name="qualite_representant_legal"
                            id="qualite_representant_legal"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['qualite_representant_legal']) ? $data['qualite_representant_legal'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="maison_mere_filiales" class="block text-sm font-semibold text-gray-700">Maison-mère/ Filiales</label>
                        <input
                            type="text"
                            name="maison_mere_filiales"
                            id="maison_mere_filiales"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['maison_mere_filiales']) ? $data['maison_mere_filiales'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="certifications_qualite" class="block text-sm font-semibold text-gray-700">Certifications qualité</label>
                        <input
                            type="text"
                            name="certifications_qualite"
                            id="certifications_qualite"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['certifications_qualite']) ? $data['certifications_qualite'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="licences_autorisations" class="block text-sm font-semibold text-gray-700">Licences ou autorisations nécessaires à l'activité</label>
                        <input
                            type="text"
                            name="licences_autorisations"
                            id="licences_autorisations"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['licences_autorisations']) ? $data['licences_autorisations'] : '' ?>">
                    </div>

                    <div class="space-y-2">
                        <label for="polices_assurances" class="block text-sm font-semibold text-gray-700">Polices d'assurances (RC /RC Pro/Cyber ...)</label>
                        <input
                            type="text"
                            name="polices_assurances"
                            id="polices_assurances"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            value="<?= isset($data['polices_assurances']) ? $data['polices_assurances'] : '' ?>">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="flex items-center space-x-3">
                        <input type="hidden" name="plan_continuite" value="0">
                        <input
                            type="checkbox"
                            name="plan_continuite"
                            id="plan_continuite"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            value="1" <?= isset($data['plan_continuite']) && $data['plan_continuite'] ? 'checked' : '' ?>>
                        <label for="plan_continuite" class="text-sm font-semibold text-gray-700">Plan de continuité des activités en cas de crise</label>
                    </div>

                    <div class="flex items-center space-x-3">
                        <input type="hidden" name="politique_rse" value="0">
                        <input
                            type="checkbox"
                            name="politique_rse"
                            id="politique_rse"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            value="1" <?= isset($data['politique_rse']) && $data['politique_rse'] ? 'checked' : '' ?>>
                        <label for="politique_rse" class="text-sm font-semibold text-gray-700">Politique RSE</label>
                    </div>

                    <div class="flex items-center space-x-3">
                        <input type="hidden" name="pratiques_ethiques" value="0">
                        <input
                            type="checkbox"
                            name="pratiques_ethiques"
                            id="pratiques_ethiques"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            value="1" <?= isset($data['pratiques_ethiques']) && $data['pratiques_ethiques'] ? 'checked' : '' ?>>
                        <label for="pratiques_ethiques" class="text-sm font-semibold text-gray-700">Pratiques éthiques</label>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button
                        type="button"
                        onclick="window.location.href='/user/my-informations-general'"
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