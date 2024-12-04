<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations du Fournisseur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen font-[Inter]">
    <?php include 'nav.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- En-tête -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                Informations du Fournisseur
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Consultez et gérez les informations détaillées du fournisseur
            </p>
        </div>

        <!-- Conteneur principal -->
        <div class="space-y-6">
            <?php include __DIR__ . '/pagesInformations/infoGenerales.php'; ?>
            <?php include __DIR__ . '/pagesInformations/informationsFinancieres.php'; ?>
            <?php include __DIR__ . '/pagesInformations/referencesClients.php'; ?>
            <?php include __DIR__ . '/pagesInformations/supplierContacts.php'; ?>
            <?php include __DIR__ . '/pagesInformations/commentairesRemarques.php'; ?>

            <!-- Section Feedback -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Feedback sur les Informations</h2>

                <!-- Champ Commentaire -->
                <div class="mb-6">
                    <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-2">Commentaire</label>
                    <textarea
                        id="commentaire"
                        name="commentaire"
                        rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                        placeholder="Veuillez saisir votre commentaire ici..."
                        required></textarea>
                    <p class="mt-2 text-sm text-gray-500">Donnez une raison claire et précise si vous rejetez les informations du fournisseur.</p>
                </div>

                <!-- Boutons d'action -->
                <div class="grid grid-cols-2 gap-4">
                    <form action="<?= base_url('admin/supplier/accept/' . $supplier_id) ?>" method="POST">
                        <button type="submit" 
                                <?= isset($isComplete) && !$isComplete ? 'disabled' : '' ?>
                                class="w-full flex items-center justify-center px-6 py-3 
                                       <?= isset($isComplete) && $isComplete ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-gray-300 cursor-not-allowed' ?> 
                                       text-white font-medium rounded-lg focus:outline-none focus:ring-2 
                                       focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Accepter
                        </button>
                    </form>

                    <form action="<?= base_url('admin/supplier/reject/' . $supplier_id) ?>" method="POST">
                        <button type="submit"
                                <?= isset($isComplete) && !$isComplete ? 'disabled' : '' ?>
                                class="w-full flex items-center justify-center px-6 py-3 
                                       <?= isset($isComplete) && $isComplete ? 'bg-red-600 hover:bg-red-700' : 'bg-gray-300 cursor-not-allowed' ?>
                                       text-white font-medium rounded-lg focus:outline-none focus:ring-2 
                                       focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Refuser
                        </button>
                    </form>
                </div>

                <?php if (isset($isComplete) && !$isComplete): ?>
                    <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                        <p class="text-sm text-yellow-700">
                            <span class="font-medium">Note:</span> Les boutons sont désactivés car toutes les informations requises ne sont pas encore disponibles.
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("form[action='<?= base_url('admin/supplier/reject/' . $supplier_id) ?>']").addEventListener('submit', function(event) {
            var commentaire = document.getElementById('commentaire').value;
            document.getElementById('commentaire-input').value = commentaire;
        });
    </script>

</body>

</html>