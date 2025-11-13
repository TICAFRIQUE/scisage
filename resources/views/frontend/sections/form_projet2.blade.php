<style>
    .form-projet-section {
        background: linear-gradient(135deg,
                rgba(60, 36, 21, 0.425),
                rgba(139, 69, 19, 0.692)),
            url('{{ $banniere?->getFirstMediaUrl('banniere') ?? asset('images/default-banner.jpg') }}');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 120px 0;
        position: relative;
    }

    .form-projet-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(60, 36, 21, 0.1);
        backdrop-filter: blur(2px);
    }

    .form-projet-section .container {
        position: relative;
        z-index: 2;
    }

    .form-projet-section .section-subtitle {
        color: var(--secondary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        margin-bottom: 1rem;
        text-align: center;
    }

    .form-projet-section .section-title {
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 3rem;
        color: var(--white);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .form-container {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-width: 800px;
        margin: 0 auto;
    }

    /* ================== MULTI-STEP FORM ================== */
    .form-progress-container {
        margin-bottom: 2rem;
    }

    .form-progress {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .form-progress::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 25%;
        right: 25%;
        height: 2px;
        background: #ddd;
        transform: translateY(-50%);
        z-index: 1;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 2;
        flex: 1;
        max-width: 120px;
    }

    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #666;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .step-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #666;
        text-align: center;
        transition: all 0.3s ease;
    }

    .progress-step.active .step-number {
        background: var(--gradient-gold);
        color: var(--dark-brown);
        transform: scale(1.1);
    }

    .progress-step.active .step-label {
        color: var(--primary-gold);
    }

    .progress-step.completed .step-number {
        background: var(--primary-gold);
        color: var(--white);
    }

    .progress-step.completed .step-label {
        color: var(--primary-gold);
    }

    /* Form Steps */
    .multi-step-form {
        position: relative;
        min-height: 450px;
    }

    .form-step {
        display: none;
        animation: fadeInRight 0.5s ease;
    }

    .form-step.active {
        display: block;
    }

    .step-title {
        text-align: center;
        color: var(--dark-brown);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    .step-title i {
        color: var(--primary-gold);
        margin-right: 0.5rem;
    }

    /* Project Options */
    .project-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .project-option {
        border: 2px solid #ddd;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .project-option:hover {
        border-color: var(--primary-gold);
        transform: translateY(-5px);
        box-shadow: var(--shadow-medium);
    }

    .project-option.selected {
        border-color: var(--primary-gold);
        background: rgba(212, 175, 55, 0.1);
    }

    .option-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: var(--dark-brown);
    }

    .project-option h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    .project-option p {
        font-size: 0.9rem;
        color: var(--dark-gray);
        margin: 0;
    }

    /* Budget Range */
    .budget-range {
        margin-bottom: 2rem;
    }

    .budget-range label {
        display: block;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    /* Form Controls */
    .form-control {
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .form-control:focus {
        border-color: var(--primary-gold);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        outline: none;
    }

    /* Description Fields */
    .description-fields .row {
        margin-bottom: 1.5rem;
    }

    .description-fields label {
        display: block;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    /* Contact Fields */
    .contact-fields .row {
        margin-bottom: 1.5rem;
    }

    .contact-fields label {
        display: block;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    /* Contact Preference */
    .contact-preference {
        margin-top: 1.5rem;
    }

    .contact-preference>label {
        display: block;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 1rem;
    }

    .preference-options {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .preference-option {
        flex: 1;
        min-width: 120px;
    }

    .preference-option input[type="radio"] {
        display: none;
    }

    .preference-option label {
        display: block;
        padding: 0.8rem 1rem;
        border: 2px solid #ddd;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        color: var(--dark-gray);
        margin-bottom: 0;
    }

    .preference-option input[type="radio"]:checked+label {
        border-color: var(--primary-gold);
        background: rgba(212, 175, 55, 0.1);
        color: var(--primary-gold);
    }

    .preference-option label i {
        margin-right: 0.5rem;
    }

    /* Form Navigation */
    .form-navigation {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #eee;
    }

    .btn-prev,
    .btn-next,
    .btn-submit {
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-prev {
        background: #f8f9fa;
        color: var(--dark-gray);
        border: 1px solid #ddd;
    }

    .btn-prev:hover {
        background: #e9ecef;
        transform: translateX(-3px);
    }

    .btn-next,
    .btn-submit {
        background: var(--gradient-gold);
        color: var(--dark-brown);
        margin-left: auto;
    }

    .btn-next:hover,
    .btn-submit:hover {
        transform: translateX(3px);
        box-shadow: var(--shadow-medium);
    }

    .btn-submit {
        background: var(--gradient-brown);
        color: var(--white);
    }

    /* Animations */
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ================== RESPONSIVE ================== */
    @media (max-width: 991px) {
        .form-projet-section {
            padding: 80px 0;
        }

        .form-projet-section .section-title {
            font-size: 2.5rem;
        }

        .form-container {
            padding: 2rem;
        }
    }

    @media (max-width: 768px) {
        .form-projet-section {
            padding: 60px 0;
        }

        .form-projet-section .section-title {
            font-size: 2rem;
        }

        .form-container {
            padding: 1.5rem;
            margin: 0 15px;
        }

        .project-options {
            grid-template-columns: 1fr;
        }

        .preference-options {
            flex-direction: column;
        }

        .form-navigation {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-next,
        .btn-submit {
            margin-left: 0;
            width: 100%;
        }

        .btn-prev {
            width: 100%;
        }

        .step-title {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 1rem;
        }

        .step-title {
            font-size: 1.2rem;
        }

        .option-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .project-option h4 {
            font-size: 1rem;
        }

        .project-option p {
            font-size: 0.85rem;
        }
    }
</style>

<section id="form-projet" class="form-projet-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">Démarrez votre projet</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">
            Concrétisons ensemble votre rêve immobilier
        </h2>

        <div class="form-container" data-aos="fade-up" data-aos-delay="200">
            <div class="form-progress-container">
                <div class="form-progress">
                    <div class="progress-step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-label">Projet</div>
                    </div>
                    <div class="progress-step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-label">Description</div>
                    </div>
                    <div class="progress-step" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-label">Coordonnées</div>
                    </div>
                </div>
            </div>

            <form id="heroForm" class="multi-step-form">
                <!-- Étape 1: Projet -->
                <div class="form-step active" id="step-1">
                    <h3 class="step-title">
                        <i class="fas fa-home"></i> Quel est votre projet ?
                    </h3>
                    <div class="project-options">
                        <div class="project-option" data-value="acheter">
                            <div class="option-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <h4>Souscrire à nos maisons de rêves</h4>
                            <p>Découvrez notre sélection de maisons modernes prêtes à vous accueillir</p>
                        </div>
                        <div class="project-option" data-value="construire">
                            <div class="option-icon">
                                <i class="fas fa-hammer"></i>
                            </div>
                            <h4>Faire construire votre maison de rêve</h4>
                            <p>Concevons ensemble la maison qui vous ressemble</p>
                        </div>
                    </div>
                    <div class="budget-range">
                        <label for="budget">Budget estimé (en millions de FCFA)</label>
                        <select id="budget" class="form-control" required>
                            <option value="">Sélectionner votre budget</option>
                            <option value="20-50">20 - 50 millions</option>
                            <option value="50-100">50 - 100 millions</option>
                            <option value="100-200">100 - 200 millions</option>
                            <option value="200+">Plus de 200 millions</option>
                        </select>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-next" onclick="nextStep()">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Étape 2: Description -->
                <div class="form-step" id="step-2">
                    <h3 class="step-title">
                        <i class="fas fa-edit"></i> Décrivez votre projet
                    </h3>
                    <div class="description-fields">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="surface">Surface souhaitée (m²)</label>
                                <input type="number" id="surface" class="form-control" placeholder="Ex: 150"
                                    min="50">
                            </div>
                            <div class="col-md-6">
                                <label for="chambres">Nombre de chambres</label>
                                <select id="chambres" class="form-control">
                                    <option value="">Choisir</option>
                                    <option value="2">2 chambres</option>
                                    <option value="3">3 chambres</option>
                                    <option value="4">4 chambres</option>
                                    <option value="5+">5+ chambres</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="localisation">Localisation préférée</label>
                                <select id="localisation" class="form-control">
                                    <option value="">Choisir une zone</option>
                                    <option value="cocody">Cocody</option>
                                    <option value="marcory">Marcory</option>
                                    <option value="plateau">Plateau</option>
                                    <option value="yopougon">Yopougon</option>
                                    <option value="adjame">Adjamé</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="delai">Délai souhaité</label>
                                <select id="delai" class="form-control">
                                    <option value="">Choisir</option>
                                    <option value="immédiat">Immédiat</option>
                                    <option value="3-6-mois">3 à 6 mois</option>
                                    <option value="6-12-mois">6 à 12 mois</option>
                                    <option value="plus-12-mois">Plus de 12 mois</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="details">Détails supplémentaires</label>
                            <textarea id="details" class="form-control" rows="4"
                                placeholder="Décrivez vos besoins spécifiques, vos préférences..."></textarea>
                        </div>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </button>
                        <button type="button" class="btn-next" onclick="nextStep()">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Étape 3: Coordonnées -->
                <div class="form-step" id="step-3">
                    <h3 class="step-title">
                        <i class="fas fa-user"></i> Vos coordonnées
                    </h3>
                    <div class="contact-fields">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nom">Nom complet *</label>
                                <input type="text" id="nom" class="form-control"
                                    placeholder="Votre nom et prénom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone">Téléphone *</label>
                                <input type="tel" id="telephone" class="form-control"
                                    placeholder="+225 XX XX XX XX" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email">Email *</label>
                                <input type="email" id="email" class="form-control"
                                    placeholder="votre@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="profession">Profession</label>
                                <input type="text" id="profession" class="form-control"
                                    placeholder="Votre profession">
                            </div>
                        </div>
                        <div class="contact-preference">
                            <label>Préférence de contact</label>
                            <div class="preference-options">
                                <div class="preference-option">
                                    <input type="radio" id="pref-telephone" name="contact_preference"
                                        value="telephone" checked>
                                    <label for="pref-telephone">
                                        <i class="fas fa-phone"></i> Téléphone
                                    </label>
                                </div>
                                <div class="preference-option">
                                    <input type="radio" id="pref-email" name="contact_preference" value="email">
                                    <label for="pref-email">
                                        <i class="fas fa-envelope"></i> Email
                                    </label>
                                </div>
                                <div class="preference-option">
                                    <input type="radio" id="pref-whatsapp" name="contact_preference"
                                        value="whatsapp">
                                    <label for="pref-whatsapp">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-rocket"></i> Démarrer mon projet
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // Variables pour le formulaire multi-étapes
    let currentStep = 1;
    let formData = {};

    // Fonctions pour la navigation du formulaire
    function nextStep() {
        if (validateCurrentStep()) {
            saveCurrentStepData();
            if (currentStep < 3) {
                showStep(currentStep + 1);
            }
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    }

    function showStep(step) {
        // Masquer toutes les étapes
        document.querySelectorAll('.form-step').forEach(stepEl => {
            stepEl.classList.remove('active');
        });

        // Afficher l'étape actuelle
        document.getElementById(`step-${step}`).classList.add('active');

        // Mettre à jour la barre de progression
        updateProgressBar(step);

        currentStep = step;
    }

    function updateProgressBar(step) {
        document.querySelectorAll('.progress-step').forEach((stepEl, index) => {
            stepEl.classList.remove('active', 'completed');

            if (index + 1 < step) {
                stepEl.classList.add('completed');
            } else if (index + 1 === step) {
                stepEl.classList.add('active');
            }
        });
    }

    function validateCurrentStep() {
        switch (currentStep) {
            case 1:
                const selectedProject = document.querySelector('.project-option.selected');
                const budget = document.getElementById('budget').value;

                if (!selectedProject) {
                    alert('Veuillez sélectionner un type de projet.');
                    return false;
                }
                if (!budget) {
                    alert('Veuillez sélectionner votre budget.');
                    return false;
                }
                return true;

            case 2:
                return true;

            case 3:
                const nom = document.getElementById('nom').value;
                const telephone = document.getElementById('telephone').value;
                const email = document.getElementById('email').value;

                if (!nom.trim()) {
                    alert('Veuillez saisir votre nom.');
                    document.getElementById('nom').focus();
                    return false;
                }
                if (!telephone.trim()) {
                    alert('Veuillez saisir votre téléphone.');
                    document.getElementById('telephone').focus();
                    return false;
                }
                if (!email.trim()) {
                    alert('Veuillez saisir votre email.');
                    document.getElementById('email').focus();
                    return false;
                }
                if (!isValidEmail(email)) {
                    alert('Veuillez saisir un email valide.');
                    document.getElementById('email').focus();
                    return false;
                }
                return true;

            default:
                return true;
        }
    }

    function saveCurrentStepData() {
        switch (currentStep) {
            case 1:
                const selectedProject = document.querySelector('.project-option.selected');
                formData.typeProjet = selectedProject ? selectedProject.getAttribute('data-value') : '';
                formData.budget = document.getElementById('budget').value;
                break;

            case 2:
                formData.surface = document.getElementById('surface').value;
                formData.chambres = document.getElementById('chambres').value;
                formData.localisation = document.getElementById('localisation').value;
                formData.delai = document.getElementById('delai').value;
                formData.details = document.getElementById('details').value;
                break;

            case 3:
                formData.nom = document.getElementById('nom').value;
                formData.telephone = document.getElementById('telephone').value;
                formData.email = document.getElementById('email').value;
                formData.profession = document.getElementById('profession').value;
                formData.contactPreference = document.querySelector('input[name="contact_preference"]:checked').value;
                break;
        }
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Gestion de la sélection des options de projet
    document.querySelectorAll('.project-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.project-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });

    // Soumission du formulaire
    document.getElementById('heroForm').addEventListener('submit', function(e) {
        e.preventDefault();

        if (validateCurrentStep()) {
            saveCurrentStepData();

            console.log('Données du formulaire:', formData);

            const projectType = formData.typeProjet === 'acheter' ? 'achat' : 'construction';
            const message =
                `Merci ${formData.nom} ! Votre demande de ${projectType} a été enregistrée. Notre équipe vous contactera dans les 24h via ${formData.contactPreference}.`;

            alert(message);
            resetForm();
        }
    });

    function resetForm() {
        currentStep = 1;
        formData = {};
        showStep(1);
        document.getElementById('heroForm').reset();
        document.querySelectorAll('.project-option').forEach(opt => {
            opt.classList.remove('selected');
        });
    }
</script>
