@extends('frontend.layouts.app')
@section('title', 'Construction Personnalisée sur Mesure - Créez Votre Maison de Rêve | SCI SAGE')
@section('description', 'Faites construire la maison de vos rêves avec SCI SAGE. Construction personnalisée sur mesure, accompagnement complet, qualité garantie. Concrétisez votre projet immobilier unique en Côte d\'Ivoire.')
@section('keywords', 'construction sur mesure, maison personnalisée, faire construire maison, projet architectural personnalisé, construction villa sur mesure, bâtir maison Abidjan, construction clé en main')
@section('og_title', 'Construction Personnalisée - Créez Votre Maison Unique')
@section('og_description', 'Construisez la maison qui vous ressemble avec notre accompagnement complet de A à Z.')

@section('content')
    <style>
        :root {
            --primary-gold: #d4af37;
            --dark-brown: #4a3c1d;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --gradient-gold: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--dark-brown) 0%, rgba(74, 60, 29, 0.9) 100%);
            padding: 100px 0 80px 0;
            color: white;
            position: relative;
        }

        .form-section {
            padding: 80px 0;
            background: var(--light-gray);
        }

        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            padding: 50px;
            border: none;
        }

        .form-control, .form-select, .form-control:focus {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-brown);
            margin-bottom: 10px;
        }

        .btn-submit {
            background: var(--gradient-gold);
            border: none;
            color: white;
            padding: 18px 50px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #c19b26 0%, #e3c235 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
        }

        .features-section {
            padding: 60px 0;
            background: white;
        }

        .feature-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            font-size: 2rem;
            color: white;
        }

        .section-title {
            color: var(--dark-brown);
            font-weight: 700;
            margin-bottom: 40px;
        }
    </style>

    <!-- Section Héro -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="display-3 fw-bold mb-4">
                        <i class="fas fa-hammer me-3" style="color: var(--primary-gold);"></i>
                        Construisons Votre Maison de Rêve
                    </h1>
                    <p class="lead mb-5" style="font-size: 1.3rem;">
                        Vous avez un projet unique ? Partagez-nous votre vision et nous la transformerons en réalité. 
                        Notre équipe d'experts vous accompagne de la conception à la livraison.
                    </p>
                    <a href="#formulaire" class="btn btn-light btn-lg px-5 py-3" style="border-radius: 50px; font-weight: 600;">
                        <i class="fas fa-arrow-down me-2"></i>
                        Démarrer Mon Projet
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Features -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Pourquoi Choisir Notre Service ?</h2>
                    <p class="text-muted lead">Une approche personnalisée pour créer la maison qui vous ressemble</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-drafting-compass"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Conception Sur Mesure</h4>
                        <p class="text-muted">Chaque projet est unique. Nous concevons votre maison selon vos besoins, goûts et budget.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Équipe d'Experts</h4>
                        <p class="text-muted">Architectes, ingénieurs et artisans qualifiés travaillent ensemble pour votre projet.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Suivi Personnalisé</h4>
                        <p class="text-muted">Un suivi constant de votre projet avec des points réguliers et une communication transparente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Formulaire -->
    <section class="form-section" id="formulaire">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-card">
                        <div class="text-center mb-5">
                            <h2 class="section-title">
                                <i class="fas fa-file-alt me-3"></i>
                                Parlez-nous de Votre Projet
                            </h2>
                            <p class="text-muted">Remplissez ce formulaire pour nous faire part de vos besoins et attentes. Nous vous contacterons rapidement pour discuter de votre projet.</p>
                        </div>

                        <form id="constructionForm">
                            @csrf
                            <div class="row g-4">
                                <!-- Informations personnelles -->
                                <div class="col-12">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="fas fa-user me-2"></i>
                                        Vos Informations
                                    </h5>
                                </div>

                                <div class="col-md-12">
                                    <label for="nom" class="form-label">Nom complet *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact *</label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="+225 XX XX XX XX" required>
                                </div>

                                <div class="col-12">
                                    <label for="ville" class="form-label">Ville où construire *</label>
                                    <input type="text" class="form-control" id="ville" name="ville" placeholder="Abidjan, Yamoussoukro, Bouaké..." required>
                                </div>

                                <!-- Détails du projet -->
                                <div class="col-12 mt-5">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="fas fa-home me-2"></i>
                                        Votre Projet
                                    </h5>
                                </div>

                                <div class="col-12">
                                    <label for="description_projet" class="form-label">Description détaillée de votre projet *</label>
                                    <textarea class="form-control" id="description_projet" name="description_projet" rows="6" 
                                              placeholder="Décrivez votre maison idéale : nombre de chambres, style architectural, équipements souhaités, contraintes particulières..." required></textarea>
                                    <div class="form-text">Plus vous êtes précis, mieux nous pourrons répondre à vos attentes.</div>
                                </div>

                                {{-- <div class="col-12">
                                    <label for="budget_estime" class="form-label">Budget estimé (optionnel)</label>
                                    <select class="form-select" id="budget_estime" name="budget_estime">
                                        <option value="">Sélectionnez une fourchette</option>
                                        <option value="moins_50m">Moins de 50 millions FCFA</option>
                                        <option value="50m_100m">50 - 100 millions FCFA</option>
                                        <option value="100m_200m">100 - 200 millions FCFA</option>
                                        <option value="200m_plus">Plus de 200 millions FCFA</option>
                                        <option value="discuter">À discuter</option>
                                    </select>
                                    <div class="form-text">Cette information nous aide à mieux orienter notre proposition.</div>
                                </div> --}}

                                <div class="col-12 text-center mt-5">
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-rocket me-2"></i>
                                        Lancer Mon Projet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Gestionnaire du formulaire de construction
    document.getElementById('constructionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Désactiver le bouton et afficher le loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Envoi en cours...';
        
        fetch('{{ route("page.construction.personnalisee.send") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Afficher le message de succès
                Swal.fire({
                    icon: 'success',
                    title: 'Projet envoyé !',
                    text: data.message,
                    confirmButtonColor: '#d4af37'
                }).then(() => {
                    // Réinitialiser le formulaire après succès
                    this.reset();
                    // Scroll vers le haut
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: data.message || 'Une erreur est survenue',
                    confirmButtonColor: '#d4af37'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Une erreur est survenue lors de l\'envoi',
                confirmButtonColor: '#d4af37'
            });
        })
        .finally(() => {
            // Réactiver le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    // Animation de scroll fluide pour le bouton CTA
    document.querySelector('a[href="#formulaire"]').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#formulaire').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
@endpush