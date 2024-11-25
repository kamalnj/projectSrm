<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de Contact</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen flex flex-col items-center justify-start py-8 space-y-8">
        <form method="post" action="/my-informations-contact/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-3/4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Informations de Contact</h2>
            <p class="text-sm text-gray-600 mb-4">
                Les champs marqués d'un astérisque (<span class="text-red-500">*</span>) sont obligatoires. 
                Les autres champs sont facultatifs.
            </p>
            <div class="grid grid-cols-1 gap-4">
                <!-- Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-600">Nom <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre nom" >
                </div>
                <!-- Prénom -->
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-600">Prénom <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="prenom"
                        id="prenom"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre prénom" >
                </div>
                <!-- Fonction au sein de l'entreprise -->
                <div>
                    <label for="fonction" class="block text-sm font-medium text-gray-600">Fonction au sein de l'entreprise</label>
                    <input
                        type="text"
                        name="fonction"
                        id="fonction"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre fonction">
                </div>
                <!-- Téléphone direct -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-600">Téléphone direct <span class="text-red-500">*</span></label>
                    <input
                        type="tel"
                        name="telephone"
                        id="telephone"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre téléphone direct"  pattern="[0-9]*">
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre email" >
                </div>
            </div>

            <!-- Bouton Précédent -->
            <div class="flex justify-between">
                <button
                    type="button"
                    onclick="window.location.href='/my-informations-clients'"
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
        
        <!-- Affichage de tous les contacts -->
        <?php if (isset($contacts) && !empty($contacts)): ?>
            <div class="p-6 bg-white shadow-md rounded-lg w-3/4">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Liste des contacts</h2>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fonction</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($contacts as $contact): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['nom']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['prenom']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['fonction']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['telephone']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($contact['email']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button type="button" 
                                                onclick="openDeleteModal(<?= $contact['id'] ?>)"
                                                class="text-gray-400 hover:text-red-700 rounded-lg text-sm p-1.5">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if (empty($contacts)): ?>
                    <p class="text-gray-500 text-center py-4">Aucun contact trouvé</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Affichage des messages de succès/erreur -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-md">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Après la table, ajoutez le modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeDeleteModal()">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Fermer</span>
                </button>
                <svg class="text-gray-400 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <p class="mb-4 text-gray-500">Êtes-vous sûr de vouloir supprimer ce contact ?</p>
                <form id="deleteForm" method="post" class="inline">
                    <div class="flex justify-center items-center space-x-4">
                        <button type="button" 
                                onclick="closeDeleteModal()"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">
                            Non, annuler
                        </button>
                        <button type="submit" 
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                            Oui, supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Ajoutez le script JavaScript à la fin du fichier -->
    <script>
    function openDeleteModal(contactId) {
        const modal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        
        // Mettre à jour l'action du formulaire avec l'ID du contact
        deleteForm.action = `/my-informations-contact/delete/${contactId}`;
        
        // Afficher le modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        
        // Cacher le modal
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Fermer le modal si on clique en dehors
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
    </script>

</body>

</html>