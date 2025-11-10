<style>
     .faq-section {
            background: var(--light-gray);
            padding: 120px 0;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--white);
            border-radius: 15px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-light);
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-medium);
        }

        .faq-question {
            padding: 2rem;
            background: var(--gradient-gold);
            color: var(--white);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: var(--gradient-brown);
        }

        .faq-answer {
            padding: 2rem;
            display: none;
            color: var(--dark-gray);
            line-height: 1.7;
        }

        .faq-answer.active {
            display: block;
            animation: fadeInDown 0.3s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }
</style>

<section id="faq" class="faq-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">Questions fréquentes</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">FAQ</h2>

                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">
                            <span>Quels sont les délais de construction ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Les délais varient selon la complexité du projet. En moyenne, comptez 8 à 12 mois pour
                                une construction sur mesure et 6 à 8 mois pour nos maisons en catalogue. Nous nous
                                engageons sur un planning précis dès la signature du contrat.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-question">
                            <span>Proposez-vous des solutions de financement ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Oui, nous travaillons avec plusieurs partenaires bancaires pour vous proposer les
                                meilleures solutions de financement adaptées à votre profil. Notre équipe vous
                                accompagne dans toutes vos démarches.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="faq-question">
                            <span>Quelles garanties offrez-vous ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Toutes nos constructions bénéficient de la garantie décennale, de la garantie biennale de
                                bon fonctionnement et de la garantie de parfait achèvement. Nous sommes également
                                assurés pour la garantie financière d'achèvement.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="faq-question">
                            <span>Puis-je personnaliser ma maison ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Absolument ! Que vous choisissiez une maison de notre catalogue ou une construction sur
                                mesure, de nombreuses options de personnalisation sont possibles : finitions,
                                aménagements, équipements, etc.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="faq-question">
                            <span>Intervenez-vous sur toute la Côte d'Ivoire ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Nous intervenons principalement sur Abidjan et ses environs, ainsi que dans les
                                principales villes de Côte d'Ivoire. N'hésitez pas à nous contacter pour vérifier si
                                votre zone est couverte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>