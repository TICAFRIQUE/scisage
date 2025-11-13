<?php

namespace Database\Seeders;

use App\Models\Projet;
use App\Models\Activite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer toutes les activités
        $activites = Activite::all();

        if ($activites->isEmpty()) {
            $this->command->info('Aucune activité trouvée. Veuillez d\'abord exécuter ActivitesTableSeeder.');
            return;
        }

        // Définir les étapes génériques pour différents types d'activités
        $etapesConstruction = [
            [
                'etape' => 1,
                'libelle' => 'Étude de faisabilité',
                'description' => 'Analyse du terrain, étude géotechnique et validation des contraintes techniques et réglementaires.'
            ],
            [
                'etape' => 2,
                'libelle' => 'Conception et plans',
                'description' => 'Élaboration des plans architecturaux, calculs de structure et dossier de permis de construire.'
            ],
            [
                'etape' => 3,
                'libelle' => 'Obtention des autorisations',
                'description' => 'Dépôt et suivi du permis de construire, validation des raccordements aux réseaux.'
            ],
            [
                'etape' => 4,
                'libelle' => 'Préparation du chantier',
                'description' => 'Mise en place de la base vie, clôture du chantier et préparation des accès.'
            ],
            [
                'etape' => 5,
                'libelle' => 'Terrassement et fondations',
                'description' => 'Décapage, excavation, coulage des fondations et pose des réseaux enterrés.'
            ],
            [
                'etape' => 6,
                'libelle' => 'Gros œuvre',
                'description' => 'Élévation des murs, coulage des planchers, pose de la charpente et couverture.'
            ],
            [
                'etape' => 7,
                'libelle' => 'Second œuvre',
                'description' => 'Installation électrique, plomberie, chauffage, cloisons et isolation.'
            ],
            [
                'etape' => 8,
                'libelle' => 'Finitions intérieures',
                'description' => 'Revêtements sols et murs, peinture, pose des menuiseries intérieures.'
            ],
            [
                'etape' => 9,
                'libelle' => 'Aménagements extérieurs',
                'description' => 'Terrassements paysagers, allées, clôtures et espaces verts.'
            ],
            [
                'etape' => 10,
                'libelle' => 'Réception et livraison',
                'description' => 'Contrôles qualité, nettoyage final, remise des clés et documents de garantie.'
            ]
        ];

        $etapesArchitecture = [
            [
                'etape' => 1,
                'libelle' => 'Briefing client',
                'description' => 'Analyse des besoins, contraintes budgétaires et programme fonctionnel.'
            ],
            [
                'etape' => 2,
                'libelle' => 'Analyse du site',
                'description' => 'Étude du terrain, orientation, contraintes urbaines et réglementaires.'
            ],
            [
                'etape' => 3,
                'libelle' => 'Esquisse et concept',
                'description' => 'Première approche volumétrique et conceptuelle du projet architectural.'
            ],
            [
                'etape' => 4,
                'libelle' => 'Avant-projet sommaire',
                'description' => 'Définition des espaces, dimensions principales et matériaux de base.'
            ],
            [
                'etape' => 5,
                'libelle' => 'Avant-projet définitif',
                'description' => 'Plans détaillés, façades, coupes et choix définitifs des matériaux.'
            ],
            [
                'etape' => 6,
                'libelle' => 'Projet d\'exécution',
                'description' => 'Plans techniques détaillés, cahier des charges et dossier de consultation.'
            ],
            [
                'etape' => 7,
                'libelle' => 'Consultation entreprises',
                'description' => 'Mise en concurrence des entreprises et analyse des offres techniques.'
            ],
            [
                'etape' => 8,
                'libelle' => 'Direction de travaux',
                'description' => 'Suivi du chantier, coordination des corps d\'état et contrôle qualité.'
            ],
            [
                'etape' => 9,
                'libelle' => 'Réception travaux',
                'description' => 'Vérification de la conformité, établissement des réserves éventuelles.'
            ],
            [
                'etape' => 10,
                'libelle' => 'Assistance post-livraison',
                'description' => 'Suivi des garanties, levée des réserves et accompagnement client.'
            ]
        ];

        $etapesUrbanisme = [
            [
                'etape' => 1,
                'libelle' => 'Étude réglementaire',
                'description' => 'Analyse des documents d\'urbanisme, PLU, contraintes et servitudes.'
            ],
            [
                'etape' => 2,
                'libelle' => 'Diagnostic territorial',
                'description' => 'Étude démographique, économique et analyse des besoins du territoire.'
            ],
            [
                'etape' => 3,
                'libelle' => 'Participation citoyenne',
                'description' => 'Concertation publique, recueil des avis et attentes des habitants.'
            ],
            [
                'etape' => 4,
                'libelle' => 'Schéma directeur',
                'description' => 'Élaboration de la vision globale et des orientations d\'aménagement.'
            ],
            [
                'etape' => 5,
                'libelle' => 'Zonage et règlement',
                'description' => 'Définition des zones, règles de construction et d\'occupation des sols.'
            ],
            [
                'etape' => 6,
                'libelle' => 'Étude d\'impact',
                'description' => 'Évaluation environnementale et mesures compensatoires si nécessaire.'
            ],
            [
                'etape' => 7,
                'libelle' => 'Validation administrative',
                'description' => 'Instruction du dossier, avis des services de l\'État et enquête publique.'
            ],
            [
                'etape' => 8,
                'libelle' => 'Approbation',
                'description' => 'Vote en conseil municipal/communautaire et publication officielle.'
            ],
            [
                'etape' => 9,
                'libelle' => 'Mise en œuvre',
                'description' => 'Application opérationnelle et délivrance des autorisations d\'urbanisme.'
            ],
            [
                'etape' => 10,
                'libelle' => 'Suivi et évaluation',
                'description' => 'Monitoring de l\'application, ajustements et révisions si nécessaire.'
            ]
        ];

        $etapesVenteMaison = [
            [
                'etape' => 1,
                'libelle' => 'Visite du catalogue',
                'description' => 'Découverte de nos modèles de maisons et sélection selon vos goûts.'
            ],
            [
                'etape' => 2,
                'libelle' => 'Visite terrain',
                'description' => 'Visite physique des maisons témoins et choix de votre future habitation.'
            ],
            [
                'etape' => 3,
                'libelle' => 'Étude de financement',
                'description' => 'Montage du dossier financier et recherche de solutions de crédit adaptées.'
            ],
            [
                'etape' => 4,
                'libelle' => 'Réservation',
                'description' => 'Versement d\'un acompte de réservation et blocage de la maison choisie.'
            ],
            [
                'etape' => 5,
                'libelle' => 'Constitution du dossier',
                'description' => 'Rassemblement des pièces administratives et financières nécessaires.'
            ],
            [
                'etape' => 6,
                'libelle' => 'Signature compromis',
                'description' => 'Signature du compromis de vente et conditions suspensives.'
            ],
            [
                'etape' => 7,
                'libelle' => 'Obtention du crédit',
                'description' => 'Validation définitive du financement par les organismes bancaires.'
            ],
            [
                'etape' => 8,
                'libelle' => 'Signature acte notarié',
                'description' => 'Signature définitive chez le notaire et transfert de propriété.'
            ],
            [
                'etape' => 9,
                'libelle' => 'État des lieux',
                'description' => 'Vérification complète de la maison et remise officielle des clés.'
            ],
            [
                'etape' => 10,
                'libelle' => 'Accompagnement post-vente',
                'description' => 'Suivi des garanties, assistance technique et service après-vente.'
            ]
        ];

        // Mapper les types d'étapes selon les activités
        $etapesParType = [
            'construction' => $etapesConstruction,
            'architecture' => $etapesArchitecture,
            'urbanisme' => $etapesUrbanisme,
            'vente' => $etapesVenteMaison,
            'default' => $etapesConstruction // Par défaut
        ];

        // Créer les projets pour chaque activité
        foreach ($activites as $activite) {
            $this->command->info("Création des projets pour l'activité: {$activite->libelle}");

            // Déterminer le type d'étapes selon le libellé de l'activité
            $typeEtapes = 'default';
            $libelle = strtolower($activite->libelle);

            if (str_contains($libelle, 'construction') || str_contains($libelle, 'bâtiment')) {
                $typeEtapes = 'construction';
            } elseif (str_contains($libelle, 'architecture') || str_contains($libelle, 'conception')) {
                $typeEtapes = 'architecture';
            } elseif (str_contains($libelle, 'urbanisme') || str_contains($libelle, 'aménagement')) {
                $typeEtapes = 'urbanisme';
            } elseif (str_contains($libelle, 'vente') || str_contains($libelle, 'maison')) {
                $typeEtapes = 'vente';
            }

            $etapes = $etapesParType[$typeEtapes];

            // Créer les 10 projets pour cette activité
            foreach ($etapes as $etapeData) {
                Projet::create([
                    'etape' => $etapeData['etape'],
                    'libelle' => $etapeData['libelle'],
                    'description' => $etapeData['description'],
                    'activite_id' => $activite->id,
                    'is_active' => true,
                ]);
            }

            $this->command->info("✓ 10 projets créés pour {$activite->libelle}");
        }

        $this->command->info("🎉 Seeder des projets terminé avec succès !");
        $this->command->info("Total des projets créés: " . (count($activites) * 10));
    }
}
