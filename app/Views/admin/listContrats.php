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

    <?php include 'nav.php'; ?>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-12 px-4 lg:px-12">
     
            <div id="results" class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
            <div class="w-full pt-4 ml-3 md:w-1/2 relative mb-4">
                <label for="search-input" class="sr-only">Search</label>
                <div class="flex items-center w-full">
                    <input type="text" id="search-input" class="w-full p-2 pl-10 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500" placeholder="Search Supplier by Name" onkeyup="filterTable()">
                    <svg class="absolute left-3 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
                <div class="overflow-x-auto">
                    <table id="supplier-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">Nom du Fournisseur</th>
                                <th class="px-16 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($contrats)): ?>
                                <?php foreach ($contrats as $contract): ?>
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($contract['nom_fournisseur'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="px-4 py-3 flex items-center space-x-4">
                                            <a href="<?= base_url(htmlspecialchars($contract['pdf_path'], ENT_QUOTES, 'UTF-8')) ?>" target="_blank" class="py-2 px-4 bg-white hover:bg-gray-300 text-sm font-medium text-gray-900 rounded-lg">Voir</a>
                                            <a href="<?= base_url('/admin/contracts/delete/' . htmlspecialchars($contract['id'], ENT_QUOTES, 'UTF-8')) ?>" class="py-2 px-4 bg-red-100 hover:bg-red-600 hover:text-white text-sm font-medium text-red-600 rounded-lg" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?');">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center py-4 text-gray-500">Aucun contrat trouvé.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        function filterTable() {
            const input = document.getElementById('search-input');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('supplier-table');
            const rows = table.getElementsByTagName('tr');

            // Loop through all table rows and hide those that don't match the search query
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let showRow = false;

                if (cells[0]) {
                    const textValue = cells[0].textContent || cells[0].innerText;
                    showRow = textValue.toLowerCase().includes(filter);
                }

                rows[i].style.display = showRow ? "" : "none";
            }
        }
    </script>

</body>

</html>
