<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen font-[Inter]">
    <?php include 'nav.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- En-tête -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                Documents Fournisseurs
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Gérez tous les documents de vos fournisseurs en un seul endroit
            </p>
        </div>

        <!-- Conteneur principal -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($suppliers as $supplier): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <span class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span class="text-indigo-700 font-medium text-sm">
                                                    <?= strtoupper(substr($supplier['nom'], 0, 2)) ?>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($supplier['nom'], ENT_QUOTES) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button 
                                        onclick="showDocumentsModal('<?= htmlspecialchars($supplier['nom'], ENT_QUOTES) ?>', <?= htmlspecialchars(json_encode($supplier['documents']), ENT_QUOTES) ?>)"
                                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Voir les documents
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="documents-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm flex justify-center items-center z-50">
        <div class="bg-white w-11/12 md:w-2/3 lg:w-1/2 rounded-xl shadow-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 id="modal-supplier-name" class="text-xl font-semibold text-gray-900"></h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <ul id="modal-documents-list" class="space-y-3">
                        <!-- Documents dynamically added here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDocumentsModal(supplierName, documents) {
            const modal = document.getElementById('documents-modal');
            document.getElementById('modal-supplier-name').textContent = `Documents de ${supplierName}`;
            
            const documentsList = document.getElementById('modal-documents-list');
            documentsList.innerHTML = '';

            if (documents.length === 0) {
                documentsList.innerHTML = '<li class="text-gray-500 text-center py-4">Aucun document disponible</li>';
            } else {
                documents.forEach(doc => {
                    const listItem = document.createElement('li');
                    listItem.className = 'flex items-center justify-between p-3 bg-gray-50 rounded-lg';

                    const viewButton = document.createElement('a');
                    viewButton.href = `/${doc.file_path.replace('public/', '')}`;
                    viewButton.target = '_blank';
                    viewButton.className = 'flex items-center text-indigo-600 hover:text-indigo-700';
                    viewButton.innerHTML = `
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        ${doc.document_type}
                    `;

                    listItem.appendChild(viewButton);
                    documentsList.appendChild(listItem);
                });
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('documents-modal').classList.add('hidden');
        }
    </script>
</body>
</html>