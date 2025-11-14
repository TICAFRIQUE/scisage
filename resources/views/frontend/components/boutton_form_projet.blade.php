<style>
      /* ================== CTA SECTION ================== */
    .cta-section {
        background: var(--gradient-brown);
        padding: 80px 0;
        text-align: center;
    }

    .cta-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1rem;
    }

    .cta-description {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
    }

    .btn-cta {
        background: var(--gradient-gold);
        color: var(--dark-brown);
        padding: 1rem 2.5rem;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.4);
        color: var(--dark-brown);
        text-decoration: none;
    }
</style>


<section class="cta-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h3 class="cta-title">Prêt à démarrer votre projet ?</h3>
                {{-- <p class="cta-description">
                    Contactez notre équipe d'experts pour une consultation personnalisée et un devis gratuit.
                </p> --}}
                <a href="{{ route('page.accueil') }}#form-projet" class="btn-cta">
                    <i class="fas fa-rocket"></i>
                    <span>Démarrer mon projet</span>
                </a>
            </div>
        </div>
    </div>
</section>