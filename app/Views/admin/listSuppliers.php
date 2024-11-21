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

    <!-- Main Section -->
    <section class="bg-gray-50 dark:bg-gray-900 p-6 sm:p-8 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <!-- Top Bar -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <!-- Search Bar -->
                    <div class="w-full md:w-1/2 relative">
                        <label for="search-input" class="sr-only">Search</label>
                        <div class="flex items-center w-full">
                            <input type="text" id="search-input" class="w-full p-2 pl-10 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500" placeholder="Search Supplier by Name" onkeyup="filterTable()">
                            <svg class="absolute left-3 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <!-- Updated Add Supplier Button -->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center justify-center px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg transition duration-300 ease-in-out transform hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 focus:outline-none dark:bg-blue-700 dark:hover:bg-blue-600">
                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Supplier
                        </button>
                    </div>

                </div>

                <!-- Supplier Table -->
                <div id="results" class="overflow-x-auto mt-6">
                    <?php if (!empty($suppliers)): ?>
                        <table id="supplier-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Supplier Name</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($suppliers as $supplier): ?>
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= esc($supplier['nom']); ?></td>
                                        <td class="px-4 py-3"><?= esc($supplier['email']); ?></td>
                                        <td class="px-4 py-3"><?= esc($supplier['category']); ?></td>
                                        <td class="px-4 py-3">
                                            <button type="button" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-sm font-medium text-gray-900 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">View</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($suppliers)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center p-4 text-gray-500">No suppliers found. Add a new supplier to get started.</td>
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
            const input = document.getElementById('search-input');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('supplier-table');
            const rows = table.getElementsByTagName('tr');

            // Loop through all table rows and hide those that don't match the search query in the 'nom' column
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let showRow = false;

                const nomCell = cells[0];
                if (nomCell) {
                    const textValue = nomCell.textContent || nomCell.innerText;
                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                        showRow = true;
                    }
                }

                // Show or hide the row based on the filter result
                if (showRow) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>