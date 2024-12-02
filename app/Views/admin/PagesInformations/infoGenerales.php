<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Détails Généraux</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php
        $fields = [
            'Date de création' => $infoGenerales['date_creation'] ?? 'N/A',
            'Effectif' => $infoGenerales['effectif'] ?? 'N/A',
            'Forme juridique' => $infoGenerales['forme_juridique'] ?? 'N/A',
            'Capital social' => $infoGenerales['capital_social'] ?? 'N/A',
            'Adresse du siège' => $infoGenerales['adresse_siege'] ?? 'N/A',
            'Numéro RC' => $infoGenerales['n_rc'] ?? 'N/A',
            'Lieu d\'immatriculation' => $infoGenerales['lieu_immatriculation'] ?? 'N/A',
            'Numéro IF' => $infoGenerales['n_if'] ?? 'N/A',
            'Numéro Patente' => $infoGenerales['n_patente'] ?? 'N/A',
            'Numéro ICE' => $infoGenerales['n_ice'] ?? 'N/A',
            'Email' => $infoGenerales['email'] ?? 'N/A',
            'Téléphone' => $infoGenerales['telephone'] ?? 'N/A',
            'Site web' => $infoGenerales['site_web'] ?? 'N/A',
        ];

        foreach ($fields as $label => $value): 
        ?>
            <div>
                <p class="text-sm text-gray-500"><?= esc($label) ?></p>
                <?php if ($label === 'Site web' && !empty($infoGenerales['site_web'])): ?>
                    <a href="<?= esc($value) ?>" target="_blank" class="text-blue-600 hover:underline"><?= esc($value) ?></a>
                <?php else: ?>
                    <p class="font-medium"><?= esc($value) ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
