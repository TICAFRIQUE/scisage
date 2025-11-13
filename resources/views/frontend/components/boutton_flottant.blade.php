<style>
    /* ================== BOUTONS FLOTTANTS ================== */
    .floating-buttons {
        position: fixed;
        right: 2rem;
        bottom: 2rem;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .floating-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        border: none;
        outline: none;
        position: relative;
        overflow: hidden;
    }

    /* Bouton WhatsApp */
    .whatsapp-btn {
        background: #25D366;
        color: white;
        animation: pulse-whatsapp 2s infinite;
    }

    .whatsapp-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, #25D366, #128C7E);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .whatsapp-btn:hover {
        transform: scale(1.1);
        color: white;
        text-decoration: none;
    }

    .whatsapp-btn:hover::before {
        opacity: 1;
    }

    .whatsapp-btn i {
        position: relative;
        z-index: 1;
    }

    /* Bouton Retour en haut */
    .back-to-top {
        background: var(--gradient-gold);
        color: var(--dark-brown);
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .back-to-top.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .back-to-top::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, var(--secondary-gold), var(--primary-gold));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .back-to-top:hover {
        transform: scale(1.1);
        color: var(--dark-brown);
        text-decoration: none;
    }

    .back-to-top:hover::before {
        opacity: 1;
    }

    .back-to-top i {
        position: relative;
        z-index: 1;
    }

    /* Animation pulse pour WhatsApp */
    @keyframes pulse-whatsapp {
        0% {
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.2), 0 0 0 0 rgba(37, 211, 102, 0.7);
        }

        50% {
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4), 0 0 0 10px rgba(37, 211, 102, 0);
        }

        100% {
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.2), 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    /* Tooltip pour les boutons */
    .floating-btn::after {
        content: attr(data-tooltip);
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .floating-btn:hover::after {
        opacity: 1;
        visibility: visible;
        transform: translateY(-50%) translateX(-5px);
    }

    /* Responsive pour boutons flottants */
    @media (max-width: 768px) {
        .floating-buttons {
            right: 1rem;
            bottom: 1rem;
        }

        .floating-btn {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .floating-btn::after {
            display: none;
            /* Masquer les tooltips sur mobile */
        }
    }

    @media (max-width: 480px) {
        .floating-buttons {
            right: 0.5rem;
            bottom: 0.5rem;
        }

        .floating-btn {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }
    }

    /* Animation d'entrée */
    .floating-btn {
        animation: slideInRight 0.5s ease-out;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Animation au clic */
    .floating-btn:active {
        transform: scale(0.95);
    }

    /* Badge de notification pour WhatsApp (optionnel) */
    .whatsapp-btn::after {
        content: '';
        position: absolute;
        top: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        background: #ff4444;
        border-radius: 50%;
        border: 2px solid white;
        opacity: 0;
        animation: notification-pulse 2s infinite;
    }

    @keyframes notification-pulse {

        0%,
        70%,
        100% {
            opacity: 0;
            transform: scale(0.8);
        }

        35% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<!-- Boutons flottants -->
<div class="floating-buttons">
    <a href="https://wa.me/+2250708091011?text=Bonjour,%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20services%20immobiliers."
        target="_blank" class="floating-btn whatsapp-btn" data-tooltip="Contactez-nous sur WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <button type="button" class="floating-btn back-to-top" id="backToTop" data-tooltip="Retour en haut">
        <i class="fas fa-chevron-up"></i>
    </button>
</div>

<script>
    // ================== BOUTONS FLOTTANTS ================== 

    // Gestion du bouton retour en haut
    const backToTopBtn = document.getElementById('backToTop');

    // Afficher/masquer le bouton selon le scroll
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    // Retour en haut au clic
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Animation des boutons flottants à l'arrivée sur la page
    window.addEventListener('load', function() {
        setTimeout(function() {
            const floatingButtons = document.querySelectorAll('.floating-btn');
            floatingButtons.forEach((btn, index) => {
                setTimeout(() => {
                    btn.style.animation = 'slideInRight 0.5s ease-out';
                }, index * 200);
            });
        }, 1000);
    });

    // Gestion des clics WhatsApp avec tracking (optionnel)
    document.querySelector('.whatsapp-btn').addEventListener('click', function() {
        // Analytics tracking si nécessaire
        console.log('WhatsApp contact initiated');
    });
</script>
