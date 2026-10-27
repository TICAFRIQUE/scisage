<!-- Boutons flottants (styles dans public/front/css/sage-btp.css) -->
<div class="floating-buttons">
    @if (!empty($whatsappNumber))
        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode('Bonjour SCI SAGES, je souhaite avoir des informations sur vos projets immobiliers.') }}"
            target="_blank" rel="noopener" class="floating-btn whatsapp-btn" aria-label="Discuter sur WhatsApp"
            title="Discuter sur WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif

    <button type="button" class="floating-btn back-to-top" id="backToTop" aria-label="Retour en haut de page"
        title="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>
