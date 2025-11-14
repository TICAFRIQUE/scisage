  <!-- Nos valeurs -->
  <section class="engagement-section" id="engagement">
      <div class="container">
          <div class="engagement-container">
              <div class="values-section" id="valeurs" data-aos="fade-up" data-aos-delay="100">
                  <div class="section-subtitle">Nos engagements</div>
                  <h3 class="section-title">Nos valeurs et engagements</h3>
                  <div class="values-grid">


                      @foreach ($engagements as $item)
                          <div class="value-card" data-aos="zoom-in" data-aos-delay="300">
                              <div class="value-icon">
                                  @if ($item->icone)
                                      <!-- Si une icône est définie -->
                                      <i class="{{ $item->icone }}"></i>
                                  @elseif($item->getFirstMediaUrl('image'))
                                      <!-- Si une image est disponible -->
                                      <img src="{{ $item->getFirstMediaUrl('image') }}" alt="{{ $item->libelle }}"
                                          class="value-image">
                                  @else
                                      <!-- Icône par défaut -->
                                      <i class="fas fa-star"></i>
                                  @endif
                              </div>
                              <h4 class="value-title">{{ $item->libelle }}</h4>
                              <p class="value-description">{{ $item->description }}</p>
                          </div>
                      @endforeach

                  </div>
              </div>
          </div>
      </div>
  </section>
