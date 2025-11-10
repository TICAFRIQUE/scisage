<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SCI SAGES — Promoteur immobilier</title>
  <meta name="description" content="SCI SAGES — Souscrire ou faire construire votre maison de rêve. Contactez-nous pour démarrer votre projet." />

  <style>
    :root{
      --gold-1: #f5df86; /* light gold */
      --gold-2: #dba93a; /* mid gold */
      --gold-3: #b07b2a; /* dark gold */
      --brown: #4b2b18; /* deep brown from logo */
      --text: #222;
      --muted: #666;
      --radius: 12px;
      --container: 1100px;
      --glass: rgba(255,255,255,0.85);
    }

    *{box-sizing:border-box}
    body{font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0; color:var(--text); line-height:1.5; background:#fbfaf7}
    a{color:inherit; text-decoration:none}

    /* layout */
    header{background:linear-gradient(90deg,var(--gold-1),var(--gold-2)); padding:18px 0; box-shadow:0 6px 18px rgba(77,48,23,0.08); position:sticky; top:0; z-index:999}
    .wrap{max-width:var(--container); margin:0 auto; padding:0 20px; display:flex; align-items:center; justify-content:space-between}
    .brand{display:flex;align-items:center;gap:14px}
    .brand img{height:64px}
    nav{display:flex; gap:18px; align-items:center}
    nav a{padding:8px 12px; color:var(--brown); font-weight:600}
    .btn-cta{background:linear-gradient(90deg,var(--gold-2),var(--gold-3)); color:white; padding:10px 16px; border-radius:999px; box-shadow:0 6px 18px rgba(176,123,42,0.18); border:none; cursor:pointer}

    /* banner */
    .hero{padding:56px 0 48px}
    .hero-grid{display:grid; grid-template-columns: 1fr 420px; gap:36px; align-items:center; max-width:var(--container); margin:0 auto; padding:0 20px}
    .hero-card{background:var(--glass); border-radius:18px; padding:28px; box-shadow:0 8px 32px rgba(0,0,0,0.06)}
    h1{font-size:34px; margin:0 0 12px}
    p.lead{color:var(--muted); margin:0 0 18px}

    .services{display:flex; gap:14px}
    .service{flex:1; background:white; border-radius:12px; padding:14px; text-align:center; box-shadow:0 6px 20px rgba(78,43,13,0.06)}
    .service h3{margin:6px 0 8px; color:var(--brown)}

    /* form */
    form.field{display:flex; flex-direction:column; gap:10px}
    .row{display:flex; gap:10px}
    input, select, textarea{padding:10px 12px; border-radius:10px; border:1px solid #e5e1dc; font-size:14px}
    .submit{background:linear-gradient(90deg,var(--gold-2),var(--gold-3)); color:#fff; padding:12px; border-radius:10px; border:none; font-weight:700; cursor:pointer}

    /* presentation */
    section.present{max-width:var(--container); margin:36px auto; padding:0 20px}
    .dg{display:flex; gap:22px; align-items:center}
    .dg img{height:110px; width:110px; object-fit:cover; border-radius:10px}
    .values{display:flex; gap:18px; margin-top:18px}
    .value{flex:1; background:white; padding:16px; border-radius:12px; text-align:center; box-shadow:0 6px 20px rgba(0,0,0,0.04)}

    /* timeline 2-column */
    .timeline{max-width:var(--container); margin:36px auto; padding:0 20px}
    .timeline-grid{display:grid; grid-template-columns:1fr 1fr; gap:20px}
    .timeline-col{background:linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.95)); padding:18px; border-radius:12px}
    .step{display:flex; gap:12px; align-items:flex-start; margin-bottom:16px}
    .step .num{min-width:44px; height:44px; background:linear-gradient(180deg,var(--gold-2),var(--gold-3)); color:#fff; font-weight:800; display:flex; align-items:center; justify-content:center; border-radius:10px}
    .step h4{margin:0 0 6px}

    /* faq */
    .faq{max-width:var(--container); margin:36px auto; padding:0 20px}
    .acc{background:white; padding:16px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.03)}
    .question{display:flex; justify-content:space-between; align-items:center; cursor:pointer; padding:10px 0}
    .answer{padding:8px 0; color:var(--muted); display:none}

    /* footer */
    footer{background:#fff; border-top:1px solid #f0ebe5; padding:26px 0; margin-top:36px}
    .footer-grid{max-width:var(--container); margin:0 auto; padding:0 20px; display:flex; justify-content:space-between; align-items:center}

    /* floating CTA */
    .floating{position:fixed; right:18px; bottom:18px; z-index:9999}
    .floating button{padding:14px 18px; border-radius:999px; border:none; background:linear-gradient(90deg,var(--gold-2),var(--gold-3)); color:white; box-shadow:0 10px 30px rgba(176,123,42,0.2); cursor:pointer}

    /* responsive */
    @media (max-width:980px){
      .hero-grid{grid-template-columns:1fr;}
      .timeline-grid{grid-template-columns:1fr}
      nav{display:none}
      header .wrap{justify-content:space-between}
    }
  </style>
</head>
<body>

<header>
  <div class="wrap">
    <div class="brand">
      <img src="assets/logo.png" alt="SCI SAGES logo">
      <div>
        <div style="font-weight:800;color:var(--brown);">SCI SAGES</div>
        <small style="color:var(--brown);">Promoteur immobilier</small>
      </div>
    </div>

    <nav aria-label="Main navigation">
      <a href="#">Accueil</a>
      <a href="#presentation">Présentation</a>
      <a href="#projets">Nos projets</a>
      <a href="#valeurs">Nos valeurs</a>
      <a href="#faq">FAQ</a>
      <a href="#contact" class="btn-cta">Soumettre votre demande</a>
    </nav>
  </div>
</header>

<!-- HERO / BANNER -->
<section class="hero">
  <div class="hero-grid">
    <div class="hero-card">
      <h1>Démarrez votre projet avec <span style="color:var(--brown)">SCI SAGES</span></h1>
      <p class="lead">Souscrire à nos maisons de rêves ou faire construire votre maison sur-mesure — nous vous accompagnons à chaque étape.</p>

      <div class="services" style="margin-bottom:16px">
        <div class="service">
          <h3>Souscrire à nos maisons de rêves</h3>
          <p style="font-size:13px;color:var(--muted)">Choisissez un modèle, réservez et profitez.</p>
        </div>
        <div class="service">
          <h3>Faites construire votre maison</h3>
          <p style="font-size:13px;color:var(--muted)">Étude, exécution et suivi personnalisé.</p>
        </div>
      </div>

      <form class="field" id="leadForm">
        <div class="row">
          <input type="text" name="name" placeholder="Nom complet" required>
          <input type="tel" name="phone" placeholder="Téléphone" required>
        </div>
        <div class="row">
          <input type="email" name="email" placeholder="Email" required>
          <select name="service">
            <option value="acheter">Acheter (Souscrire)</option>
            <option value="construire">Faire construire</option>
          </select>
        </div>
        <textarea name="message" rows="3" placeholder="Message (optionnel)"></textarea>
        <button type="submit" class="submit">Démarrer mon projet</button>
      </form>

    </div>

    <aside style="display:flex;flex-direction:column;gap:18px">
      <div class="hero-card" style="text-align:center">
        <h3 style="color:var(--brown)">DEMARREZ VOTRE PROJET</h3>
        <p class="lead">Formulaire rapide : Acheter ou Faire construire</p>
        <img src="assets/house-sample.jpg" alt="maison" style="width:100%; border-radius:10px; margin-top:8px">
      </div>

      <div class="hero-card">
        <h4 style="margin-top:0;color:var(--brown)">Contact rapide</h4>
        <p style="margin:8px 0">Téléphone : <strong>+225 05 05 96 96 25</strong></p>
        <p style="margin:8px 0">Email : <strong>contact@scisages.ci</strong></p>
        <button class="btn-cta" onclick="location.href='#contact'">Soumettre votre demande</button>
      </div>
    </aside>
  </div>
</section>

<!-- PRESENTATION -->
<section id="presentation" class="present">
  <div style="display:flex;gap:22px;align-items:center;flex-wrap:wrap">
    <div style="flex:1;min-width:280px">
      <h2>Qui sommes-nous ?</h2>
      <p class="lead">SCI SAGES est un promoteur immobilier spécialisé dans la vente de maisons modernes prêtes à habiter et la construction sur-mesure. Nous privilégions la qualité, la transparence et la satisfaction client.</p>
      <div class="values" id="valeurs">
        <div class="value">
          <strong>Confiance</strong>
          <p style="font-size:13px;color:var(--muted)">Transparence dans nos offres et nos engagements.</p>
        </div>
        <div class="value">
          <strong>Qualité</strong>
          <p style="font-size:13px;color:var(--muted)">Matériaux et exécution conformes aux normes.</p>
        </div>
        <div class="value">
          <strong>Innovation</strong>
          <p style="font-size:13px;color:var(--muted)">Plans optimisés et solutions modernes.</p>
        </div>
      </div>
    </div>

    <div style="min-width:280px;flex-basis:320px">
      <div class="dg">
        <img src="assets/dg.jpg" alt="Directeur général">
        <div>
          <h3>Mot du Directeur Général</h3>
          <p style="color:var(--muted)">"Chez SCI SAGES, nous plaçons le client au centre de chaque projet. Notre équipe accompagne chaque étape pour transformer vos rêves en réalité."</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TIMELINE -->
<section id="projets" class="timeline">
  <h2 style="text-align:center">Projet en 5 étapes</h2>
  <p style="text-align:center;color:var(--muted)">Deux parcours côte-à-côte : Souscription ou Construction sur-mesure</p>

  <div class="timeline-grid" style="margin-top:18px">
    <div class="timeline-col">
      <h3 style="color:var(--brown)">Souscrire à nos maisons de rêves</h3>
      <div class="step">
        <div class="num">1</div>
        <div>
          <h4>Visiter et faire son choix</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Sélectionnez un modèle et visualisez le lot.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">2</div>
        <div>
          <h4>Faire sa réservation</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Réservez votre maison en quelques clics.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">3</div>
        <div>
          <h4>Suivre l’évolution des travaux</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Accédez aux photos et rapports de chantier.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">4</div>
        <div>
          <h4>Profiter de votre espace</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Remise des clés et service après-vente.</p>
        </div>
      </div>
    </div>

    <div class="timeline-col">
      <h3 style="color:var(--brown)">Faites construire votre maison de rêve</h3>

      <div class="step">
        <div class="num">1</div>
        <div>
          <h4>Étude et validation du projet</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Étude technique, budget et validation client.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">2</div>
        <div>
          <h4>Élaboration du plan d’exécution</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Plans détaillés, choix des matériaux et calendrier.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">3</div>
        <div>
          <h4>Suivre l’évolution des travaux</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Mise à jour régulière et réunions de chantier.</p>
        </div>
      </div>

      <div class="step">
        <div class="num">4</div>
        <div>
          <h4>Profiter de votre espace</h4>
          <p class="lead" style="margin:6px 0;color:var(--muted)">Livraison finale et accompagnement.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="faq">
  <h2 style="text-align:center">FAQ — Vous avez une question ?</h2>
  <div style="max-width:900px;margin:18px auto">
    <div class="acc">
      <div class="question"> <span>Comment réserver une maison ?</span> <span>+</span></div>
      <div class="answer">Vous pouvez réserver via le formulaire de contact, par téléphone ou via notre bouton « Soumettre votre demande ».</div>
      <hr>
      <div class="question"> <span>Quels sont les délais de construction ?</span> <span>+</span></div>
      <div class="answer">Les délais varient selon le projet ; une estimation vous sera fournie après l’étude initiale.</div>
      <hr>
      <div class="question"> <span>Proposez-vous des financements ?</span> <span>+</span></div>
      <div class="answer">Nous collaborons avec des partenaires financiers pour proposer des solutions adaptées.</div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div style="display:flex;gap:12px;align-items:center">
      <img src="assets/logo.png" alt="logo" style="height:54px">
      <div>
        <strong>SCI SAGES</strong>
        <div style="font-size:13px;color:var(--muted)">Promoteur immobilier</div>
      </div>
    </div>

    <div style="text-align:right">
      <div style="font-size:14px;color:var(--muted)">+225 05 05 96 96 25 &nbsp; | &nbsp; contact@scisages.ci</div>
      <small style="color:var(--muted)">© 2025 SCI SAGES — Tous droits réservés</small>
    </div>
  </div>
</footer>

<!-- Floating CTA -->
<div class="floating">
  <button onclick="document.querySelector('#leadForm').scrollIntoView({behavior:'smooth'})">Soumettre votre demande</button>
</div>

<script>
  // simple accordion for FAQ
  document.querySelectorAll('.acc .question').forEach(q=>{
    q.addEventListener('click', ()=>{
      const next = q.nextElementSibling;
      // toggle
      if(next.style.display==='block'){
        next.style.display='none';
        q.querySelector('span:last-child').textContent='+';
      }else{
        // hide all
        document.querySelectorAll('.acc .answer').forEach(a=>a.style.display='none');
        document.querySelectorAll('.acc .question span:last-child').forEach(s=>s.textContent='+');
        next.style.display='block';
        q.querySelector('span:last-child').textContent='-';
      }
    })
  })

  // form submit (demo) - replace with your endpoint
  document.querySelector('#leadForm').addEventListener('submit', function(e){
    e.preventDefault();
    alert('Merci ! Votre demande a été enregistrée. Nous vous contacterons rapidement.');
    this.reset();
  })
</script>

</body>
</html>
