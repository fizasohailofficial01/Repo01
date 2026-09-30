{{-- resources/views/component/hero-slider.blade.php --}}
<section class="acct-hero">

  <style>
    /* ---------- Scoped reset ---------- */
    .acct-hero * { margin: 0; padding: 0; box-sizing: border-box; }

    .acct-hero {
      position: relative;
      width: 100%;
      height: 100vh;
      min-height: 600px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at 50% 40%, #fdf8f0, #e8dcc8 70%);
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    /* ---------- 3D stage ---------- */
    .acct-hero .stage {
      position: relative;
      width: 100%;
      height: 100%;
      perspective: 1400px;
      perspective-origin: 50% 50%;
    }

    /* ---------- Floating slider card ---------- */
    .acct-hero .float-card {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 700px;
      height: 500px;
      margin-left: -350px;
      margin-top: -250px;
      border-radius: 32px;
      overflow: hidden;
      transform: translateZ(0);
      transform-style: preserve-3d;
      box-shadow: 0 50px 100px rgba(60, 40, 20, 0.35),
                  0 0 80px rgba(200, 160, 100, 0.25),
                  0 0 0 1px rgba(255, 255, 255, 0.5);
      animation: acctFloatCard 6s ease-in-out infinite;
      will-change: transform;
      z-index: 5;
    }

    @keyframes acctFloatCard {
      0%   { transform: translateY(0)     rotateX(0deg)  rotateY(0deg)  rotateZ(0deg); }
      25%  { transform: translateY(-20px) rotateX(3deg)  rotateY(-4deg) rotateZ(1deg); }
      50%  { transform: translateY(-8px)  rotateX(-2deg) rotateY(5deg)  rotateZ(-1.5deg); }
      75%  { transform: translateY(-25px) rotateX(4deg)  rotateY(2deg)  rotateZ(2deg); }
      100% { transform: translateY(0)     rotateX(0deg)  rotateY(0deg)  rotateZ(0deg); }
    }

    /* ---------- Slider track ---------- */
    .acct-hero .slider {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      transition: transform 0.9s cubic-bezier(0.65, 0, 0.35, 1);
      will-change: transform;
      backface-visibility: hidden;
    }

    /* ---------- Slide ---------- */
    .acct-hero .slide {
      position: relative;
      min-width: 100%;
      height: 100%;
      overflow: hidden;
      flex-shrink: 0;
    }

    .acct-hero .slide img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transform: scale(1.1);
      transition: transform 1.2s ease;
    }

    .acct-hero .slide.active img { transform: scale(1); }

    .acct-hero .slide .overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to top,
        rgba(30, 20, 10, 0.92) 0%,
        rgba(30, 20, 10, 0.45) 45%,
        transparent 100%
      );
      z-index: 2;
    }

    /* ---------- Caption ---------- */
    .acct-hero .slide-caption {
      position: absolute;
      bottom: 40px;
      left: 40px;
      z-index: 15;
      color: #fff;
      max-width: 70%;
      pointer-events: none;
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .acct-hero .slide-caption .tag {
      display: inline-block;
      font-size: 0.7rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #ffd89b;
      background: rgba(220, 180, 120, 0.2);
      border: 1px solid rgba(220, 180, 120, 0.45);
      padding: 5px 14px;
      border-radius: 20px;
      margin-bottom: 10px;
      backdrop-filter: blur(6px);
    }

    .acct-hero .slide-caption .caption-title {
      font-size: clamp(1.4rem, 2.5vw, 2rem);
      font-weight: 700;
      margin-bottom: 6px;
      background: linear-gradient(to right, #ffffff, #ffd89b);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      line-height: 1.2;
    }

    .acct-hero .slide-caption .caption-text {
      font-size: clamp(0.8rem, 1.1vw, 0.95rem);
      color: #f5e6cc;
      opacity: 0.9;
      line-height: 1.5;
    }

    /* ---------- Orbiting icons ---------- */
    .acct-hero .orbit {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      z-index: 3;
      transform-style: preserve-3d;
    }

    .acct-hero .orbit-1 { animation: acctOrbit 20s linear infinite; }
    .acct-hero .orbit-2 { animation: acctOrbit 28s linear infinite reverse; }
    .acct-hero .orbit-3 { animation: acctOrbit 35s linear infinite; }
    .acct-hero .orbit-4 { animation: acctOrbit 24s linear infinite reverse; }

    @keyframes acctOrbit {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    .acct-hero .float-obj {
      position: absolute;
      border-radius: 50%;
      overflow: hidden;
      box-shadow: 0 20px 50px rgba(60, 40, 20, 0.4),
                  0 0 40px rgba(220, 180, 120, 0.35),
                  0 0 0 2px rgba(255, 255, 255, 0.4);
      animation: acctFloatObj 5s ease-in-out infinite;
      will-change: transform;
      background: rgba(240, 220, 190, 0.3);
      backdrop-filter: blur(4px);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .acct-hero .icon-obj {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #fdf4e3, #e8d5b5);
      color: #b8860b;
    }

    .acct-hero .icon-obj svg {
      width: 55%;
      height: 55%;
      stroke: #b8860b;
      stroke-width: 1.5;
      fill: none;
      filter: drop-shadow(0 0 8px rgba(220, 180, 120, 0.6));
    }

    @keyframes acctFloatObj {
      0%, 100% { transform: translateY(0) scale(1); }
      50%      { transform: translateY(-18px) scale(1.05); }
    }

    .acct-hero .obj-1 { width: 110px; height: 110px; top: -280px; left:  320px; animation-delay: 0s; }
    .acct-hero .obj-2 { width:  80px; height:  80px; top:  250px; left:  360px; border-radius: 24px; animation-delay: 1.2s; }
    .acct-hero .obj-3 { width:  90px; height:  90px; top:  200px; left: -340px; border-radius: 20px; animation-delay: 0.6s; }
    .acct-hero .obj-4 { width: 130px; height: 130px; top: -260px; left: -320px; animation-delay: 2s; }

    /* ---------- Hero title ---------- */
    .acct-hero .hero-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      z-index: 10;
      pointer-events: none;
      width: 100%;
      padding: 0 20px;
      text-shadow: 0 10px 40px rgba(0, 0, 0, 0.9);
      animation: acctFloatText 4s ease-in-out infinite;
    }

    @keyframes acctFloatText {
      0%, 100% { transform: translate(-50%, -50%) translateY(0); }
      50%      { transform: translate(-50%, -50%) translateY(-12px); }
    }

    .acct-hero .hero-content .title {
      font-size: clamp(3rem, 10vw, 7rem);
      font-weight: 800;
      letter-spacing: 4px;
      background: linear-gradient(to right, #ffffff, #ffd89b);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .acct-hero .hero-content .subtitle {
      font-size: clamp(0.9rem, 2vw, 1.3rem);
      letter-spacing: 3px;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      color: #f5e6cc;
      text-transform: uppercase;
    }

    /* ---------- Dots ---------- */
    .acct-hero .slider-nav {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 12px;
      z-index: 20;
    }

    .acct-hero .nav-dot {
      width: 36px;
      height: 4px;
      background: rgba(255, 255, 255, 0.35);
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .acct-hero .nav-dot::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #ffd89b;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
    }

    .acct-hero .nav-dot.active::after { transform: scaleX(1); }
    .acct-hero .nav-dot:hover { background: rgba(255, 255, 255, 0.6); }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
      .acct-hero .float-card {
        width: 88vw;
        height: 60vh;
        margin-left: -44vw;
        margin-top: -30vh;
      }
      .acct-hero .obj-1 { width: 70px; height: 70px; top: -220px; left:  180px; }
      .acct-hero .obj-2 { width: 55px; height: 55px; top:  200px; left:  200px; }
      .acct-hero .obj-3 { width: 60px; height: 60px; top:  180px; left: -190px; }
      .acct-hero .obj-4 { width: 80px; height: 80px; top: -200px; left: -180px; }
      .acct-hero .slide-caption { left: 20px; bottom: 30px; }
    }
  </style>

  <!-- HERO -->
  <div class="stage">

    <!-- Orbiting icons -->
    <div class="orbit orbit-1">
      <div class="float-obj obj-1">
        <div class="icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <rect x="4" y="2" width="16" height="20" rx="2" />
            <line x1="8" y1="6" x2="16" y2="6" />
            <line x1="8" y1="10" x2="8" y2="10.01" />
            <line x1="12" y1="10" x2="12" y2="10.01" />
            <line x1="16" y1="10" x2="16" y2="10.01" />
            <line x1="8" y1="14" x2="8" y2="14.01" />
            <line x1="12" y1="14" x2="12" y2="14.01" />
            <line x1="16" y1="14" x2="16" y2="14.01" />
            <line x1="8" y1="18" x2="16" y2="18" />
          </svg>
        </div>
      </div>
    </div>

    <div class="orbit orbit-2">
      <div class="float-obj obj-2">
        <div class="icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10" />
            <line x1="12" y1="20" x2="12" y2="4" />
            <line x1="6"  y1="20" x2="6"  y2="14" />
          </svg>
        </div>
      </div>
    </div>

    <div class="orbit orbit-3">
      <div class="float-obj obj-3">
        <div class="icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23" />
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
          </svg>
        </div>
      </div>
    </div>

    <div class="orbit orbit-4">
      <div class="float-obj obj-4">
        <div class="icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
            <polyline points="14 2 14 8 20 8" />
            <line x1="16" y1="13" x2="8" y2="13" />
            <line x1="16" y1="17" x2="8" y2="17" />
            <polyline points="10 9 9 9 8 9" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Floating slider card -->
    <div class="float-card" id="acctFloatCard">
      <div class="slider" id="acctSlider">

        <div class="slide active">
          <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1400&h=1000&fit=crop" alt="Financial planning">
          <div class="overlay"></div>
        </div>

        <div class="slide">
          <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1400&h=1000&fit=crop" alt="Data analysis">
          <div class="overlay"></div>
        </div>

        <div class="slide">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1400&h=1000&fit=crop" alt="Business meeting">
          <div class="overlay"></div>
        </div>

        <div class="slide">
          <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1400&h=1000&fit=crop" alt="Audit and compliance">
          <div class="overlay"></div>
        </div>

      </div>

      <!-- Caption -->
      <div class="slide-caption" id="acctCaption">
        <div class="tag">Planning</div>
        <div class="caption-title">Financial Strategy</div>
        <div class="caption-text">Build a solid financial roadmap for sustainable growth.</div>
      </div>

      <!-- Dots (visual indicator only) -->
      <div class="slider-nav" id="acctNavDots">
        <div class="nav-dot active" data-index="0"></div>
        <div class="nav-dot" data-index="1"></div>
        <div class="nav-dot" data-index="2"></div>
        <div class="nav-dot" data-index="3"></div>
      </div>
    </div>

    <!-- Hero title -->
    <div class="hero-content">
      <div class="title">ACCOUNT</div>
      <div class="subtitle">Precision · Analysis · Trust</div>
    </div>

  </div>
</section>

<script>
(function () {
  'use strict';

  var slider       = document.getElementById('acctSlider');
  var slides       = document.querySelectorAll('.acct-hero .slide');
  var navDots      = document.querySelectorAll('.acct-hero .nav-dot');
  var slideCaption = document.getElementById('acctCaption');

 

    

