<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrats</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Mes Contrats</h1>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p><?= session()->getFlashdata('error') ?></p>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p><?= session()->getFlashdata('success') ?></p>
                    </div>
                <?php endif; ?>

                <?php if (empty($contract)): ?>
                    <div class="text-center py-12">
                        <div class="mx-auto h-12 w-12 text-gray-400">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun contrat disponible</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Votre contrat n'est pas encore disponible. Veuillez patienter jusqu'à ce que l'administrateur l'envoie.
                        </p>
                    </div>
                <?php else: ?>
                    <div class="space-y-6">
                        <!-- Section téléchargement du contrat -->
                        <div class="border rounded-lg p-6 flex items-center justify-between bg-gray-50">
                            <div class="flex items-center">
                                <svg class="h-10 w-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div class="ml-4">
                                    <h2 class="text-lg font-medium text-gray-900">Contrat à signer</h2>
                                    <p class="text-sm text-gray-500">Pour <?= isset($contract['nom_fournisseur']) ? $contract['nom_fournisseur'] : 'Inconnu' ?></p>
                                </div>
                            </div>
                            <a href="/user/contracts/download/<?= $contract['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                Télécharger
                            </a>
                        </div>

                        <!-- Section upload du contrat signé -->
                        <?php if (empty($signedContract)): ?>
                            <div class="border rounded-lg p-6 bg-white">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Soumettre le contrat signé</h3>
                                <form action="/user/contracts/upload-signed" method="post" enctype="multipart/form-data" class="space-y-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                            <div class="flex flex-col items-center justify-center pt-7">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                </svg>
                                                <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                    Déposez le contrat signé ici ou cliquez pour sélectionner
                                                </p>
                                            </div>
                                            <input type="file" name="signed_contract" class="opacity-0" accept=".pdf" required />
                                        </label>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                            Envoyer le contrat signé
                                        </button>
                                    </div>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="border rounded-lg p-6 bg-white">
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Contrat signé soumis</h3>
                                        <p class="text-sm text-gray-500">Le contrat signé a été envoyé avec succès.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html> 