<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'supplier_id',
        'document_type',
        'file_name',
        'file_path',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getSupplierDocuments($supplierId)
    {
        $documents = $this->where('supplier_id', $supplierId)->findAll();
        $formattedDocuments = [];
        
        foreach ($documents as $document) {
            $formattedDocuments[$document['document_type']] = [
                'file_name' => $document['file_name'],
                'file_path' => $document['file_path']
            ];
        }
        
        return $formattedDocuments;
    }

    public function saveOrUpdateDocument($supplierId, $documentType, $fileName, $filePath)
    {
        $existingDoc = $this->where('supplier_id', $supplierId)
                           ->where('document_type', $documentType)
                           ->first();

        if ($existingDoc) {
            // Supprimer l'ancien fichier
            if (!empty($existingDoc['file_path'])) {
                $oldPath = WRITEPATH . $existingDoc['file_path'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            // Mettre à jour le document
            return $this->update($existingDoc['id'], [
                'file_name' => $fileName,
                'file_path' => $filePath
            ]);
        }

        // Créer un nouvel enregistrement
        return $this->insert([
            'supplier_id' => $supplierId,
            'document_type' => $documentType,
            'file_name' => $fileName,
            'file_path' => $filePath
        ]);
    }
} 