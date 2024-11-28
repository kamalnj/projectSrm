<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger des fichiers</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Documents requis</h1>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <form action="/documents/upload" method="post" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- RC -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">RC</h3>
                    <input type="file" name="documents[rc]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['rc'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['rc']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>

                <!-- Attestation régularité fiscale -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">Attestation régularité fiscale</h3>
                    <input type="file" name="documents[attestation_fiscale]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['attestation_fiscale'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['attestation_fiscale']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>

                <!-- Attestation CNSS -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">Attestation CNSS</h3>
                    <input type="file" name="documents[attestation_cnss]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['attestation_cnss'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['attestation_cnss']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>

                <!-- Attestation RIB -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">Attestation RIB</h3>
                    <input type="file" name="documents[attestation_rib]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['attestation_rib'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['attestation_rib']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>

                <!-- Bilan -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">Bilan des 3 dernières années</h3>
                    <input type="file" name="documents[bilan]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['bilan'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['bilan']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>

                <!-- Attestation d'identification -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold mb-4">Attestation d'identification fiscale</h3>
                    <input type="file" name="documents[attestation_identification]" accept=".pdf,.jpg,.jpeg,.png" class="w-full">
                    <?php if (isset($documents['attestation_identification'])): ?>
                        <p class="text-sm text-blue-600 mt-2">
                            Fichier actuel : <?= $documents['attestation_identification']['file_name'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-sm text-gray-500 mt-2">Format: PDF, JPG, PNG</p>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                    Téléverser tous les documents
                </button>
            </div>
        </form>
    </div>
</body>

</html>