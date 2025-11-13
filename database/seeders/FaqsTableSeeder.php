<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Quels sont les délais moyens pour construire une maison ?',
                'reponse' => 'Les délais varient selon le type de construction. Pour une maison individuelle standard, comptez entre 8 à 12 mois à partir de l\'obtention du permis de construire. Ce délai inclut les fondations, le gros œuvre, le second œuvre et les finitions. Les maisons sur mesure peuvent nécessiter 2 à 4 mois supplémentaires selon la complexité du projet.',
                'position' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Proposez-vous des garanties sur vos constructions ?',
                'reponse' => 'Oui, nous respectons toutes les garanties légales : garantie de parfait achèvement (1 an), garantie biennale sur les équipements (2 ans), et garantie décennale sur la structure (10 ans). Nous souscrivons également une assurance dommage-ouvrage pour votre protection. Tous nos travaux sont couverts par des attestations d\'assurance valides.',
                'position' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Comment se déroule le financement d\'un projet de construction ?',
                'reponse' => 'Nous vous accompagnons dans le montage financier de votre projet. Nous travaillons avec des courtiers partenaires pour vous obtenir les meilleures conditions de crédit. Le paiement s\'effectue par appels de fonds selon l\'avancement des travaux, conformément à la loi. Un échéancier détaillé vous est remis dès la signature du contrat.',
                'position' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Puis-je personnaliser les plans d\'une maison du catalogue ?',
                'reponse' => 'Absolument ! Nos plans sont modifiables selon vos besoins et contraintes. Vous pouvez adapter la superficie, modifier la disposition des pièces, choisir les matériaux et finitions. Nos architectes étudient la faisabilité technique et réglementaire de vos modifications. Un supplément peut s\'appliquer selon l\'ampleur des changements.',
                'position' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Intervenez-vous sur tout type de terrain ?',
                'reponse' => 'Nous construisons sur la plupart des terrains constructibles. Une étude géotechnique préalable nous permet d\'adapter les fondations aux caractéristiques du sol. Terrains en pente, zone sismique, proximité de cours d\'eau : notre bureau d\'études trouve les solutions techniques appropriées. Seuls les terrains inconstructibles ou présentant des risques majeurs sont exclus.',
                'position' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Quels sont vos tarifs au mètre carré ?',
                'reponse' => 'Nos prix varient selon le standing et les finitions choisies. Comptez entre 1 200€/m² et 1 800€/m² pour une maison traditionnelle clé en main, et entre 1 800€/m² et 2 500€/m² pour une maison contemporaine haut de gamme. Ces tarifs incluent tous les raccordements et la terrasse. Un devis personnalisé gratuit vous sera établi après étude de votre projet.',
                'position' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Comment puis-je suivre l\'avancement de mon chantier ?',
                'reponse' => 'Nous vous tenons informé régulièrement de l\'avancement des travaux. Vous recevez un rapport hebdomadaire avec photos, planning mis à jour et prochaines étapes. Des réunions de chantier sont organisées aux étapes clés. Vous avez également accès à un espace client en ligne pour consulter l\'évolution en temps réel et échanger avec notre équipe.',
                'position' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Proposez-vous des maisons écologiques et économes en énergie ?',
                'reponse' => 'Oui, nous sommes spécialisés dans la construction durable. Nous proposons des maisons BBC (Bâtiment Basse Consommation), RT2012 et RE2020. Isolation renforcée, pompe à chaleur, panneaux solaires, récupération d\'eau de pluie : nous intégrons les dernières innovations écologiques. Ces équipements vous permettent de réaliser des économies significatives sur vos factures énergétiques.',
                'position' => 8,
                'is_active' => true,
            ],
            [
                'question' => 'Que se passe-t-il en cas de malfaçons après livraison ?',
                'reponse' => 'Nous intervenons rapidement pour corriger toute malfaçon. Lors de la réception des travaux, un procès-verbal liste les éventuelles réserves à lever. Notre service après-vente traite toute réclamation dans les 48h. Selon la nature du problème, la garantie de parfait achèvement, biennale ou décennale s\'applique. Votre satisfaction est notre priorité absolue.',
                'position' => 9,
                'is_active' => true,
            ],
            [
                'question' => 'Avez-vous des maisons témoins à visiter ?',
                'reponse' => 'Oui, nous disposons de plusieurs maisons témoins dans différents styles architecturaux. Ces visites vous permettent de vous projeter et d\'apprécier la qualité de nos finitions. Les visites se font sur rendez-vous, accompagnées d\'un conseiller qui répondra à toutes vos questions. Nous organisons également des portes ouvertes régulières pour découvrir nos dernières réalisations.',
                'position' => 10,
                'is_active' => true,
            ],
        ];

        $this->command->info('Création des FAQs...');

        foreach ($faqs as $faqData) {
            Faq::create($faqData);
            $this->command->info("✓ FAQ créée: {$faqData['question']}");
        }

        $this->command->info('🎉 Seeder des FAQs terminé avec succès !');
        $this->command->info('Total des FAQs créées: ' . count($faqs));
    }
}
