<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations du Fournisseur</title>
    <!-- Lien vers Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Informations du Fournisseur</h1>

        <!-- Inclusion de la page infoGenerales -->
        <?php include __DIR__ . '/pagesInformations/infoGenerales.php'; ?>
        <!-- Inclusion de la page informationsFinancieres -->
        <?php include __DIR__ . '/pagesInformations/informationsFinancieres.php'; ?>
        <!-- Inclusion de la page referencesClients -->
        <?php include __DIR__ . '/pagesInformations/referencesClients.php'; ?>
        <?php include __DIR__ . '/pagesInformations/supplierContacts.php'; ?>
        <?php include __DIR__ . '/pagesInformations/commentairesRemarques.php'; ?>

    </div>
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Feedback sur les Informations</h2>

        <!-- Commentaire Field -->
        <div class="mb-6">
            <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire</label>
            <textarea
                id="commentaire"
                name="commentaire"
                rows="4"
                class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Veuillez saisir votre commentaire ici..."
                required></textarea>
            <p class="mt-1 text-xs text-gray-500">Donnez une raison claire et précise si vous rejetez les informations du fournisseur.</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-4">
            <!-- Accepter Button -->
            <form action="<?= base_url('admin/supplier/accept/' . $supplier_id) ?>" method="POST" class="w-full">
                <button
                    type="submit"
                    class="w-full py-3 px-6 bg-green-600 text-white rounded-lg shadow-md focus:outline-none hover:bg-green-700 focus:ring-2 focus:ring-green-500">
                    Accepter
                </button>
            </form>

            <!-- Refuser Button -->
            <form action="<?= base_url('admin/supplier/reject/' . $supplier_id) ?>" method="POST" class="w-full">
                <!-- Hidden input for commentaire -->
                <input type="hidden" name="commentaire" id="commentaire-input" value="">
                <button
                    type="submit"
                    class="w-full py-3 px-6 bg-red-600 text-white rounded-lg shadow-md focus:outline-none hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                    Refuser
                </button>
            </form>
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