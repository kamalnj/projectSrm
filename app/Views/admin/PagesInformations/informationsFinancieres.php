<div class="bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Informations Financières</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Chiffre d'affaires Année 1 -->
        <div>
            <p class="text-sm text-gray-500">Chiffre d'affaires (Année 1)</p>
            <p class="font-medium"><?= esc($informationsFinancieres['chiffre_affaires_1']) ?></p>
        </div>
        <!-- Chiffre d'affaires Année 2 -->
        <div>
            <p class="text-sm text-gray-500">Chiffre d'affaires (Année 2)</p>
            <p class="font-medium"><?= esc($informationsFinancieres['chiffre_affaires_2']) ?></p>
        </div>
        <!-- Chiffre d'affaires Année 3 -->
        <div>
            <p class="text-sm text-gray-500">Chiffre d'affaires (Année 3)</p>
            <p class="font-medium"><?= esc($informationsFinancieres['chiffre_affaires_3']) ?></p>
        </div>
        <!-- Conditions de paiement -->
        <div>
            <p class="text-sm text-gray-500">Conditions de paiement</p>
            <p class="font-medium"><?= esc($informationsFinancieres['conditions_paiement']) ?></p>
        </div>
        <!-- Modalités de facturation -->
        <div>
            <p class="text-sm text-gray-500">Modalités de facturation</p>
            <p class="font-medium"><?= esc($informationsFinancieres['modalites_facturation']) ?></p>
        </div>
        <!-- Principaux actionnaires -->
        <div>
            <p class="text-sm text-gray-500">Principaux actionnaires</p>
            <p class="font-medium"><?= esc($informationsFinancieres['principaux_actionnaires']) ?></p>
        </div>
        <!-- Représentant légal -->
        <div>
            <p class="text-sm text-gray-500">Représentant légal</p>
            <p class="font-medium"><?= esc($informationsFinancieres['representant_legal']) ?></p>
        </div>
        <!-- Qualité du représentant légal -->
        <div>
            <p class="text-sm text-gray-500">Qualité du représentant légal</p>
            <p class="font-medium"><?= esc($informationsFinancieres['qualite_representant_legal']) ?></p>
        </div>
        <!-- Maison mère / Filiales -->
        <div>
            <p class="text-sm text-gray-500">Maison mère / Filiales</p>
            <p class="font-medium"><?= esc($informationsFinancieres['maison_mere_filiales']) ?></p>
        </div>
        <!-- Certifications qualité -->
        <div>
            <p class="text-sm text-gray-500">Certifications qualité</p>
            <p class="font-medium"><?= esc($informationsFinancieres['certifications_qualite']) ?></p>
        </div>
        <!-- Licences et autorisations -->
        <div>
            <p class="text-sm text-gray-500">Licences et autorisations</p>
            <p class="font-medium"><?= esc($informationsFinancieres['licences_autorisations']) ?></p>
        </div>
        <!-- Polices d'assurances -->
        <div>
            <p class="text-sm text-gray-500">Polices d'assurances</p>
            <p class="font-medium"><?= esc($informationsFinancieres['polices_assurances']) ?></p>
        </div>
        <!-- Plan de continuité -->
        <div>
            <p class="text-sm text-gray-500">Plan de continuité</p>
            <p class="font-medium"><?= esc($informationsFinancieres['plan_continuite']) ?></p>
        </div>
        <!-- Politique RSE -->
        <div>
            <p class="text-sm text-gray-500">Politique RSE</p>
            <p class="font-medium"><?= esc($informationsFinancieres['politique_rse']) ?></p>
        </div>
        <!-- Pratiques éthiques -->
        <div>
            <p class="text-sm text-gray-500">Pratiques éthiques</p>
            <p class="font-medium"><?= esc($informationsFinancieres['pratiques_ethiques']) ?></p>
        </div>
    </div>
</div>
