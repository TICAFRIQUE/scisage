<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            // VILLAS MODERNES
            [
                'libelle' => 'Villa Moderne Cocody',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Cocody, Abidjan',
                'caracteristique' => '4 chambres, 3 salles de bain, piscine, garage 2 places',
                'prix' => 85000000,
                'image_principale' => 'https://picsum.photos/800/600?random=1',
                'galerie' => [
                    'https://picsum.photos/800/600?random=2',
                    'https://picsum.photos/800/600?random=3',
                    'https://picsum.photos/800/600?random=4',
                    'https://picsum.photos/800/600?random=5'
                ]
            ],
            [
                'libelle' => 'Villa Contemporaine Deux Plateaux',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Deux Plateaux, Abidjan',
                'caracteristique' => '5 chambres, 4 salles de bain, jardin paysager, terrasse',
                'prix' => 120000000,
                'image_principale' => 'https://picsum.photos/800/600?random=6',
                'galerie' => [
                    'https://picsum.photos/800/600?random=7',
                    'https://picsum.photos/800/600?random=8',
                    'https://picsum.photos/800/600?random=9'
                ]
            ],
            [
                'libelle' => 'Villa de Luxe Riviera',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Riviera Golf, Abidjan',
                'caracteristique' => '6 chambres, 5 salles de bain, piscine infinity, home cinéma',
                'prix' => 200000000,
                'image_principale' => 'https://picsum.photos/800/600?random=10',
                'galerie' => [
                    'https://picsum.photos/800/600?random=11',
                    'https://picsum.photos/800/600?random=12',
                    'https://picsum.photos/800/600?random=13',
                    'https://picsum.photos/800/600?random=14'
                ]
            ],
            [
                'libelle' => 'Villa Familiale Angré',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Angré 8ème Tranche, Abidjan',
                'caracteristique' => '4 chambres, 3 salles de bain, cuisine équipée, jardin',
                'prix' => 95000000,
                'image_principale' => 'https://picsum.photos/800/600?random=15',
                'galerie' => [
                    'https://picsum.photos/800/600?random=16',
                    'https://picsum.photos/800/600?random=17'
                ]
            ],
            [
                'libelle' => 'Villa Architecturale Marcory',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Marcory Zone 4, Abidjan',
                'caracteristique' => '5 chambres, 4 salles de bain, design moderne, terrasse panoramique',
                'prix' => 110000000,
                'image_principale' => 'https://picsum.photos/800/600?random=18',
                'galerie' => [
                    'https://picsum.photos/800/600?random=19',
                    'https://picsum.photos/800/600?random=20'
                ]
            ],

            // DUPLEX
            [
                'libelle' => 'Duplex Standing Plateau',
                'categorie' => 'realisations',
                'type' => 'duplex',
                'localisation' => 'Plateau, Abidjan',
                'caracteristique' => '3 chambres, 2 salles de bain, balcon, parking privé',
                'prix' => 65000000,
                'image_principale' => 'https://picsum.photos/800/600?random=21',
                'galerie' => [
                    'https://picsum.photos/800/600?random=22',
                    'https://picsum.photos/800/600?random=23'
                ]
            ],
            [
                'libelle' => 'Duplex Moderne Yopougon',
                'categorie' => 'realisations',
                'type' => 'duplex',
                'localisation' => 'Yopougon Selmer, Abidjan',
                'caracteristique' => '4 chambres, 3 salles de bain, cuisine américaine',
                'prix' => 55000000,
                'image_principale' => 'https://picsum.photos/800/600?random=24',
                'galerie' => [
                    'https://picsum.photos/800/600?random=25',
                    'https://picsum.photos/800/600?random=26'
                ]
            ],

            // APPARTEMENTS
            [
                'libelle' => 'Appartement Luxueux Zone 4',
                'categorie' => 'realisations',
                'type' => 'appartement',
                'localisation' => 'Zone 4, Abidjan',
                'caracteristique' => '3 chambres, 2 salles de bain, vue mer, climatisé',
                'prix' => 45000000,
                'image_principale' => 'https://picsum.photos/800/600?random=27',
                'galerie' => [
                    'https://picsum.photos/800/600?random=28',
                    'https://picsum.photos/800/600?random=29'
                ]
            ],
            [
                'libelle' => 'Appartement Standing Cocody',
                'categorie' => 'realisations',
                'type' => 'appartement',
                'localisation' => 'Cocody Danga, Abidjan',
                'caracteristique' => '2 chambres, 1 salle de bain, salon spacieux, balcon',
                'prix' => 35000000,
                'image_principale' => 'https://picsum.photos/800/600?random=30',
                'galerie' => [
                    'https://picsum.photos/800/600?random=31',
                    'https://picsum.photos/800/600?random=32'
                ]
            ],

            // PROJETS EN COURS
            [
                'libelle' => 'Résidence Sérénité Bingerville',
                'categorie' => 'projets',
                'type' => 'residence',
                'localisation' => 'Bingerville, Abidjan',
                'caracteristique' => '20 villas, services communs, sécurité 24h/24',
                'prix' => 80000000,
                'image_principale' => 'https://picsum.photos/800/600?random=33',
                'galerie' => [
                    'https://picsum.photos/800/600?random=34',
                    'https://picsum.photos/800/600?random=35'
                ]
            ],
            [
                'libelle' => 'Complexe Résidentiel Grand-Bassam',
                'categorie' => 'projets',
                'type' => 'complexe',
                'localisation' => 'Grand-Bassam',
                'caracteristique' => '50 logements, piscine commune, espace vert',
                'prix' => 60000000,
                'image_principale' => 'https://picsum.photos/800/600?random=36',
                'galerie' => [
                    'https://picsum.photos/800/600?random=37',
                    'https://picsum.photos/800/600?random=38'
                ]
            ],

            // CONCEPTIONS
            [
                'libelle' => 'Design Villa Écologique Assinie',
                'categorie' => 'conceptions',
                'type' => 'villa',
                'localisation' => 'Assinie, Côte d\'Ivoire',
                'caracteristique' => 'Construction écologique, panneaux solaires, récupération eau',
                'prix' => 150000000,
                'image_principale' => 'https://picsum.photos/800/600?random=39',
                'galerie' => [
                    'https://picsum.photos/800/600?random=40',
                    'https://picsum.photos/800/600?random=41'
                ]
            ]
        ];

        // Ajouter 38 autres portfolios pour atteindre 50
        $additionalPortfolios = [
            [
                'libelle' => 'Villa Contemporaine Abobo',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Abobo Baoulé, Abidjan',
                'caracteristique' => '3 chambres, 2 salles de bain, garage, jardin',
                'prix' => 70000000,
                'image_principale' => 'https://picsum.photos/800/600?random=42'
            ],
            [
                'libelle' => 'Duplex Haut Standing Koumassi',
                'categorie' => 'realisations',
                'type' => 'duplex',
                'localisation' => 'Koumassi, Abidjan',
                'caracteristique' => '4 chambres, 3 salles de bain, terrasse',
                'prix' => 58000000,
                'image_principale' => 'https://picsum.photos/800/600?random=43'
            ],
            [
                'libelle' => 'Appartement Moderne Treichville',
                'categorie' => 'realisations',
                'type' => 'appartement',
                'localisation' => 'Treichville, Abidjan',
                'caracteristique' => '2 chambres, 1 salle de bain, balcon',
                'prix' => 30000000,
                'image_principale' => 'https://picsum.photos/800/600?random=44'
            ],
            [
                'libelle' => 'Villa de Prestige Bassam',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Grand-Bassam',
                'caracteristique' => '5 chambres, 4 salles de bain, vue océan',
                'prix' => 180000000,
                'image_principale' => 'https://picsum.photos/800/600?random=45'
            ],
            [
                'libelle' => 'Résidence Luxe Bietry',
                'categorie' => 'projets',
                'type' => 'residence',
                'localisation' => 'Bietry, Abidjan',
                'caracteristique' => '15 villas, piscine, sécurité',
                'prix' => 90000000,
                'image_principale' => 'https://picsum.photos/800/600?random=46'
            ],
            [
                'libelle' => 'Complexe Familial Songon',
                'categorie' => 'projets',
                'type' => 'complexe',
                'localisation' => 'Songon, Abidjan',
                'caracteristique' => '30 logements, aires de jeux, parking',
                'prix' => 50000000,
                'image_principale' => 'https://picsum.photos/800/600?random=47'
            ],
            [
                'libelle' => 'Villa Architectural Anyama',
                'categorie' => 'conceptions',
                'type' => 'villa',
                'localisation' => 'Anyama, Abidjan',
                'caracteristique' => '4 chambres, design futuriste, domotique',
                'prix' => 130000000,
                'image_principale' => 'https://picsum.photos/800/600?random=48'
            ],
            [
                'libelle' => 'Duplex Élégant Adjamé',
                'categorie' => 'realisations',
                'type' => 'duplex',
                'localisation' => 'Adjamé, Abidjan',
                'caracteristique' => '3 chambres, 2 salles de bain, salon double hauteur',
                'prix' => 62000000,
                'image_principale' => 'https://picsum.photos/800/600?random=49'
            ],
            [
                'libelle' => 'Appartement Luxe Riviera Palmeraie',
                'categorie' => 'realisations',
                'type' => 'appartement',
                'localisation' => 'Riviera Palmeraie, Abidjan',
                'caracteristique' => '3 chambres, 2 salles de bain, vue golf',
                'prix' => 55000000,
                'image_principale' => 'https://picsum.photos/800/600?random=50'
            ],
            [
                'libelle' => 'Villa Spacieuse Port-Bouët',
                'categorie' => 'realisations',
                'type' => 'villa',
                'localisation' => 'Port-Bouët, Abidjan',
                'caracteristique' => '4 chambres, 3 salles de bain, proche aéroport',
                'prix' => 75000000,
                'image_principale' => 'https://picsum.photos/800/600?random=51'
            ]
        ];

        // Générer 28 portfolios supplémentaires automatiquement
        $types = ['villa', 'duplex', 'appartement', 'residence'];
        $categories = ['realisations', 'projets', 'conceptions'];
        $zones = ['Cocody', 'Plateau', 'Marcory', 'Yopougon', 'Koumassi', 'Treichville', 'Abobo', 'Adjamé', 'Attécoubé', 'Bingerville'];
        
        for ($i = 0; $i < 28; $i++) {
            $type = $types[array_rand($types)];
            $categorie = $categories[array_rand($categories)];
            $zone = $zones[array_rand($zones)];
            
            $additionalPortfolios[] = [
                'libelle' => ucfirst($type) . ' Premium ' . $zone . ' ' . ($i + 1),
                'categorie' => $categorie,
                'type' => $type,
                'localisation' => $zone . ', Abidjan',
                'caracteristique' => $this->generateCaracteristique($type),
                'prix' => rand(25000000, 200000000),
                'image_principale' => 'https://picsum.photos/800/600?random=' . (52 + $i)
            ];
        }

        // Fusionner tous les portfolios
        $allPortfolios = array_merge($portfolios, $additionalPortfolios);

        foreach ($allPortfolios as $portfolioData) {
            try {
                $portfolio = Portfolio::create([
                    'libelle' => $portfolioData['libelle'],
                    'categorie' => $portfolioData['categorie'],
                    'type' => $portfolioData['type'],
                    'localisation' => $portfolioData['localisation'],
                    'caracteristique' => $portfolioData['caracteristique'],
                    'prix' => $portfolioData['prix'],
                    'is_active' => true
                ]);

                // Ajouter l'image principale avec gestion d'erreur
                if (isset($portfolioData['image_principale'])) {
                    try {
                        $portfolio->addMediaFromUrl($portfolioData['image_principale'])
                            ->toMediaCollection('image_principale');
                    } catch (\Exception $e) {
                        Log::warning('Impossible de télécharger l\'image principale pour ' . $portfolioData['libelle'] . ': ' . $e->getMessage());
                        // Utiliser une image de fallback
                        $portfolio->addMediaFromUrl('https://via.placeholder.com/800x600/cccccc/000000?text=Image+Indisponible')
                            ->toMediaCollection('image_principale');
                    }
                }

                // Ajouter la galerie si elle existe
                if (isset($portfolioData['galerie'])) {
                    foreach ($portfolioData['galerie'] as $index => $imageUrl) {
                        try {
                            $portfolio->addMediaFromUrl($imageUrl)
                                ->toMediaCollection('galerie');
                        } catch (\Exception $e) {
                            Log::warning('Impossible de télécharger l\'image de galerie pour ' . $portfolioData['libelle'] . ': ' . $e->getMessage());
                            // Utiliser une image de fallback
                            try {
                                $portfolio->addMediaFromUrl('https://via.placeholder.com/800x600/eeeeee/666666?text=Galerie+' . ($index + 1))
                                    ->toMediaCollection('galerie');
                            } catch (\Exception $fallbackError) {
                                // Ignorer si même le fallback échoue
                                Log::error('Impossible d\'ajouter l\'image de fallback: ' . $fallbackError->getMessage());
                            }
                        }
                    }
                } else {
                    // Ajouter 2-3 images par défaut à la galerie
                    for ($j = 0; $j < rand(2, 3); $j++) {
                        try {
                            $randomId = rand(100, 999);
                            $portfolio->addMediaFromUrl('https://picsum.photos/800/600?random=' . $randomId)
                                ->toMediaCollection('galerie');
                        } catch (\Exception $e) {
                            Log::warning('Impossible d\'ajouter l\'image de galerie par défaut: ' . $e->getMessage());
                            try {
                                $portfolio->addMediaFromUrl('https://via.placeholder.com/800x600/f0f0f0/999999?text=Image+' . ($j + 1))
                                    ->toMediaCollection('galerie');
                            } catch (\Exception $fallbackError) {
                                // Ignorer si même le fallback échoue
                            }
                        }
                    }
                }

                echo "Portfolio créé: " . $portfolioData['libelle'] . "\n";

            } catch (\Exception $e) {
                Log::error('Erreur lors de la création du portfolio ' . $portfolioData['libelle'] . ': ' . $e->getMessage());
                echo "Erreur pour: " . $portfolioData['libelle'] . " - " . $e->getMessage() . "\n";
            }
        }

        echo "Seeding terminé. Vérifiez les logs pour les éventuelles erreurs.\n";
    }

    private function generateCaracteristique($type)
    {
        switch ($type) {
            case 'villa':
                $chambres = rand(3, 6);
                $salles = rand(2, 4);
                return $chambres . ' chambres, ' . $salles . ' salles de bain, jardin, garage';
            
            case 'duplex':
                $chambres = rand(3, 5);
                $salles = rand(2, 3);
                return $chambres . ' chambres, ' . $salles . ' salles de bain, terrasse, parking';
            
            case 'appartement':
                $chambres = rand(1, 4);
                $salles = rand(1, 2);
                return $chambres . ' chambres, ' . $salles . ' salles de bain, balcon, climatisé';
            
            case 'residence':
                $unites = rand(10, 50);
                return $unites . ' unités, services communs, sécurité 24h/24';
            
            default:
                return '3 chambres, 2 salles de bain, moderne';
        }
    }

    private function getRandomImage()
    {
        // Utiliser Picsum pour des images plus fiables
        $randomId = rand(1, 1000);
        return "https://picsum.photos/800/600?random={$randomId}";
    }
}