<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Inter font for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php include 'nav.php'; ?>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen font-[Inter]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                Supplier Documents
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Manage and view all your supplier documentation in one centralized location
            </p>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Supplier Name
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php foreach ($suppliers as $supplier): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <span class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <span class="text-indigo-700 font-medium text-sm">
                                                <?= strtoupper(substr($supplier['nom'], 0, 2)) ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($supplier['nom'], ENT_QUOTES) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button 
                                    onclick="showDocumentsModal('<?= htmlspecialchars($supplier['nom'], ENT_QUOTES) ?>', <?= htmlspecialchars(json_encode($supplier['documents']), ENT_QUOTES) ?>)"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Documents
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Enhanced Modal -->
    <div id="documents-modal" class="hidden fixed inset-0 overflow-y-auto z-50" aria-modal="true" role="dialog">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 id="modal-supplier-name" class="text-lg font-medium leading-6 text-gray-900 mb-4"></h3>
                    <div class="mt-2">
                        <ul id="modal-documents-list" class="space-y-3">
                            <!-- Documents will be added here -->
                        </ul>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button 
                        type="button" 
                        onclick="closeModal()"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDocumentsModal(supplierName, documents) {
            const modal = document.getElementById('documents-modal');

            // Set supplier name
            document.getElementById('modal-supplier-name').textContent = supplierName;

            // Populate document list
            const documentsList = document.getElementById('modal-documents-list');
            documentsList.innerHTML = '';

            if (documents.length === 0) {
                const noDocuments = document.createElement('li');
                noDocuments.textContent = 'No documents available.';
                documentsList.appendChild(noDocuments);
            } else {
                documents.forEach(doc => {
                    const listItem = document.createElement('li');
                    listItem.className = 'mb-2';

                    const viewButton = document.createElement('a');
                    viewButton.href = `/${doc.file_path.replace('public/', '')}`;
                    viewButton.target = '_blank';
                    viewButton.textContent = `View ${doc.document_type}`;
                    viewButton.className = 'text-blue-500';

                    listItem.appendChild(viewButton);
                    documentsList.appendChild(listItem);
                });
            }

            // Show modal
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function closeModal() {
            const modal = document.getElementById('documents-modal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
        }
    </script>
</body>
</html>