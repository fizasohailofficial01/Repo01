{{-- resources/views/component/finbooks-hero.blade.php --}}
<section class="finbooks-hero">

  <style>
    /* ---------- GLOBAL RESET (scoped) ---------- */
    .finbooks-hero * { margin: 0; padding: 0; box-sizing: border-box; }

    .finbooks-hero {
      position: relative;
      width: 100%;
      height: 100vh;
      height: 100dvh; /* better mobile support */
      min-height: 640px;
      display: flex;
      flex-direction: column;
      background:
        radial-gradient(ellipse at 15% 20%, rgba(20, 184, 166, 0.10), transparent 55%),
        radial-gradient(ellipse at 85% 80%, rgba(244, 114, 100, 0.08), transparent 55%),
        linear-gradient(135deg, #f6fbfa 0%, #eef6f5 45%, #e4f0ee 70%, #d9eae7 100%);
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: #0f2a2e;
      overflow: hidden;
    }

    

    @keyframes fbNavEnter {
      0%   { opacity: 0; transform: translateY(-16px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .finbooks-hero .logo {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      font-size: 1.15rem;
      font-weight: 700;
      letter-spacing: 0.6px;
      color: #0f2a2e;
      cursor: pointer;
      transition: transform 0.3s;
    }
    .finbooks-hero .logo:hover { transform: translateY(-1px); }

    .finbooks-hero .logo-mark {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, #14b8a6, #0d9488);
      display: grid;
      place-items: center;
      color: #fff;
      font-size: 1rem;
      font-weight: 800;
      box-shadow:
        0 8px 18px -6px rgba(20, 184, 166, 0.7),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
      position: relative;
    }
    .finbooks-hero .logo-mark::after {
      content: '';
      position: absolute;
      inset: -3px;
      border-radius: 50%;
      border: 1px solid rgba(20, 184, 166, 0.35);
      animation: fbLogoRing 3s ease-in-out infinite;
    }
    @keyframes fbLogoRing {
      0%, 100% { transform: scale(1); opacity: 0.6; }
      50%      { transform: scale(1.12); opacity: 0; }
    }

    .finbooks-hero .nav-links {
      display: flex;
      align-items: center;
      gap: 0.35rem;
      list-style: none;
      background: rgba(15, 42, 46, 0.04);
      padding: 0.3rem;
      border-radius: 999px;
      border: 1px solid rgba(20, 184, 166, 0.10);
    }

    .finbooks-hero .nav-links a {
      display: inline-block;
      text-decoration: none;
      color: #4a6670;
      font-weight: 500;
      font-size: 0.88rem;
      letter-spacing: 0.3px;
      padding: 0.55rem 1.1rem;
      border-radius: 999px;
      transition: color 0.3s, background 0.3s, transform 0.3s;
      position: relative;
    }

    .finbooks-hero .nav-links a:hover {
      color: #0f2a2e;
      background: rgba(20, 184, 166, 0.12);
      transform: translateY(-1px);
    }

    .finbooks-hero .nav-actions {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .finbooks-hero .nav-link-plain {
      text-decoration: none;
      color: #4a6670;
      font-weight: 500;
      font-size: 0.88rem;
      padding: 0.55rem 1rem;
      border-radius: 999px;
      transition: color 0.3s, background 0.3s;
    }
    .finbooks-hero .nav-link-plain:hover {
      color: #0f2a2e;
      background: rgba(20, 184, 166, 0.10);
    }

    .finbooks-hero .nav-cta {
      padding: 0.65rem 1.35rem;
      background: linear-gradient(135deg, #14b8a6, #0f2a2e);
      color: #fff !important;
      border-radius: 999px;
      font-weight: 600 !important;
      font-size: 0.88rem !important;
      text-decoration: none;
      letter-spacing: 0.3px;
      box-shadow:
        0 10px 22px -8px rgba(20, 184, 166, 0.7),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
      overflow: hidden;
    }
    .finbooks-hero .nav-cta::before {
      content: '';
      position: absolute;
      top: 0; left: -60%;
      width: 40%; height: 100%;
      background: linear-gradient(115deg, transparent, rgba(255,255,255,0.35), transparent);
      transform: skewX(-18deg);
      transition: left 0.7s ease;
    }
    .finbooks-hero .nav-cta:hover {
      transform: translateY(-2px);
      box-shadow:
        0 16px 30px -8px rgba(20, 184, 166, 0.9),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }
    .finbooks-hero .nav-cta:hover::before {
      left: 130%;
    }

    /* ============================================
       HERO — fills remaining viewport height
       ============================================ */
    .finbooks-hero .hero-wrap {
      flex: 1 1 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.25rem 1.5rem;
      position: relative;
      z-index: 5;
      perspective: 2000px;
      perspective-origin: 60% 50%;
      overflow: hidden;
      min-height: 0; /* allows flex child to shrink properly */
    }

    .finbooks-hero .hero {
      position: relative;
      width: 100%;
      max-width: 1300px;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 3rem;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
    }

    /* ---------- LEFT: TEXT ---------- */
    .finbooks-hero .hero-copy {
      flex: 1;
      max-width: 520px;
      z-index: 5;
      transform: translateZ(40px);
      animation: fbCopySlide 1.2s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes fbCopySlide {
      0%   { opacity: 0; transform: translate3d(-30px, 20px, 40px); }
      100% { opacity: 1; transform: translate3d(0, 0, 40px); }
    }

    .finbooks-hero .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.45rem 1rem;
      background: rgba(20, 184, 166, 0.10);
      border: 1px solid rgba(20, 184, 166, 0.28);
      border-radius: 40px;
      color: #0d9488;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 1.4rem;
    }

    .finbooks-hero .hero-badge::before {
      content: '';
      width: 8px; height: 8px;
      border-radius: 50%;
      background: #14b8a6;
      box-shadow: 0 0 10px #14b8a6;
      animation: fbPulseDot 2s ease-in-out infinite;
    }

    @keyframes fbPulseDot {
      0%, 100% { opacity: 1; transform: scale(1); }
      50%      { opacity: 0.5; transform: scale(1.3); }
    }

    .finbooks-hero .hero-copy h1 {
      font-size: clamp(2rem, 4.5vw, 3.2rem);
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -1px;
      color: #0f2a2e;
      margin-bottom: 1.2rem;
    }

    .finbooks-hero .hero-copy h1 span {
      background: linear-gradient(135deg, #14b8a6 0%, #f4705a 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .finbooks-hero .hero-copy p {
      font-size: clamp(0.95rem, 1.5vw, 1.1rem);
      line-height: 1.65;
      color: #4a6670;
      margin-bottom: 2rem;
      max-width: 460px;
    }

    .finbooks-hero .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .finbooks-hero .btn-primary {
      padding: 0.9rem 2rem;
      background: linear-gradient(135deg, #14b8a6, #0f2a2e);
      color: #fff;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      box-shadow: 0 14px 30px -8px rgba(20, 184, 166, 0.6);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .finbooks-hero .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 20px 38px -8px rgba(20, 184, 166, 0.85);
    }

    .finbooks-hero .btn-secondary {
      padding: 0.9rem 2rem;
      background: rgba(255, 255, 255, 0.75);
      color: #0f2a2e;
      border: 1.5px solid rgba(20, 184, 166, 0.35);
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: transform 0.3s, border-color 0.3s, background 0.3s;
    }

    .finbooks-hero .btn-secondary:hover {
      transform: translateY(-3px);
      border-color: #14b8a6;
      background: #fff;
    }

    .finbooks-hero .hero-stats {
      display: flex;
      gap: 2rem;
      margin-top: 2.2rem;
      padding-top: 1.8rem;
      border-top: 1px solid rgba(20, 184, 166, 0.22);
    }

    .finbooks-hero .stat-value {
      font-size: 1.5rem;
      font-weight: 800;
      color: #0f2a2e;
      letter-spacing: -0.5px;
    }

    .finbooks-hero .stat-label {
      font-size: 0.78rem;
      color: #7a9aa0;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 0.2rem;
    }

    /* ============================================
       RIGHT: FANNED CARD DECK
       ============================================ */
    .finbooks-hero .deck-stage {
      position: relative;
      flex: 0 0 480px;
      height: 100%;
      max-height: 100%;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      animation: fbDeckFloat 8s ease-in-out infinite;
    }

    @keyframes fbDeckFloat {
      0%, 100% { transform: translateY(0) rotateY(-2deg); }
      50%      { transform: translateY(-12px) rotateY(2deg); }
    }

    .finbooks-hero .deck {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300px;
      height: 400px;
      margin: -200px 0 0 -150px;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      transform: rotateY(-18deg) rotateX(6deg);
      transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .finbooks-hero .deck-stage:hover .deck {
      transform: rotateY(-6deg) rotateX(2deg);
    }

    .finbooks-hero .deck-card {
      position: absolute;
      inset: 0;
      border-radius: 22px;
      overflow: hidden;
      background: #fff;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      box-shadow:
        0 30px 60px -20px rgba(15, 90, 90, 0.35),
        0 0 0 1px rgba(20, 184, 166, 0.22),
        inset 0 0 0 1px rgba(255, 255, 255, 0.5);
      transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1),
                  filter 0.5s ease,
                  box-shadow 0.5s ease;
      will-change: transform, filter;
      cursor: pointer;
    }

    .finbooks-hero .deck-card:nth-child(1) {
      transform: translate3d(-70px, 0, 0) rotateZ(-8deg) rotateY(8deg);
      z-index: 1;
    }
    .finbooks-hero .deck-card:nth-child(2) {
      transform: translate3d(-35px, -10px, 20px) rotateZ(-4deg) rotateY(4deg);
      z-index: 2;
    }
    .finbooks-hero .deck-card:nth-child(3) {
      transform: translate3d(0, -20px, 40px) rotateZ(0deg) rotateY(0deg);
      z-index: 3;
    }
    .finbooks-hero .deck-card:nth-child(4) {
      transform: translate3d(35px, -10px, 20px) rotateZ(4deg) rotateY(-4deg);
      z-index: 2;
    }
    .finbooks-hero .deck-card:nth-child(5) {
      transform: translate3d(70px, 0, 0) rotateZ(8deg) rotateY(-8deg);
      z-index: 1;
    }

    .finbooks-hero .deck-stage:hover .deck-card:nth-child(1) {
      transform: translate3d(-190px, -20px, 20px) rotateZ(-16deg) rotateY(14deg);
      filter: brightness(0.95) blur(0.5px);
    }
    .finbooks-hero .deck-stage:hover .deck-card:nth-child(2) {
      transform: translate3d(-95px, -30px, 60px) rotateZ(-8deg) rotateY(7deg);
    }
    .finbooks-hero .deck-stage:hover .deck-card:nth-child(3) {
      transform: translate3d(0, -45px, 90px) rotateZ(0deg) rotateY(0deg);
      box-shadow:
        0 55px 100px -25px rgba(15, 90, 90, 0.5),
        0 0 0 1px rgba(20, 184, 166, 0.5),
        inset 0 0 0 1px rgba(255, 255, 255, 0.65);
    }
    .finbooks-hero .deck-stage:hover .deck-card:nth-child(4) {
      transform: translate3d(95px, -30px, 60px) rotateZ(8deg) rotateY(-7deg);
    }
    .finbooks-hero .deck-stage:hover .deck-card:nth-child(5) {
      transform: translate3d(190px, -20px, 20px) rotateZ(16deg) rotateY(-14deg);
      filter: brightness(0.95) blur(0.5px);
    }

    .finbooks-hero .deck-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transform: scale(1.02);
      transition: transform 0.7s ease;
    }

    .finbooks-hero .deck-stage:hover .deck-card:nth-child(3) img {
      transform: scale(1.08);
    }

    .finbooks-hero .deck-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(120% 80% at 50% 0%, rgba(20, 184, 166, 0.22), transparent 55%),
        linear-gradient(160deg,
          rgba(20, 184, 166, 0.14) 0%,
          rgba(15, 42, 46, 0.05) 50%,
          rgba(244, 112, 90, 0.16) 100%);
      mix-blend-mode: multiply;
      pointer-events: none;
      z-index: 2;
    }

    .finbooks-hero .deck-card::after {
      content: '';
      position: absolute;
      top: 0; left: -70%;
      width: 45%; height: 100%;
      background: linear-gradient(115deg,
        transparent 0%,
        rgba(255, 255, 255, 0.45) 50%,
        transparent 100%);
      transform: skewX(-18deg);
      transition: left 0.9s ease;
      pointer-events: none;
      z-index: 4;
    }

    .finbooks-hero .deck-stage:hover .deck-card::after {
      left: 140%;
    }

    .finbooks-hero .card-badge {
      position: absolute;
      bottom: 0.85rem;
      left: 0.85rem;
      right: 0.85rem;
      padding: 0.7rem 0.95rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 14px;
      box-shadow: 0 10px 25px -8px rgba(15, 90, 90, 0.3);
      transform: translateZ(40px);
      z-index: 5;
    }

    .finbooks-hero .card-badge-title {
      font-size: 0.85rem;
      font-weight: 700;
      color: #0f2a2e;
      letter-spacing: 0.3px;
    }

    .finbooks-hero .card-badge-sub {
      font-size: 0.72rem;
      color: #7a9aa0;
      margin-top: 0.15rem;
      letter-spacing: 0.5px;
    }

    .finbooks-hero .deck-stage::after {
      content: '';
      position: absolute;
      left: 50%;
      bottom: 6%;
      width: 420px;
      height: 45px;
      transform: translateX(-50%) rotateX(74deg);
      background: radial-gradient(ellipse at center,
        rgba(20, 184, 166, 0.42), transparent 70%);
      filter: blur(16px);
      pointer-events: none;
      transition: width 0.9s ease;
    }

    .finbooks-hero .deck-stage:hover::after {
      width: 560px;
    }

 
    

    /* ---------- FOOTER ---------- */
    .finbooks-hero .footer {
      position: relative;
      z-index: 20;
      flex: 0 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2.5rem;
      margin: 0 1.5rem 1.25rem 1.5rem;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(20, 184, 166, 0.22);
      border-radius: 1.5rem;
      box-shadow: 0 12px 35px -15px rgba(15, 90, 90, 0.28);
      font-size: 0.88rem;
      color: #4a6670;
      letter-spacing: 0.4px;
      animation: fbFloatY 6s ease-in-out infinite;
      animation-delay: -3s;
    }

    @keyframes fbFloatY {
      0%, 100% { transform: translateY(0); }
      50%      { transform: translateY(-4px); }
    }

    .finbooks-hero .footer-links { display: flex; gap: 1.8rem; }

    .finbooks-hero .footer-links a {
      text-decoration: none;
      color: #4a6670;
      transition: color 0.3s, transform 0.3s;
      display: inline-block;
    }

    .finbooks-hero .footer-links a:hover { color: #0f2a2e; transform: translateY(-2px); }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 1000px) {
      .finbooks-hero {
        height: auto;
        min-height: 100vh;
        min-height: 100dvh;
        overflow: visible;
      }
      .finbooks-hero .hero-wrap { padding: 2rem 1.5rem; }
      .finbooks-hero .hero {
        flex-direction: column;
        height: auto;
        gap: 3rem;
        padding: 1rem 0;
      }
      .finbooks-hero .hero-copy { max-width: 100%; text-align: center; }
      .finbooks-hero .hero-copy p { margin-left: auto; margin-right: auto; }
      .finbooks-hero .hero-actions { justify-content: center; }
      .finbooks-hero .hero-stats { justify-content: center; }
      .finbooks-hero .deck-stage {
        flex: 0 0 auto;
        width: 100%;
        height: 480px;
      }
    }

    @media (max-width: 900px) {
      .finbooks-hero .navbar {
        padding: 0.75rem 1rem;
        border-radius: 1.25rem;
      }
      .finbooks-hero .nav-links { display: none; }
      .finbooks-hero .nav-link-plain { display: none; }
    }

    @media (max-width: 600px) {
      .finbooks-hero .navbar {
        width: calc(100% - 2rem);
        margin-top: 1rem;
        padding: 0.65rem 0.75rem 0.65rem 1rem;
      }
      .finbooks-hero .logo { font-size: 1rem; }
      .finbooks-hero .logo-mark { width: 30px; height: 30px; font-size: 0.9rem; }
      .finbooks-hero .nav-cta { padding: 0.5rem 1rem; font-size: 0.78rem !important; }

      .finbooks-hero .footer { padding: 1rem 1.3rem; }
      .finbooks-hero .footer-links { gap: 1rem; }

      .finbooks-hero .deck {
        width: 200px;
        height: 280px;
        margin: -140px 0 0 -100px;
      }

      .finbooks-hero .deck-stage:hover .deck-card:nth-child(1) {
        transform: translate3d(-115px, -15px, 15px) rotateZ(-14deg);
      }
      .finbooks-hero .deck-stage:hover .deck-card:nth-child(2) {
        transform: translate3d(-58px, -22px, 40px) rotateZ(-7deg);
      }
      .finbooks-hero .deck-stage:hover .deck-card:nth-child(3) {
        transform: translate3d(0, -32px, 60px);
      }
      .finbooks-hero .deck-stage:hover .deck-card:nth-child(4) {
        transform: translate3d(58px, -22px, 40px) rotateZ(7deg);
      }
      .finbooks-hero .deck-stage:hover .deck-card:nth-child(5) {
        transform: translate3d(115px, -15px, 15px) rotateZ(14deg);
      }

      .finbooks-hero .deck-stage { height: 400px; }
      .finbooks-hero .deck-stage::after { width: 260px; }
      .finbooks-hero .deck-stage:hover::after { width: 340px; }
      .finbooks-hero .hero-stats { gap: 1.2rem; }
      .finbooks-hero .stat-value { font-size: 1.2rem; }
    }

    /* Short viewports — compress spacing */
    @media (max-height: 720px) and (min-width: 1001px) {
      .finbooks-hero .navbar { margin-top: 0.85rem; padding: 0.7rem 1rem 0.7rem 1.35rem; }
      .finbooks-hero .footer { padding: 0.75rem 2.2rem; margin-bottom: 0.9rem; }
      .finbooks-hero .hero-copy h1 { margin-bottom: 1rem; }
      .finbooks-hero .hero-copy p { margin-bottom: 1.4rem; }
      .finbooks-hero .hero-stats { margin-top: 1.5rem; padding-top: 1.3rem; }
    }
  </style>

 

  <!-- ---------- HERO ---------- -->
  <div class="hero-wrap">
    <div class="numbers">
    </div>

    <div class="hero">
      <div class="hero-copy">
        <div class="hero-badge">v3.0 · Now with AI Insights</div>
        <h1>Your books, <span>always balanced</span></h1>
        <p>
          Close the month in hours
        </p>
        <div class="hero-actions">
          <a href="#" class="btn-primary">Start 14-Day Trial</a>
          <a href="#" class="btn-secondary">See How It Works</a>
        </div>
        <div class="hero-stats">
          <div>
            <div class="stat-value">12k+</div>
            <div class="stat-label">Businesses</div>
          </div>
          <div>
            <div class="stat-value">$18B</div>
            <div class="stat-label">Reconciled</div>
          </div>
          <div>
            <div class="stat-value">4.9★</div>
            <div class="stat-label">G2 Rating</div>
          </div>
        </div>
      </div>

      <div class="deck-stage">
        <div class="deck">

          <div class="deck-card">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=800&fit=crop" alt="Invoices">
            <div class="card-badge">
              <div class="card-badge-title">Invoices</div>
              <div class="card-badge-sub">Auto-send &amp; chase</div>
            </div>
          </div>

          <div class="deck-card">
            <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=600&h=800&fit=crop" alt="Ledgers">
            <div class="card-badge">
              <div class="card-badge-title">Ledgers</div>
              <div class="card-badge-sub">Live &amp; always in sync</div>
            </div>
          </div>

          <div class="deck-card">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=800&fit=crop" alt="Analytics dashboard">
            <div class="card-badge">
              <div class="card-badge-title">Analytics</div>
              <div class="card-badge-sub">Cash-flow at a glance</div>
            </div>
          </div>

          <div class="deck-card">
            <img src="https://images.unsplash.com/photo-1589391886645-d51941baf7fb?w=600&h=800&fit=crop" alt="Tax and payroll">
            <div class="card-b