<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires et Remarques</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen flex items-center justify-center">
        <form id="commentForm" method="post" action="/my-informations-commentaires/store" class="space-y-4 p-8 bg-white shadow-md rounded-lg w-3/4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Commentaires et Remarques</h2>
            <div class="grid grid-cols-1 gap-4">
                <!-- Commentaire -->
                <div>
                    <label for="commentaire" class="block text-sm font-medium text-gray-600">Commentaire</label>
                    <input
                        type="text"
                        name="commentaire"
                        id="commentaire"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre commentaire"
                        value="<?= isset($data['commentaire']) ? htmlspecialchars($data['commentaire']) : '' ?>"
                        required>
                </div>
                <!-- Remarque -->
                <div>
                    <label for="remarque" class="block text-sm font-medium text-gray-600">Remarque</label>
                    <input
                        type="text"
                        name="remarque"
                        id="remarque"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Votre remarque"
                        value="<?= isset($data['remarque']) ? htmlspecialchars($data['remarque']) : '' ?>"
                        required>
                </div>
            </div>

            <!-- Bouton Précédent -->
            <div class="flex justify-between">
                <button
                    type="button"
                    onclick="window.location.href='/my-informations-contact'"
                    class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Précédent
                </button>
                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-1/6 bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Soumettre
                </button>
            </div>
        </form>
    </div>

    <!-- Modal de succès -->
    <div id="successModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeSuccessModal()">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Fermer</span>
                </button>
                <div class="w-12 h-12 rounded-full bg-green-100 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Succès</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900">Données enregistrées avec succès!</p>
                <button type="button" onclick="closeSuccessModal()" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Continuer
                </button>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Créer un objet FormData avec les données du formulaire
        const formData = new FormData(this);
        
        // Envoyer les données via fetch
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Afficher le modal de succès
                openSuccessModal();
            } else {
                // Gérer l'erreur si nécessaire
                alert(data.message || 'Une erreur est survenue');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue');
        });
    });

    function openSuccessModal() {
        const modal = document.getElementById('successModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeSuccessModal() {
        const modal = document.getElementById('successModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        // Rediriger vers la page suivante ou recharger la page
        window.location.href = '/dashboard';
    }

    // Fermer le modal si on clique en dehors
    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSuccessModal();
        }
    });
    </script>
</body>

</html>