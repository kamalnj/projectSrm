<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.6.4/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <?php include 'nav.php'; ?>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Liste des Contrats</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nom du Fournisseur</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($contrats)): ?>
                        <?php foreach ($contrats as $contract): ?>
                            <tr class="border-b">
                                <td class="border border-gray-300 px-4 py-2"><?= esc($contract['nom_fournisseur']) ?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                <td class="border border-gray-300 px-4 py-2">
                                <td class="border border-gray-300 px-4 py-2">
                                <td class="border border-gray-300 px-4 py-2">
                                <a href="<?= base_url(esc($contract['pdf_path'])) ?>" target="_blank" class="text-blue-600 hover:underline">
    Voir le PDF
</a>

</td>

                                </td>

                                </td>

                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="<?= base_url('/admin/contracts/delete/' . $contract['id']) ?>"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?');">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                Aucun contrat trouvé.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>