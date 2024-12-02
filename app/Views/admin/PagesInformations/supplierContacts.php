<div class="bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Contacts du Fournisseur</h2>
    <div class="grid grid-cols-1 gap-4">
        <?php if (!empty($supplierContacts)): ?>
            <?php foreach ($supplierContacts as $contact): ?>
                <!-- Nom -->
                <div>
                    <p class="text-sm text-gray-500">Nom</p>
                    <p class="font-medium"><?= esc($contact['nom'] ?? 'Non spécifié') ?></p>
                </div>
                <!-- Prénom -->
                <div>
                    <p class="text-sm text-gray-500">Prénom</p>
                    <p class="font-medium"><?= esc($contact['prenom'] ?? 'Non spécifié') ?></p>
                </div>
                <!-- Fonction -->
                <div>
                    <p class="text-sm text-gray-500">Fonction</p>
                    <p class="font-medium"><?= esc($contact['fonction'] ?? 'Non spécifié') ?></p>
                </div>
                <!-- Téléphone -->
                <div>
                    <p class="text-sm text-gray-500">Téléphone</p>
                    <p class="font-medium"><?= esc($contact['telephone'] ?? 'Non spécifié') ?></p>
                </div>
                <!-- Email -->
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium"><?= esc($contact['email'] ?? 'Non spécifié') ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun contact trouvé.</p>
        <?php endif; ?>
    </div>
</div>
