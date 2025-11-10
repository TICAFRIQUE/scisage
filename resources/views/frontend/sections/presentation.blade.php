<style>
    .presentation-section {
        background: var(--light-gray);
        padding: 120px 0;
    }

    .section-title {
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 3rem;
        color: var(--dark-brown);
    }

    .section-subtitle {
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        margin-bottom: 1rem;
        text-align: center;
    }

    .presentation-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        margin-bottom: 5rem;
    }

    .presentation-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--dark-gray);
    }

    .presentation-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-medium);
    }

    .presentation-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .director-section {
        background: var(--white);
        border-radius: 20px;
        padding: 3rem;
        margin: 3rem 0;
        box-shadow: var(--shadow-light);
        text-align: center;
    }

    .director-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 2rem;
        border: 4px solid var(--primary-gold);
    }

    .director-quote {
        font-size: 1.3rem;
        font-style: italic;
        color: var(--dark-brown);
        margin-bottom: 1rem;
    }

    .director-name {
        font-weight: 700;
        color: var(--primary-gold);
        font-size: 1.1rem;
    }

    .values-section {
        margin-top: 5rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .value-card {
        background: var(--white);
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: var(--shadow-light);
        transition: all 0.4s ease;
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-medium);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        color: var(--dark-brown);
    }

    .value-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--dark-brown);
    }

    .value-description {
        color: var(--dark-gray);
        line-height: 1.6;
    }
</style>


 <section id="presentation" class="presentation-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">À propos de nous</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Qui sommes-nous ?</h2>

                <div class="presentation-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="presentation-text">
                        <p>SCI SAGES est un promoteur immobilier de référence, spécialisé dans la vente et la
                            construction de maisons modernes. Depuis notre création, nous nous engageons à transformer
                            vos rêves immobiliers en réalité.</p>
                        <p>Notre expertise couvre tous les aspects de l'immobilier résidentiel : de la conception
                            architecturale à la livraison clés en main, en passant par l'accompagnement personnalisé de
                            nos clients tout au long de leur parcours.</p>
                        <p>Avec une équipe de professionnels passionnés et expérimentés, nous garantissons la qualité,
                            l'innovation et le respect des délais sur chacun de nos projets.</p>
                    </div>
                    <div class="presentation-image">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Chantier SCI SAGES" />
                    </div>
                </div>

                <!-- Mot du Directeur Général -->
                <div class="director-section" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                        alt="Directeur Général" class="director-photo" />
                    <p class="director-quote">"Notre mission est de construire plus que des maisons : nous bâtissons
                        les fondations de vos futurs souvenirs."</p>
                    <p class="director-name">- Jean-Baptiste KOUASSI, Directeur Général</p>
                </div>

                <!-- Nos valeurs -->
                <div class="values-section" id="valeurs" data-aos="fade-up" data-aos-delay="600">
                    <div class="section-subtitle">Nos engagements</div>
                    <h3 class="section-title">Nos valeurs et engagements</h3>
                    <div class="values-grid">
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="value-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4 class="value-title">Confiance</h4>
                            <p class="value-description">Nous bâtissons des relations durables basées sur la
                                transparence et l'honnêteté avec chacun de nos clients.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="value-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <h4 class="value-title">Qualité</h4>
                            <p class="value-description">Nous sélectionnons les meilleurs matériaux et travaillons avec
                                des artisans qualifiés pour garantir l'excellence.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="value-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h4 class="value-title">Innovation</h4>
                            <p class="value-description">Nous intégrons les dernières technologies et tendances
                                architecturales dans nos conceptions.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="400">
                            <div class="value-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <h4 class="value-title">Satisfaction client</h4>
                            <p class="value-description">Votre satisfaction est notre priorité absolue. Nous vous
                                accompagnons jusqu'à la remise des clés et au-delà.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>