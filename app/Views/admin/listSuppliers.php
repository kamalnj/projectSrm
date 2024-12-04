<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.6.4/dist/flowbite.min.js"></script>
</head>

<body class="bg-slate-50">

    <!-- Navigation -->
    <?php include 'nav.php'; ?>

    <!-- Main Section -->
    <section class="py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                
                <!-- Header -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Search -->
                        <div class="relative flex-1 max-w-lg">
                            <input type="text" 
                                   id="search-input" 
                                   class="w-full pl-12 pr-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-colors" 
                                   placeholder="Rechercher un fournisseur..."
                                   onkeyup="filterTable()">
                            <svg class="absolute left-4 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <!-- Add Button -->
                        <button type="button" 
                                id="defaultModalButton" 
                                data-modal-target="defaultModal" 
                                data-modal-toggle="defaultModal"
                                class="inline-flex items-center px-5 py-3 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                            </svg>
                            Ajouter un fournisseur
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div id="results" class="overflow-x-auto">
                    <?php if (!empty($suppliers)): ?>
                        <table id="supplier-table" class="w-full">
                            <thead>
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th class="px-6 py-4">Nom</th>
                                    <th class="px-6 py-4">Email</th>
                                    <th class="px-6 py-4">Catégorie</th>
                                    <th class="px-6 py-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php foreach ($suppliers as $supplier): ?>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= esc($supplier['nom']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            <?= esc($supplier['email']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            <?= esc($supplier['category']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="<?= site_url('/admin/supplier/view/' . $supplier['id']) ?>" 
                                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                                Voir détails
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($suppliers)): ?>
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                            Aucun fournisseur trouvé. Ajoutez un nouveau fournisseur pour commencer.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Modals -->
    <?php include 'modals/add_supplier_modal.php'; ?>
    <?php include 'modals/success_modal.php'; ?>

    <script>
        function filterTable() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const categoryFilter = document.getElementById('category-filter').value.toLowerCase();
            const table = document.getElementById('supplier-table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let showRow = true;

                const nomCell = cells[0];
                if (nomCell) {
                    const textValue = nomCell.textContent || nomCell.innerText;
                    if (textValue.toLowerCase().indexOf(searchInput) === -1) {
                        showRow = false;
                    }
                }

                const categoryCell = cells[2];
                if (categoryCell && categoryFilter) {
                    const categoryValue = categoryCell.textContent || categoryCell.innerText;
                    if (categoryValue.toLowerCase() !== categoryFilter) {
                        showRow = false;
                    }
                }

                rows[i].style.display = showRow ? "" : "none";
            }
        }
    </script>
</body>

</html>