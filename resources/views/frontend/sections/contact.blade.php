 
 @push('styles')
     <style>
         .contact-section {
            background: var(--gradient-brown);
            color: var(--white);
            padding: 120px 0;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 3rem;
            border: 2px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(212, 175, 55, 0.1) 0%,
                    rgba(255, 255, 255, 0.05) 50%,
                    rgba(212, 175, 55, 0.1) 100%);
            pointer-events: none;
            z-index: 0;
        }

        .contact-form>* {
            position: relative;
            z-index: 1;
        }

        .contact-form .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--dark-brown);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .contact-form .form-control::placeholder {
            color: rgba(60, 36, 21, 0.6);
            font-weight: 400;
        }

        .contact-form .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        .contact-form .row {
            margin-bottom: 0;
        }

        .contact-form .row .col-md-6 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .contact-form textarea.form-control {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        .contact-form select.form-control {
            cursor: pointer;
        }

        .contact-form select.form-control option {
            background: var(--white);
            color: var(--dark-brown);
            padding: 0.5rem;
        }

        /* Bouton d'envoi personnalisé */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            border: none;
            color: var(--dark-brown);
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--white), rgba(255, 255, 255, 0.9));
            transition: left 0.4s ease;
            z-index: -1;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.6);
            color: var(--primary-gold);
        }

        .btn-primary-custom:hover::before {
            left: 0;
        }

        .btn-primary-custom:active {
            transform: translateY(-1px);
        }

        .btn-primary-custom i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .btn-primary-custom:hover i {
            transform: translateX(3px);
        }

        /* Icônes dans les champs */
        .form-group-with-icon {
            position: relative;
        }

        .form-group-with-icon .form-control {
            padding-left: 3rem;
        }

        .form-group-with-icon .field-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-gold);
            font-size: 1.1rem;
            z-index: 10;
        }

        /* Validation states */
        .form-control.is-valid {
            border-color: #28a745;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='m2.3 6.73.5-.4 3.5-3.6L6 2.4 2.8 5.6l-.8-.8-.4.4L2.3 6.73z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 4.6 1.4 1.4M6.2 7.4l1.4-1.4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        /* ================== RESPONSIVE CONTACT FORM ================== */
        @media (max-width: 991px) {
            .contact-form {
                padding: 2.5rem;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .contact-form {
                padding: 2rem;
                border-radius: 20px;
            }

            .contact-form .row .col-md-6 {
                padding-left: 0;
                padding-right: 0;
            }

            .contact-form .form-control {
                padding: 0.9rem 1.2rem;
                font-size: 0.95rem;
            }

            .btn-primary-custom {
                padding: 0.9rem 2rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .contact-form {
                padding: 1.5rem;
                margin: 1rem;
                border-radius: 15px;
            }

            .contact-form .form-control {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .btn-primary-custom {
                padding: 0.8rem 1.5rem;
                font-size: 0.95rem;
            }
        }

     </style>
 @endpush
 
 
 
 <section id="contact" class="contact-section">
     <div class="container">
         <div class="section-subtitle" data-aos="fade-up">Contactez-nous</div>
         <h2 class="section-title" style="color: white;" data-aos="fade-up" data-aos-delay="100">Avez-vous
             des questions ?</h2>

         <div class="row">
             <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                 <div class="contact-info">
                     <div class="contact-item">
                         <div class="contact-icon">
                             <i class="fas fa-map-marker-alt"></i>
                         </div>
                         <div class="contact-details">
                             <h5>Adresse</h5>
                             <p>Abidjan, Cocody Angré 8ème Tranche<br>Rue des Jardins, Villa 123</p>
                         </div>
                     </div>
                     <div class="contact-item">
                         <div class="contact-icon">
                             <i class="fas fa-phone"></i>
                         </div>
                         <div class="contact-details">
                             <h5>Téléphone</h5>
                             <p>+225 27 22 45 67 89<br>+225 07 08 09 10 11</p>
                         </div>
                     </div>
                     <div class="contact-item">
                         <div class="contact-icon">
                             <i class="fas fa-envelope"></i>
                         </div>
                         <div class="contact-details">
                             <h5>Email</h5>
                             <p>contact@scisages.ci<br>info@scisages.ci</p>
                         </div>
                     </div>
                     <div class="contact-item">
                         <div class="contact-icon">
                             <i class="fas fa-clock"></i>
                         </div>
                         <div class="contact-details">
                             <h5>Horaires</h5>
                             <p>Lun - Ven: 8h00 - 18h00<br>Sam: 9h00 - 16h00</p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                 <div class="contact-form">
                     <form id="contactForm">
                         <div class="row">
                             <div class="col-md-6">
                                 <input type="text" class="form-control" placeholder="Votre nom" required>
                             </div>
                             <div class="col-md-6">
                                 <input type="email" class="form-control" placeholder="Votre email" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <input type="tel" class="form-control" placeholder="Votre téléphone" required>
                             </div>
                             <div class="col-md-6">
                                 <select class="form-control" required>
                                     <option value="">Sujet</option>
                                     <option value="achat">Achat de maison</option>
                                     <option value="construction">Construction sur mesure</option>
                                     <option value="info">Demande d'information</option>
                                     <option value="autre">Autre</option>
                                 </select>
                             </div>
                         </div>
                         <textarea class="form-control" rows="5" placeholder="Votre message" required></textarea>
                         <button type="submit" class="btn-primary-custom">
                             <i class="fas fa-paper-plane"></i> Envoyer le message
                         </button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
