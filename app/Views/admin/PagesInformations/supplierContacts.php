<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Contacts du Fournisseur</h2>
    <div class="space-y-6">
        <?php if (!empty($supplierContacts)): ?>
            <?php foreach ($supplierContacts as $contact): ?>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nom et Prénom -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-2">Nom et Prénom</p>
                            <p class="text-gray-600">
                                <?= esc($contact['nom'] ?? 'Non spécifié') ?> <?= esc($contact['prenom'] ?? '') ?>
                            </p>
                        </div>
                        <!-- Fonction -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-2">Fonction</p>
                            <p class="text-gray-600"><?= esc($contact['fonction'] ?? 'Non spécifié') ?></p>
                        </div>
                        <!-- Téléphone -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-2">Téléphone</p>
                            <p class="text-gray-600"><?= esc($contact['telephone'] ?? 'Non spécifié') ?></p>
                        </div>
                        <!-- Email -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-2">Email</p>
                            <p class="text-gray-600"><?= esc($contact['email'] ?? 'Non spécifié') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-8 text-gray-500">
                <p>Aucun contact trouvé.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
