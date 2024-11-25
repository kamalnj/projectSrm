<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\DocumentModel;

class DocumentsController extends Controller
{
    public function index()
    {
        return view("user/documents");
    }

    public function upload()
    {
        $model = new DocumentModel();

        // Vérifiez si le fichier a été téléchargé
        if ($this->request->getMethod() === 'post' && $this->request->getFiles('files')) {
            $files = $this->request->getFiles('files');

            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Déplacez le fichier vers le dossier de destination
                    $newName = $file->getRandomName();
                    if ($file->move(WRITEPATH . 'uploads', $newName)) { // Vérifiez si le fichier a été déplacé avec succès
                        // Enregistrez les informations du fichier dans la base de données
                        $model->save([
                            'file_name' => $file->getClientName(),
                            'file_path' => 'uploads/' . $newName,
                        ]);
                    } else {
                        // Gérer l'erreur de déplacement du fichier
                        return redirect()->to('/user/documents')->with('error', 'Erreur lors du déplacement du fichier.');
                    }
                } else {
                    // Gérer l'erreur de fichier
                    return redirect()->to('/user/documents')->with('error', 'Fichier invalide ou déjà déplacé.');
                }
            }

            return redirect()->to('/documents')->with('success', 'Tous les fichiers ont été téléchargés avec succès.');
        }

        return redirect()->to('/documents')->with('error', 'Erreur lors du téléchargement des fichiers.');
    }
}
