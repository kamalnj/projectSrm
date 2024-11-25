<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Financières et Légales</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen flex items-center justify-center">
        <form method="post" action="/my-informations-flr/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-3/4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Informations Financières, Légales et Réglementaires</h2>
            <p class="text-sm text-gray-600 mb-4">
                Les champs marqués d'un astérisque (<span class="text-red-500">*</span>) sont obligatoires. 
                Les autres champs sont facultatifs.
            </p>
            <div class="grid grid-cols-3 gap-4">
                <!-- Chiffre d'affaires année 1 -->
                <div>
                    <label for="chiffre_affaires_1" class="block text-sm font-medium text-gray-600">Chiffre d'affaires année 1 <span class="text-red-500">*</span></label>
                    <input
                        type="number"
                        name="chiffre_affaires_1"
                        id="chiffre_affaires_1"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Chiffre d'affaires année 1"
                        value="<?= isset($data['chiffre_affaires_1']) ? $data['chiffre_affaires_1'] : '' ?>"
                        required>
                </div>
                <!-- Chiffre d'affaires année 2 -->
                <div>
                    <label for="chiffre_affaires_2" class="block text-sm font-medium text-gray-600">Chiffre d'affaires année 2 <span class="text-red-500">*</span></label>
                    <input
                        type="number"
                        name="chiffre_affaires_2"
                        id="chiffre_affaires_2"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Chiffre d'affaires année 2"
                        value="<?= isset($data['chiffre_affaires_2']) ? $data['chiffre_affaires_2'] : '' ?>"
                        required>
                </div>
                <!-- Chiffre d'affaires année 3 -->
                <div>
                    <label for="chiffre_affaires_3" class="block text-sm font-medium text-gray-600">Chiffre d'affaires année 3 <span class="text-red-500">*</span></label>
                    <input
                        type="number"
                        name="chiffre_affaires_3"
                        id="chiffre_affaires_3"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Chiffre d'affaires année 3"
                        value="<?= isset($data['chiffre_affaires_3']) ? $data['chiffre_affaires_3'] : '' ?>"
                        required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
            
                <!-- Conditions de paiement -->
                <div>
                    <label for="conditions_paiement" class="block text-sm font-medium text-gray-600">Conditions de paiement</label>
                    <input
                        type="text"
                        name="conditions_paiement"
                        id="conditions_paiement"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Conditions de paiement"
                        value="<?= isset($data['conditions_paiement']) ? $data['conditions_paiement'] : '' ?>">
                </div>
                <!-- Modalités de facturation -->
                <div>
                    <label for="modalites_facturation" class="block text-sm font-medium text-gray-600">Modalités de facturation</label>
                    <input
                        type="text"
                        name="modalites_facturation"
                        id="modalites_facturation"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Modalités de facturation"
                        value="<?= isset($data['modalites_facturation']) ? $data['modalites_facturation'] : '' ?>">
                </div>
                <!-- Principaux Actionnaires -->
                <div>
                    <label for="principaux_actionnaires" class="block text-sm font-medium text-gray-600">Principaux Actionnaires <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="principaux_actionnaires"
                        id="principaux_actionnaires"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Principaux Actionnaires"
                        value="<?= isset($data['principaux_actionnaires']) ? $data['principaux_actionnaires'] : '' ?>"
                        required>
                </div>
                <!-- Représentant légal -->
                <div>
                    <label for="representant_legal" class="block text-sm font-medium text-gray-600">Représentant légal <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="representant_legal"
                        id="representant_legal"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Représentant légal"
                        value="<?= isset($data['representant_legal']) ? $data['representant_legal'] : '' ?>"
                        required>
                </div>
                <!-- Qualité du représentant légal -->
                <div>
                    <label for="qualite_representant_legal" class="block text-sm font-medium text-gray-600">Qualité du représentant légal</label>
                    <input
                        type="text"
                        name="qualite_representant_legal"
                        id="qualite_representant_legal"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Qualité du représentant légal"
                        value="<?= isset($data['qualite_representant_legal']) ? $data['qualite_representant_legal'] : '' ?>">
                </div>
                <!-- Maison-mère/ Filiales -->
                <div>
                    <label for="maison_mere_filiales" class="block text-sm font-medium text-gray-600">Maison-mère/ Filiales</label>
                    <input
                        type="text"
                        name="maison_mere_filiales"
                        id="maison_mere_filiales"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Maison-mère/ Filiales"
                        value="<?= isset($data['maison_mere_filiales']) ? $data['maison_mere_filiales'] : '' ?>">
                </div>
                <!-- Certifications qualité -->
                <div>
                    <label for="certifications_qualite" class="block text-sm font-medium text-gray-600">Certifications qualité</label>
                    <input
                        type="text"
                        name="certifications_qualite"
                        id="certifications_qualite"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Certifications qualité"
                        value="<?= isset($data['certifications_qualite']) ? $data['certifications_qualite'] : '' ?>">
                </div>
                <!-- Licences ou autorisations nécessaires à l'activité -->
                <div>
                    <label for="licences_autorisations" class="block text-sm font-medium text-gray-600">Licences ou autorisations nécessaires à l'activité</label>
                    <input
                        type="text"
                        name="licences_autorisations"
                        id="licences_autorisations"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Licences ou autorisations nécessaires à l'activité"
                        value="<?= isset($data['licences_autorisations']) ? $data['licences_autorisations'] : '' ?>">
                </div>
                <!-- Polices d'assurances -->
                <div>
                    <label for="polices_assurances" class="block text-sm font-medium text-gray-600">Polices d'assurances (RC /RC Pro/Cyber ...)</label>
                    <input
                        type="text"
                        name="polices_assurances"
                        id="polices_assurances"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Polices d'assurances (RC /RC Pro/Cyber ...)"
                        value="<?= isset($data['polices_assurances']) ? $data['polices_assurances'] : '' ?>">
                </div>
                <!-- Plan de continuité des activités en cas de crise -->
                <div>
                    <label for="plan_continuite" class="block text-sm font-medium text-gray-600">Plan de continuité des activités en cas de crise</label>
                    <input type="hidden" name="plan_continuite" value="0">
                    <input
                        type="checkbox"
                        name="plan_continuite"
                        id="plan_continuite"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="1" <?= isset($data['plan_continuite']) && $data['plan_continuite'] ? 'checked' : '' ?>>
                </div>
                <!-- Politique RSE -->
                <div>
                    <label for="politique_rse" class="block text-sm font-medium text-gray-600">Politique RSE</label>
                    <input type="hidden" name="politique_rse" value="0">
                    <input
                        type="checkbox"
                        name="politique_rse"
                        id="politique_rse"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="1" <?= isset($data['politique_rse']) && $data['politique_rse'] ? 'checked' : '' ?>>
                </div>
                <!-- Pratiques éthiques -->
                <div>
                    <label for="pratiques_ethiques" class="block text-sm font-medium text-gray-600">Pratiques éthiques (code de conduite, lutte contre la corruption, etc.)</label>
                    <input type="hidden" name="pratiques_ethiques" value="0">
                    <input
                        type="checkbox"
                        name="pratiques_ethiques"
                        id="pratiques_ethiques"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="1" <?= isset($data['pratiques_ethiques']) && $data['pratiques_ethiques'] ? 'checked' : '' ?>>
                </div>
            </div>

            <!-- Bouton Précédent -->
            <div class="flex justify-between">
                <button
                    type="button"
                    onclick="window.location.href='/my-informations-general'"
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