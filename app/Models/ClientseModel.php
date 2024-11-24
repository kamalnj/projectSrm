<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientseModel extends Model
{
    protected $table = 'company_info_clients'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['supplier_id','principaux_clients', 'exemple_projets']; 

    protected $returnType = 'array'; 

    protected $createdFileds = 'created_at';
    protected $updatedFileds = 'updated_at';
    
} 