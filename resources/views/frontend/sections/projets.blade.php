<style>
    .chronogram-section {
        background: var(--white);
        padding: 120px 0;
    }

    .chronogram-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        margin-top: 4rem;
    }

    .chronogram-column {
        position: relative;
    }

    .chronogram-title {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        color: var(--dark-brown);
        padding: 1.5rem;
        background: var(--gradient-gold);
        border-radius: 15px;
        color: var(--white);
    }

    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--gradient-gold);
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 3rem;
        background: var(--light-gray);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: var(--shadow-light);
        transition: all 0.4s ease;
    }

    .timeline-item:hover {
        transform: translateX(10px);
        box-shadow: var(--shadow-medium);
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -2.5rem;
        top: 2rem;
        width: 20px;
        height: 20px;
        background: var(--primary-gold);
        border-radius: 50%;
        border: 4px solid var(--white);
        box-shadow: 0 0 0 3px var(--primary-gold);
    }

    .timeline-step {
        background: var(--primary-gold);
        color: var(--white);
        font-weight: 700;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .timeline-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    .timeline-description {
        color: var(--dark-gray);
        line-height: 1.6;
    }
</style>

<section id="projets" class="chronogram-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">Notre processus</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Votre projet en 4 étapes</h2>

        <div class="chronogram-container">
            <!-- Colonne gauche : Souscrire -->
            <div class="chronogram-column" data-aos="fade-right" data-aos-delay="200">
                <h3 class="chronogram-title">Souscrire à nos maisons de rêves</h3>
                <div class="timeline">
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="timeline-step">Étape 1</div>
                        <h4 class="timeline-title">Visiter et faire son choix</h4>
                        <p class="timeline-description">Découvrez notre catalogue de maisons disponibles et
                            visitez celles qui vous intéressent. Nos conseillers vous accompagnent pour trouver
                            la maison parfaite.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="timeline-step">Étape 2</div>
                        <h4 class="timeline-title">Faire sa réservation</h4>
                        <p class="timeline-description">Réservez votre maison coup de cœur avec un acompte.
                            Nous vous accompagnons dans toutes les démarches administratives et financières.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="timeline-step">Étape 3</div>
                        <h4 class="timeline-title">Suivre l'évolution des travaux</h4>
                        <p class="timeline-description">Restez informé de l'avancement de votre maison grâce à
                            notre suivi personnalisé et nos rapports d'étape réguliers.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="timeline-step">Étape 4</div>
                        <h4 class="timeline-title">Profiter de votre espace</h4>
                        <p class="timeline-description">Recevez vos clés et emménagez dans votre nouvelle
                            maison. Notre service après-vente reste à votre disposition.</p>
                    </div>
                </div>
            </div>

            <!-- Colonne droite : Faire construire -->
            <div class="chronogram-column" data-aos="fade-left" data-aos-delay="200">
                <h3 class="chronogram-title">Faire construire votre maison de rêve</h3>
                <div class="timeline">
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="timeline-step">Étape 1</div>
                        <h4 class="timeline-title">Étude et validation du projet</h4>
                        <p class="timeline-description">Rencontrez nos architectes pour définir vos besoins,
                            votre budget et valider la faisabilité de votre projet sur votre terrain.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="timeline-step">Étape 2</div>
                        <h4 class="timeline-title">Élaboration du plan d'exécution</h4>
                        <p class="timeline-description">Conception détaillée des plans, choix des matériaux et
                            finitions. Validation du planning et signature du contrat de construction.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="timeline-step">Étape 3</div>
                        <h4 class="timeline-title">Suivre l'évolution des travaux</h4>
                        <p class="timeline-description">Construction de votre maison avec un suivi
                            hebdomadaire. Vous êtes informé de chaque étape importante du chantier.</p>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="timeline-step">Étape 4</div>
                        <h4 class="timeline-title">Profiter de votre espace</h4>
                        <p class="timeline-description">Réception de votre maison personnalisée et remise des
                            clés. Garantie décennale et service après-vente inclus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
