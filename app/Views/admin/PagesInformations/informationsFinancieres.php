<div class="bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Informations Financières</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php
        $fields = [
            'Chiffre d\'affaires (Année 1)' => $informationsFinancieres['chiffre_affaires_1'] ?? 'N/A',
            'Chiffre d\'affaires (Année 2)' => $informationsFinancieres['chiffre_affaires_2'] ?? 'N/A',
            'Chiffre d\'affaires (Année 3)' => $informationsFinancieres['chiffre_affaires_3'] ?? 'N/A',
            'Conditions de paiement' => $informationsFinancieres['conditions_paiement'] ?? 'N/A',
            'Modalités de facturation' => $informationsFinancieres['modalites_facturation'] ?? 'N/A',
            'Principaux actionnaires' => $informationsFinancieres['principaux_actionnaires'] ?? 'N/A',
            'Représentant légal' => $informationsFinancieres['representant_legal'] ?? 'N/A',
            'Qualité du représentant légal' => $informationsFinancieres['qualite_representant_legal'] ?? 'N/A',
            'Maison mère / Filiales' => $informationsFinancieres['maison_mere_filiales'] ?? 'N/A',
            'Certifications qualité' => $informationsFinancieres['certifications_qualite'] ?? 'N/A',
            'Licences et autorisations' => $informationsFinancieres['licences_autorisations'] ?? 'N/A',
            'Polices d\'assurances' => $informationsFinancieres['polices_assurances'] ?? 'N/A',
            'Plan de continuité' => isset($informationsFinancieres['plan_continuite']) 
        ? ($informationsFinancieres['plan_continuite'] ? 'Oui' : 'Non') 
        : 'N/A',
    'Politique RSE' => isset($informationsFinancieres['politique_rse']) 
        ? ($informationsFinancieres['politique_rse'] ? 'Oui' : 'Non') 
        : 'N/A',
    'Pratiques éthiques' => isset($informationsFinancieres['pratiques_ethiques']) 
        ? ($informationsFinancieres['pratiques_ethiques'] ? 'Oui' : 'Non') 
        : 'N/A',
        ];

        foreach ($fields as $label => $value): 
        ?>
            <div>
                <p class="text-sm text-gray-500"><?= esc($label) ?></p>
                <p class="font-medium"><?= esc($value) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
