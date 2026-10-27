@if ($faqs && $faqs->count())
    <section id="faq" class="section faq">
        <div class="container">
            <div class="faq__grid">
                <div class="faq__intro" data-aos="fade-up">
                    <div class="section-head section-head--left mb-4">
                        <span class="eyebrow">Questions fréquentes</span>
                        <h2 class="section-title">Vous vous posez des questions ?</h2>
                        <p class="section-lead">Les réponses aux questions que nos clients nous posent le plus souvent.</p>
                    </div>
                    <div class="faq__help">
                        <span class="icon-box icon-box--dark"><i class="fas fa-headset"></i></span>
                        <div>
                            <strong>Une autre question ?</strong>
                            <a href="#contact" class="link-arrow">Contactez un conseiller <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="faq__list">
                    @foreach ($faqs as $item)
                        <div class="faq-item" data-aos="fade-up" data-aos-delay="{{ min($loop->index, 4) * 50 }}">
                            <h3 class="faq-item__q">
                                <button type="button" aria-expanded="false" aria-controls="faq-{{ $loop->index }}"
                                    id="faq-btn-{{ $loop->index }}">
                                    <span>{{ $item->question }}</span>
                                    <i class="fas fa-plus" aria-hidden="true"></i>
                                </button>
                            </h3>
                            <div class="faq-item__a" id="faq-{{ $loop->index }}" role="region"
                                aria-labelledby="faq-btn-{{ $loop->index }}">
                                <div>
                                    <p>{!! nl2br(e($item->reponse)) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            (function() {
                const items = document.querySelectorAll('.faq-item');
                items.forEach(item => {
                    const btn = item.querySelector('button');
                    btn.addEventListener('click', () => {
                        const open = btn.getAttribute('aria-expanded') === 'true';
                        items.forEach(other => {
                            other.classList.remove('is-open');
                            other.querySelector('button').setAttribute('aria-expanded', 'false');
                        });
                        if (!open) {
                            item.classList.add('is-open');
                            btn.setAttribute('aria-expanded', 'true');
                        }
                    });
                });
            })();
        </script>
    @endpush
@endif
