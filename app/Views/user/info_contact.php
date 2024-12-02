<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form method="post" action="/my-informations-contact/store" class="bg-white shadow-xl rounded-2xl p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Informations de Contact</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Les champs marqués d'un astérisque (<span class="text-red-600">*</span>) sont obligatoires
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="nom" class="block text-sm font-semibold text-gray-700">Nom <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre nom">
                    </div>

                    <div class="space-y-2">
                        <label for="prenom" class="block text-sm font-semibold text-gray-700">Prénom <span class="text-red-600">*</span></label>
                        <input
                            type="text"
                            name="prenom"
                            id="prenom"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre prénom">
                    </div>

                    <div class="space-y-2">
                        <label for="fonction" class="block text-sm font-semibold text-gray-700">Fonction</label>
                        <input
                            type="text"
                            name="fonction"
                            id="fonction"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre fonction">
                    </div>

                    <div class="space-y-2">
                        <label for="telephone" class="block text-sm font-semibold text-gray-700">Téléphone <span class="text-red-600">*</span></label>
                        <input
                            type="tel"
                            name="telephone"
                            id="telephone"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre téléphone">
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email <span class="text-red-600">*</span></label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre email">
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button
                        type="button"
                        onclick="window.location.href='/my-informations-clients'"
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

            <?php if (isset($contacts) && !empty($contacts)): ?>
                <div class="mt-12 bg-white shadow-xl rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Liste des contacts</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fonction</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($contacts as $contact): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['nom']) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['prenom']) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['fonction']) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['telephone']) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['email']) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openDeleteModal(<?= $contact['id'] ?>)" class="text-red-600 hover:text-red-900">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('message')): ?>
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal de suppression -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Confirmation de suppression</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir supprimer ce contact ?</p>
                </div>
                <form id="deleteForm" method="post">
                    <div class="flex justify-center gap-4 mt-4">
                        <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(contactId) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = `/my-informations-contact/delete/${contactId}`;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }
    </script>

</body>

</html>