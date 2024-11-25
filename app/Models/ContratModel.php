<?php

namespace App\Models;

use CodeIgniter\Model;

class ContratModel extends Model
{
    protected $table            = 'contracts';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['fournisseur_id','nom_fournisseur','pdf_path'];



}
