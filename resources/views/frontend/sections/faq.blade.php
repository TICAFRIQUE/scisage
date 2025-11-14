@push('styles')
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
@endpush

<section id="faq" class="faq-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">Questions fréquentes</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">FAQ</h2>

        <div class="faq-container">
            @foreach ($faqs as $item)
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">
                        <span>{{ $item->question }}</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>{{ $item->reponse }}</p>

                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>

@push('scripts')
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentNode;
                const answer = faqItem.querySelector('.faq-answer');
                const icon = this.querySelector('.faq-icon');

                // Fermer toutes les autres FAQ
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                        item.querySelector('.faq-answer').classList.remove('active');
                    }
                });

                // Toggle la FAQ actuelle
                faqItem.classList.toggle('active');
                answer.classList.toggle('active');
            });
        });
    </script>
@endpush
