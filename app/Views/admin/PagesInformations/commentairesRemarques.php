<div class="bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Commentaires et Remarques</h2>
    <div class="grid grid-cols-1 gap-4">
        <?php if (!empty($commentairesRemarques)): ?>
            <?php foreach ($commentairesRemarques as $comment): ?>
                <!-- Commentaire -->
                <div>
                    <p class="text-sm text-gray-500">Commentaire</p>
                    <p class="font-medium"><?= esc($comment['commentaire'] ?? 'Aucun commentaire') ?></p>
                </div>
                <!-- Remarque -->
                <div>
                    <p class="text-sm text-gray-500">Remarque</p>
                    <p class="font-medium"><?= esc($comment['remarque'] ?? 'Aucune remarque') ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun commentaire ou remarque trouvé.</p>
        <?php endif; ?>
    </div>
</div>
