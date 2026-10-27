{{-- Visionneuse photo partagée : window.SageLightbox.open(images[], index, titre) --}}
<div class="sage-lightbox" id="sageLightbox" role="dialog" aria-modal="true" aria-label="Galerie photos" hidden>
    <div class="sage-lightbox__top">
        <span class="sage-lightbox__title" id="slbTitle"></span>
        <span class="sage-lightbox__count" id="slbCount"></span>
        <button type="button" class="sage-lightbox__btn" data-slb="close" aria-label="Fermer"><i class="fas fa-xmark"></i></button>
    </div>
    <button type="button" class="sage-lightbox__btn sage-lightbox__nav sage-lightbox__nav--prev" data-slb="prev" aria-label="Photo précédente"><i class="fas fa-chevron-left"></i></button>
    <figure class="sage-lightbox__stage">
        <span class="sage-lightbox__spinner" aria-hidden="true"></span>
        <img id="slbImg" alt="">
    </figure>
    <button type="button" class="sage-lightbox__btn sage-lightbox__nav sage-lightbox__nav--next" data-slb="next" aria-label="Photo suivante"><i class="fas fa-chevron-right"></i></button>
    <div class="sage-lightbox__thumbs" id="slbThumbs"></div>
</div>

@once
    @push('scripts')
        <script>
            window.SageLightbox = (function() {
                const box = document.getElementById('sageLightbox');
                const img = document.getElementById('slbImg');
                const title = document.getElementById('slbTitle');
                const count = document.getElementById('slbCount');
                const thumbs = document.getElementById('slbThumbs');
                let images = [], index = 0, lastFocus = null;

                const preload = i => { if (images[i]) { const p = new Image(); p.src = images[i]; } };

                function render() {
                    box.classList.add('is-loading');
                    img.classList.remove('is-ready');
                    const src = images[index];
                    const tmp = new Image();
                    tmp.onload = tmp.onerror = () => {
                        img.src = src;
                        box.classList.remove('is-loading');
                        requestAnimationFrame(() => img.classList.add('is-ready'));
                    };
                    tmp.src = src;
                    img.alt = (title.textContent || 'Photo') + ' - ' + (index + 1);
                    count.textContent = (index + 1) + ' / ' + images.length;
                    box.classList.toggle('is-single', images.length < 2);
                    thumbs.querySelectorAll('button').forEach((b, i) => b.classList.toggle('is-active', i === index));
                    thumbs.children[index]?.scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'smooth' });
                    preload(index + 1);
                    preload(index - 1);
                }

                function open(list, start = 0, label = '') {
                    images = (list || []).filter(Boolean);
                    if (!images.length) return;
                    index = Math.max(0, Math.min(start, images.length - 1));
                    title.textContent = label;
                    thumbs.innerHTML = images.length > 1 ? images.map((src, i) =>
                        `<button type="button" aria-label="Photo ${i + 1}"><img src="${src}" alt="" loading="lazy"></button>`).join('') : '';
                    thumbs.querySelectorAll('button').forEach((b, i) => b.addEventListener('click', () => { index = i; render(); }));
                    lastFocus = document.activeElement;
                    box.hidden = false;
                    document.body.style.overflow = 'hidden';
                    requestAnimationFrame(() => box.classList.add('is-open'));
                    render();
                    box.querySelector('[data-slb="close"]').focus();
                }

                function close() {
                    box.classList.remove('is-open');
                    document.body.style.overflow = '';
                    setTimeout(() => { box.hidden = true; img.removeAttribute('src'); }, 250);
                    lastFocus?.focus();
                }

                const step = d => { if (images.length > 1) { index = (index + d + images.length) % images.length; render(); } };

                box.addEventListener('click', e => {
                    const action = e.target.closest('[data-slb]')?.dataset.slb;
                    if (action === 'close') close();
                    else if (action === 'prev') step(-1);
                    else if (action === 'next') step(1);
                    else if (e.target === box || e.target.classList.contains('sage-lightbox__stage')) close();
                });
                document.addEventListener('keydown', e => {
                    if (box.hidden) return;
                    if (e.key === 'Escape') close();
                    if (e.key === 'ArrowLeft') step(-1);
                    if (e.key === 'ArrowRight') step(1);
                });
                let sx = null;
                box.addEventListener('touchstart', e => { sx = e.touches[0].clientX; }, { passive: true });
                box.addEventListener('touchend', e => {
                    if (sx === null) return;
                    const d = sx - e.changedTouches[0].clientX;
                    if (Math.abs(d) > 50) step(d > 0 ? 1 : -1);
                    sx = null;
                });

                return { open, close };
            })();
        </script>
    @endpush
@endonce
