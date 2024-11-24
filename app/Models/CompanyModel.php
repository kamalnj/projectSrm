<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company_info_general'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = [
        'supplier_id',
        'date_creation',
        'effectif',
        'forme_juridique',
        'capital_social',
        'adresse_siege',
        'n_rc',
        'lieu_immatriculation',
        'n_if',
        'n_patente',
        'n_ice',
        'email',
        'telephone',
        'site_web',
    ]; // Champs autorisés pour l'insertion

    // Vous pouvez ajouter d'autres méthodes ou validations ici si nécessaire
} 