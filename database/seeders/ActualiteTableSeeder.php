<?php

namespace Database\Seeders;

use App\Models\Actualite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ActualiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            "Nouveau projet immobilier lancé à Abidjan",
            "SCI SAGES remporte un prix d’excellence",
            "Visite guidée de notre dernière réalisation",
            "Conseils pour investir dans l’immobilier",
            "Tendances architecturales 2025",
            "Inauguration d’un nouveau siège social",
            "L’importance de la durabilité dans nos projets",
            "Retour sur notre séminaire annuel",
            "Zoom sur l’équipe SCI SAGES",
            "Nos engagements pour l’environnement",
            "Comment réussir son premier achat",
            "Le marché immobilier en Côte d’Ivoire",
            "Portrait d’un client satisfait",
            "Sécurité sur les chantiers : nos actions",
            "SCI SAGES fête ses 10 ans",
            "Nouveaux partenariats stratégiques",
            "L’innovation au cœur de nos métiers",
            "Retour en images sur nos chantiers",
            "Nos valeurs au quotidien",
            "Pourquoi choisir SCI SAGES ?"
        ];

        $images = [
            "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1503389152951-9c3d8b6e9c94?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101178521-c1a9136a3fdc?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1503389152951-9c3d8b6e9c94?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101178521-c1a9136a3fdc?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1503389152951-9c3d8b6e9c94?auto=format&fit=crop&w=800&q=80",
            "https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=800&q=80",
        ];

        for ($i = 0; $i < 20; $i++) {
            $titre = $titles[$i];
            $description = "Ceci est un exemple d’actualité pour le blog SCI SAGES. Découvrez nos projets, nos conseils et notre actualité immobilière.";
            $slug = Str::slug($titre) . '-' . ($i+1);

            $actualite = Actualite::create([
                'libelle' => $titre,
                'slug' => $slug,
                'description' => $description,
                'is_active' => true,
                'position' => $i+1,
            ]);

            // Télécharger et associer l'image principale (si MediaLibrary est configurée)
            try {
                $imageUrl = $images[$i];
                $imageContents = file_get_contents($imageUrl);
                $tmpFilePath = sys_get_temp_dir() . '/actualite_' . uniqid() . '.jpg';
                file_put_contents($tmpFilePath, $imageContents);
                $actualite->addMedia($tmpFilePath)->toMediaCollection('image_principale');
                unlink($tmpFilePath);
            } catch (\Exception $e) {
                // Ignore si l'image ne peut pas être téléchargée
            }
        }
    }
}
