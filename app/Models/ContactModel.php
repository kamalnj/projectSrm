<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'company_info_contacts'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['user_id','nom', 'prenom', 'fonction', 'telephone', 'email']; 

    protected $useTimestamps = true;
} 