@php
    $cPhones = collect([$parametre?->contact1, $parametre?->contact2, $parametre?->contact3])->filter();
    $cEmails = collect([$parametre?->email1, $parametre?->email2])->filter();
@endphp

<section id="contact" class="section section--sand contact">
    <div class="container">
        <div class="contact__grid">
            <div class="contact__info" data-aos="fade-right">
                <div class="section-head section-head--left mb-4">
                    <span class="eyebrow">Contactez-nous</span>
                    <h2 class="section-title">Parlons de votre futur chantier</h2>
                    <p class="section-lead">Un conseiller vous répond sous 48 h ouvrées. Visite de nos maisons témoins sur rendez-vous.</p>
                </div>

                <ul class="contact-list">
                    @if ($parametre?->localisation)
                        <li>
                            <span class="icon-box icon-box--dark"><i class="fas fa-location-dot"></i></span>
                            <div><small>Adresse</small>{{ $parametre->localisation }}</div>
                        </li>
                    @endif
                    @if ($cPhones->isNotEmpty())
                        <li>
                            <span class="icon-box icon-box--dark"><i class="fas fa-phone"></i></span>
                            <div><small>Téléphone</small>
                                @foreach ($cPhones as $phone)
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>@if (!$loop->last)<br>@endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                    @if ($cEmails->isNotEmpty())
                        <li>
                            <span class="icon-box icon-box--dark"><i class="fas fa-envelope"></i></span>
                            <div><small>Email</small>
                                @foreach ($cEmails as $email)
                                    <a href="mailto:{{ $email }}">{{ $email }}</a>@if (!$loop->last)<br>@endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                    <li>
                        <span class="icon-box icon-box--dark"><i class="fas fa-clock"></i></span>
                        <div><small>Horaires</small>Lun - Ven : 8h00 - 18h00<br>Sam : 9h00 - 16h00</div>
                    </li>
                </ul>
            </div>

            <div class="contact__form" data-aos="fade-left">
                <form action="{{ route('page.contact.send') }}" method="POST" id="contactForm" novalidate>
                    @csrf
                    <h3 class="contact__form-title">Envoyez-nous un message</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="c-nom" class="form-label">Nom complet *</label>
                            <input type="text" id="c-nom" name="nom" class="form-control" autocomplete="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="c-contact" class="form-label">Téléphone *</label>
                            <input type="tel" id="c-contact" name="contact" class="form-control" autocomplete="tel"
                                placeholder="07 00 00 00 00" required>
                        </div>
                        <div class="col-md-6">
                            <label for="c-email" class="form-label">Email *</label>
                            <input type="email" id="c-email" name="email" class="form-control" autocomplete="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="c-sujet" class="form-label">Sujet</label>
                            <select id="c-sujet" name="sujet" class="form-select">
                                <option value="info" selected>Demande d'information</option>
                                <option value="achat">Achat d'une maison</option>
                                <option value="construction">Construction sur mesure</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="c-message" class="form-label">Message *</label>
                            <textarea id="c-message" name="message" class="form-control" rows="5"
                                placeholder="Décrivez votre projet : type de maison, localisation, délai…" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-sage btn-sage--block btn-sage--lg">
                                <i class="fas fa-paper-plane"></i> <span>Envoyer le message</span>
                            </button>
                            <p class="form-note"><i class="fas fa-lock"></i> Vos informations restent confidentielles.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        (function() {
            const form = document.getElementById('contactForm');
            if (!form) return;

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    form.querySelector(':invalid')?.focus();
                    return;
                }

                const btn = form.querySelector('button[type="submit"]');
                const label = btn.querySelector('span');
                const original = label.textContent;
                btn.disabled = true;
                label.textContent = 'Envoi en cours…';

                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                    });
                    const data = await res.json().catch(() => ({}));
                    if (!res.ok || !data.success) throw new Error(data.message || 'Erreur lors de l\'envoi.');

                    form.reset();
                    form.classList.remove('was-validated');
                    Swal.fire({ icon: 'success', title: 'Message envoyé', text: 'Merci ! Nous vous répondrons dans les plus brefs délais.' });
                } catch (err) {
                    Swal.fire({ icon: 'error', title: 'Envoi impossible', text: 'Merci de réessayer ou de nous appeler directement.' });
                } finally {
                    btn.disabled = false;
                    label.textContent = original;
                }
            });
        })();
    </script>
@endpush
