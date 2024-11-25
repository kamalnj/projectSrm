<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyInfoFLRModel extends Model
{
    protected $table = 'company_info_f_l_r'; // Nom de la table
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = [
        'supplier_id',
        'chiffre_affaires_1',
        'chiffre_affaires_2',
        'chiffre_affaires_3',
        'conditions_paiement',
        'modalites_facturation',
        'principaux_actionnaires',
        'representant_legal',
        'qualite_representant_legal',
        'maison_mere_filiales',
        'certifications_qualite',
        'licences_autorisations',
        'polices_assurances',
        'plan_continuite',
        'politique_rse',
        'pratiques_ethiques',
    ];
} 