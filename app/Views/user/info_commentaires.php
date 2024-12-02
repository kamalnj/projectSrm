<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires et Remarques</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form id="commentForm" method="post" action="/user/my-informations-commentaires/store" class="bg-white shadow-xl rounded-2xl p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Commentaires et Remarques</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Partagez vos commentaires et remarques
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="commentaire" class="block text-sm font-semibold text-gray-700">Commentaire</label>
                        <textarea
                            name="commentaire"
                            id="commentaire"
                            rows="4"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre commentaire"><?= isset($data['commentaire']) ? htmlspecialchars($data['commentaire']) : '' ?></textarea>
                    </div>

                    <div class="space-y-2">
                        <label for="remarque" class="block text-sm font-semibold text-gray-700">Remarque</label>
                        <textarea
                            name="remarque"
                            id="remarque"
                            rows="4"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Votre remarque"><?= isset($data['remarque']) ? htmlspecialchars($data['remarque']) : '' ?></textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button
                        type="button"
                        onclick="window.location.href='/user/my-informations-contact'"
                        class="px-6 py-3 bg-gray-600 text-white font-medium rounded-lg shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                        Précédent
                    </button>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        Soumettre
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de succès -->
    <div id="successModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Succès!</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">Vos données ont été enregistrées avec succès.</p>
                </div>
                <div class="mt-4">
                    <button 
                        onclick="closeSuccessModal()"
                        class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Continuer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                openSuccessModal();
            } else {
                alert(data.message || 'Une erreur est survenue');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue');
        });
    });

    function openSuccessModal() {
        document.getElementById('successModal').classList.remove('hidden');
    }

    function closeSuccessModal() {
        document.getElementById('successModal').classList.add('hidden');
        window.location.href = '/dashboard';
    }

    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSuccessModal();
        }
    });
    </script>
</body>

</html>