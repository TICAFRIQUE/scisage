<?php

namespace Database\Seeders;

use App\Models\Equipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les anciens enregistrements
        Equipe::truncate();

        $equipes = [
            [
                'nom' => 'KOUADIO',
                'prenoms' => 'Jean-Baptiste',
                'fonction' => 'Directeur Général',
                'description' => 'Expert en développement immobilier avec plus de 15 ans d\'expérience. Visionnaire passionné par l\'innovation architecturale et le développement durable.',
                'email' => 'j.kouadio@scisages.ci',
                'telephone' => '+225 07 08 09 10 11',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'TRAORE',
                'prenoms' => 'Aminata',
                'fonction' => 'Directrice Administrative et Financière',
                'description' => 'Experte en gestion financière et administrative. Garante de la stabilité économique et de la croissance durable de l\'entreprise.',
                'email' => 'a.traore@scisages.ci',
                'telephone' => '+225 07 12 13 14 15',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1494790108755-2616b612b3?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'BROU',
                'prenoms' => 'Michel',
                'fonction' => 'Architecte Principal',
                'description' => 'Architecte créatif spécialisé dans les projets résidentiels haut de gamme. Alliant esthétique moderne et fonctionnalité optimale.',
                'email' => 'm.brou@scisages.ci',
                'telephone' => '+225 07 16 17 18 19',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'KONE',
                'prenoms' => 'Fatou',
                'fonction' => 'Chef de Projet',
                'description' => 'Gestionnaire de projets expérimentée, elle coordonne les équipes et assure le respect des délais et budgets pour chaque réalisation.',
                'email' => 'f.kone@scisages.ci',
                'telephone' => '+225 07 20 21 22 23',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'DIABATE',
                'prenoms' => 'Ibrahim',
                'fonction' => 'Ingénieur en Bâtiment',
                'description' => 'Ingénieur structure spécialisé dans les constructions modernes. Garant de la solidité et de la conformité technique de nos réalisations.',
                'email' => 'i.diabate@scisages.ci',
                'telephone' => '+225 07 24 25 26 27',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'OUATTARA',
                'prenoms' => 'Marie-Claire',
                'fonction' => 'Responsable Commercial',
                'description' => 'Experte en relation client et négociation immobilière. Elle accompagne nos clients dans leurs choix et concrétise leurs rêves immobiliers.',
                'email' => 'm.ouattara@scisages.ci',
                'telephone' => '+225 07 28 29 30 31',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'YAO',
                'prenoms' => 'Kofi',
                'fonction' => 'Chef de Chantier',
                'description' => 'Superviseur de chantier expérimenté, il veille à la qualité d\'exécution et au respect des normes de sécurité sur tous nos sites.',
                'email' => 'k.yao@scisages.ci',
                'telephone' => '+225 07 32 33 34 35',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'ASSI',
                'prenoms' => 'Sylvie',
                'fonction' => 'Architecte d\'Intérieur',
                'description' => 'Créatrice d\'espaces de vie harmonieux et fonctionnels. Elle sublime nos réalisations par son expertise en décoration et aménagement.',
                'email' => 's.assi@scisages.ci',
                'telephone' => '+225 07 36 37 38 39',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'DAGNOGO',
                'prenoms' => 'Seydou',
                'fonction' => 'Responsable Qualité',
                'description' => 'Garant de l\'excellence de nos finitions. Il supervise les contrôles qualité et assure la conformité de tous nos livrables.',
                'email' => 's.dagnogo@scisages.ci',
                'telephone' => '+225 07 40 41 42 43',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1?w=400&h=400&fit=crop&crop=face'
            ],
            [
                'nom' => 'DOSSO',
                'prenoms' => 'Awa',
                'fonction' => 'Responsable Marketing',
                'description' => 'Stratège en communication et marketing digital. Elle développe la visibilité de nos projets et renforce notre image de marque.',
                'email' => 'a.dosso@scisages.ci',
                'telephone' => '+225 07 44 45 46 47',
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&h=400&fit=crop&crop=face'
            ]
        ];

        foreach ($equipes as $equipeData) {
            try {
                // Créer le membre de l'équipe
                $equipe = Equipe::create([
                    'nom' => $equipeData['nom'],
                    'prenoms' => $equipeData['prenoms'],
                    'fonction' => $equipeData['fonction'],
                    'description' => $equipeData['description'],
                    'is_active' => $equipeData['is_active']
                ]);

                // Ajouter l'image depuis l'URL
                if (!empty($equipeData['image_url'])) {
                    $this->addImageFromUrl($equipe, $equipeData['image_url'], $equipeData['prenoms'] . '_' . $equipeData['nom']);
                }

                Log::info("Membre d'équipe créé : " . $equipeData['prenoms'] . ' ' . $equipeData['nom']);

            } catch (\Exception $e) {
                Log::error("Erreur lors de la création du membre : " . $equipeData['prenoms'] . ' ' . $equipeData['nom'] . " - " . $e->getMessage());
            }
        }

        Log::info("Seeder EquipesTableSeeder terminé avec succès.");
    }

    /**
     * Ajouter une image depuis une URL
     */
    private function addImageFromUrl($equipe, $imageUrl, $fileName)
    {
        try {
            $tempImage = tempnam(sys_get_temp_dir(), 'equipe_image');
            
            // Télécharger l'image avec gestion d'erreur
            $imageContent = @file_get_contents($imageUrl);
            
            if ($imageContent === false) {
                Log::warning("Impossible de télécharger l'image depuis : " . $imageUrl);
                return;
            }
            
            file_put_contents($tempImage, $imageContent);

            // Vérifier que le fichier est une image valide
            $imageInfo = @getimagesize($tempImage);
            if ($imageInfo === false) {
                Log::warning("Le fichier téléchargé n'est pas une image valide : " . $imageUrl);
                unlink($tempImage);
                return;
            }

            // Déterminer l'extension basée sur le type MIME
            $extension = $this->getExtensionFromMimeType($imageInfo['mime']);
            
            $equipe->addMedia($tempImage)
                ->usingName($fileName)
                ->usingFileName($fileName . '.' . $extension)
                ->toMediaCollection('image');

            // Nettoyer le fichier temporaire
            unlink($tempImage);
            
        } catch (\Exception $e) {
            Log::error("Erreur lors de l'ajout de l'image pour {$fileName} : " . $e->getMessage());
            
            // Nettoyer le fichier temporaire en cas d'erreur
            if (file_exists($tempImage)) {
                unlink($tempImage);
            }
        }
    }

    /**
     * Obtenir l'extension de fichier depuis le type MIME
     */
    private function getExtensionFromMimeType($mimeType)
    {
        $mimeToExt = [
            'image/jpeg' => 'jpg',
            'image/jpg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp'
        ];

        return $mimeToExt[$mimeType] ?? 'jpg';
    }
}
