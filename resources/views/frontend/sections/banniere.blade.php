<style>
    .hero-section {
        background: linear-gradient(rgba(60, 36, 21, 0.7), rgba(139, 69, 19, 0.5)),
            url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: var(--white);
        padding: 200px 0 150px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-section h1 {
        font-size: 4rem;
        font-weight: 800;
        margin-bottom: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .hero-options {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin: 3rem 0;
        flex-wrap: wrap;
    }

    .hero-option {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 2px solid var(--primary-gold);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        min-width: 300px;
        transition: all 0.4s ease;
    }

    .hero-option:hover {
        transform: translateY(-10px);
        background: rgba(212, 175, 55, 0.2);
    }

    .hero-option h3 {
        color: var(--secondary-gold);
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }

    .hero-central-text {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 4rem 0 3rem;
        color: var(--secondary-gold);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-form {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 3rem;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: var(--shadow-heavy);
        color: var(--dark-brown);
    }

    .form-control {
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }

    .btn-primary-custom {
        background: var(--gradient-gold);
        border: none;
        color: var(--dark-brown);
        padding: 1rem 3rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px;
        transition: all 0.4s ease;
        width: 100%;
    }

    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }
</style>

<section id="accueil" class="hero-section">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <!-- Encadrés côte à côte -->
            <div class="hero-options">
                <div class="hero-option" data-aos="fade-right" data-aos-delay="200">
                    <h3><i class="fas fa-home"></i> Souscrire à nos maisons de rêves</h3>
                    <p>Découvrez notre sélection de maisons modernes prêtes à vous accueillir</p>
                </div>
                <div class="hero-option" data-aos="fade-left" data-aos-delay="400">
                    <h3><i class="fas fa-hammer"></i> Faites construire votre maison de rêve</h3>
                    <p>Concevons ensemble la maison qui vous ressemble</p>
                </div>
            </div>

            <!-- Texte central -->
            <h1 class="hero-central-text" data-aos="zoom-in" data-aos-delay="600">
                Démarrez votre projet avec SCI SAGES dès aujourd'hui
            </h1>

            <!-- Formulaire simplifié -->
            <div class="hero-form" data-aos="fade-up" data-aos-delay="800">
                <form id="heroForm">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Votre nom" required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" placeholder="Votre téléphone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Votre email" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" required>
                                <option value="">Choisir le service</option>
                                <option value="acheter">Acheter</option>
                                <option value="construire">Faire construire</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary-custom">
                        <i class="fas fa-rocket"></i> Démarrer mon projet
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
