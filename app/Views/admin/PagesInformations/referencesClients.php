<div class="bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Références Clients</h2>
    <div class="grid grid-cols-1 gap-4">
        <?php if (!empty($referencesClients)): ?>
            <?php foreach ($referencesClients as $client): ?>
                <!-- Principaux Clients -->
                <div>
                    <p class="text-sm text-gray-500">Principaux clients</p>
                    <p class="font-medium"><?= esc($client['principaux_clients'] ?? 'Aucun client principal') ?></p>
                </div>
                <!-- Exemple de Projets -->
                <div>
                    <p class="text-sm text-gray-500">Exemple de projets</p>
                    <p class="font-medium"><?= esc($client['exemple_projets'] ?? 'Aucun exemple de projet') ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune référence client trouvée.</p>
        <?php endif; ?>
    </div>
</div>
