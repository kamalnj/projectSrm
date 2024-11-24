<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentaireModel extends Model
{
    protected $table = 'company_info_commentaires'; 
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['supplier_id','commentaire', 'remarque']; // Champs autorisés pour l'insertion

    // Vous pouvez ajouter des règles de validation ici si nécessaire
} 