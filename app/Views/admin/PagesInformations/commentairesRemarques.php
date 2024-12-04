<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Commentaires et Remarques</h2>
    <div class="space-y-6">
        <?php if (!empty($commentairesRemarques)): ?>
            <?php foreach ($commentairesRemarques as $comment): ?>
                <div class="bg-gray-50 rounded-lg p-4">
                    <!-- Commentaire -->
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Commentaire</p>
                        <p class="text-gray-600"><?= esc($comment['commentaire'] ?? 'Aucun commentaire') ?></p>
                    </div>
                    <!-- Remarque -->
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-2">Remarque</p>
                        <p class="text-gray-600"><?= esc($comment['remarque'] ?? 'Aucune remarque') ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-8 text-gray-500">
                <p>Aucun commentaire ou remarque trouvé.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
