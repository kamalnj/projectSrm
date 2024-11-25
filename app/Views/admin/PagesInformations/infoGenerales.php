<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Détails Généraux</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Date de Création -->
        <div>
            <p class="text-sm text-gray-500">Date de création</p>
            <p class="font-medium"><?= esc($infoGenerales['date_creation']) ?></p>
        </div>
        <!-- Effectif -->
        <div>
            <p class="text-sm text-gray-500">Effectif</p>
            <p class="font-medium"><?= esc($infoGenerales['effectif']) ?></p>
        </div>
        <!-- Forme Juridique -->
        <div>
            <p class="text-sm text-gray-500">Forme juridique</p>
            <p class="font-medium"><?= esc($infoGenerales['forme_juridique']) ?></p>
        </div>
        <!-- Capital Social -->
        <div>
            <p class="text-sm text-gray-500">Capital social</p>
            <p class="font-medium"><?= esc($infoGenerales['capital_social']) ?></p>
        </div>
        <!-- Adresse du Siège -->
        <div>
            <p class="text-sm text-gray-500">Adresse du siège</p>
            <p class="font-medium"><?= esc($infoGenerales['adresse_siege']) ?></p>
        </div>
        <!-- Numéro RC -->
        <div>
            <p class="text-sm text-gray-500">Numéro RC</p>
            <p class="font-medium"><?= esc($infoGenerales['n_rc']) ?></p>
        </div>
        <!-- Lieu d'immatriculation -->
        <div>
            <p class="text-sm text-gray-500">Lieu d'immatriculation</p>
            <p class="font-medium"><?= esc($infoGenerales['lieu_immatriculation']) ?></p>
        </div>
        <!-- Email -->
        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="font-medium"><?= esc($infoGenerales['email']) ?></p>
        </div>
        <!-- Téléphone -->
        <div>
            <p class="text-sm text-gray-500">Téléphone</p>
            <p class="font-medium"><?= esc($infoGenerales['telephone']) ?></p>
        </div>
        <!-- Site Web -->
        <div>
            <p class="text-sm text-gray-500">Site web</p>
            <a href="<?= esc($infoGenerales['site_web']) ?>" target="_blank" class="text-blue-600 hover:underline">
                <?= esc($infoGenerales['site_web']) ?>
            </a>
        </div>
    </div>
</div>
