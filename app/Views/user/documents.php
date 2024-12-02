<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger des fichiers</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <?php include 'navUser.php'; ?>
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Documents requis</h1>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r" role="alert">
                <p class="font-medium">Erreur</p>
                <p><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r" role="alert">
                <p class="font-medium">Succès</p>
                <p><?= session()->getFlashdata('success') ?></p>
            </div>
        <?php endif; ?>

        <form action="/user/documents/upload" method="post" enctype="multipart/form-data" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- RC -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">RC</h3>
                        </div>
                        <div class="relative">
                            <input type="file" 
                                name="documents[rc]" 
                                accept=".pdf,.jpg,.jpeg,.png" 
                                class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100
                                    cursor-pointer">
                        </div>
                        <?php if (isset($documents['rc'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['rc']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>

                <!-- Attestation régularité fiscale -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">Attestation régularité fiscale</h3>
                        </div>
                        <div class="relative">
                            <input type="file" name="documents[attestation_fiscale]" accept=".pdf,.jpg,.jpeg,.png" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        </div>
                        <?php if (isset($documents['attestation_fiscale'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['attestation_fiscale']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>

                <!-- Attestation CNSS -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">Attestation CNSS</h3>
                        </div>
                        <div class="relative">
                            <input type="file" name="documents[attestation_cnss]" accept=".pdf,.jpg,.jpeg,.png" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        </div>
                        <?php if (isset($documents['attestation_cnss'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['attestation_cnss']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>

                <!-- Attestation RIB -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">Attestation RIB</h3>
                        </div>
                        <div class="relative">
                            <input type="file" name="documents[attestation_rib]" accept=".pdf,.jpg,.jpeg,.png" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        </div>
                        <?php if (isset($documents['attestation_rib'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['attestation_rib']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>

                <!-- Bilan -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">Bilan des 3 dernières années</h3>
                        </div>
                        <div class="relative">
                            <input type="file" name="documents[bilan]" accept=".pdf,.jpg,.jpeg,.png" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        </div>
                        <?php if (isset($documents['bilan'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['bilan']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>

                <!-- Attestation d'identification -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <h3 class="font-semibold text-gray-900">Attestation d'identification fiscale</h3>
                        </div>
                        <div class="relative">
                            <input type="file" name="documents[attestation_identification]" accept=".pdf,.jpg,.jpeg,.png" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                cursor-pointer">
                        </div>
                        <?php if (isset($documents['attestation_identification'])): ?>
                            <div class="mt-3 flex items-center text-sm text-blue-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Fichier actuel : <?= $documents['attestation_identification']['file_name'] ?></span>
                            </div>
                        <?php endif; ?>
                        <p class="mt-2 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Format accepté : PDF, JPG, PNG
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-xl font-medium
                    hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                    transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>
                    Téléverser les documents
                </button>
            </div>
        </form>
    </div>

    <script>
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const fileName = this.files[0]?.name;
                if (fileName) {
                    const parent = this.closest('div');
                    const fileInfo = document.createElement('div');
                    fileInfo.className = 'mt-2 text-sm text-gray-600';
                    fileInfo.innerHTML = `<i class="fas fa-file mr-2"></i>${fileName}`;
                    
                    const oldInfo = parent.querySelector('.file-info');
                    if (oldInfo) oldInfo.remove();
                    
                    fileInfo.classList.add('file-info');
                    parent.appendChild(fileInfo);
                }
            });
        });
    </script>
</body>

</html>