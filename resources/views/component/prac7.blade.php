<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mouse Parallax Hero – Accounting</title>
  <style>
    /* Reset and base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', system-ui, sans-serif;
      overflow: hidden;
      background: #f5f0e8;
    }

    /* ---- HERO SECTION (div) ---- */
    .hero {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at 50% 40%, #fdf8f0, #e8dcc8 70%);
      cursor: crosshair;
    }

    /* ---- PARALLAX LAYER BASE (div) ---- */
    .layer {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      will-change: transform;
      transition: transform 0.15s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* ---- IMAGE FLOATING CARDS (divs) ---- */
    .float-card {
      position: absolute;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 30px 70px rgba(60, 40, 20, 0.4),
                  0 0 50px rgba(220, 180, 120, 0.25),
                  0 0 0 1px rgba(255, 255, 255, 0.5);
      background: #fdf4e3;
    }

    .float-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      opacity: 0.95;
    }

    /* ---- CORNER IMAGES – leaving center clear ---- */

    /* Top-left – Financial Planning */
    .card-1 {
      width: 320px;
      height: 230px;
      top: 3%;
      left: 3%;
      transform: rotate(-6deg);
    }

    /* Top-right – Data Analysis */
    .card-2 {
      width: 280px;
      height: 200px;
      top: 3%;
      right: 3%;
      transform: rotate(5deg);
    }

    /* Bottom-left – Business Meeting */
    .card-3 {
      width: 340px;
      height: 240px;
      bottom: 3%;
      left: 3%;
      transform: rotate(-4deg);
    }

    /* Bottom-right – Audit & Compliance */
    .card-4 {
      width: 300px;
      height: 215px;
      bottom: 3%;
      right: 3%;
      transform: rotate(7deg);
    }

    /* Top-center small – Calculator (circular) */
    .card-5 {
      width: 110px;
      height: 110px;
      top: 2%;
      left: 50%;
      margin-left: -55px;
      border-radius: 50%;
    }

    /* Bottom-center small – Ledger (circular) */
    .card-6 {
      width: 100px;
      height: 100px;
      bottom: 2%;
      left: 50%;
      margin-left: -50px;
      border-radius: 50%;
    }

    /* ---- ICON OBJECTS (SVG divs) – placed at edges ---- */
    .icon-float {
      position: absolute;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #fdf4e3, #e8d5b5);
      box-shadow: 0 20px 50px rgba(60, 40, 20, 0.35),
                  0 0 30px rgba(220, 180, 120, 0.35),
                  0 0 0 1px rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(4px);
    }

    .icon-float svg {
      width: 50%;
      height: 50%;
      stroke: #b8860b;
      stroke-width: 1.5;
      fill: none;
      filter: drop-shadow(0 0 8px rgba(220, 180, 120, 0.7));
    }

    /* Icon 1 – top edge, left of center */
    .icon-1 {
      width: 75px;
      height: 75px;
      top: 3%;
      left: 33%;
    }

    /* Icon 2 – top edge, right of center */
    .icon-2 {
      width: 65px;
      height: 65px;
      top: 3%;
      right: 33%;
      border-radius: 18px;
    }

    /* Icon 3 – bottom edge, left of center */
    .icon-3 {
      width: 70px;
      height: 70px;
      bottom: 3%;
      left: 33%;
    }

    /* Icon 4 – bottom edge, right of center */
    .icon-4 {
      width: 68px;
      height: 68px;
      bottom: 3%;
      right: 33%;
      border-radius: 18px;
    }

    /* ---- CENTER CONTENT (div) – in the clear middle zone ---- */
    .hero-content {
      position: relative;
      z-index: 10;
      text-align: center;
      color: #2c1810;
      padding: 0 30px;
      max-width: 560px;
      pointer-events: none;
      text-shadow: 0 4px 20px rgba(255, 240, 220, 0.9);
    }

    .hero-content .badge {
      display: inline-block;
      font-size: 0.65rem;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: #8a6d2b;
      background: rgba(220, 180, 120, 0.35);
      border: 1px solid rgba(184, 134, 11, 0.45);
      padding: 6px 18px;
      border-radius: 30px;
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
    }

    .hero-content .title {
      font-size: clamp(2.5rem, 7vw, 5rem);
      font-weight: 800;
      letter-spacing: 4px;
      background: linear-gradient(to right, #2c1810, #b8860b);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.8rem;
      line-height: 1;
    }

    .hero-content .subtitle {
      font-size: clamp(0.8rem, 1.6vw, 1.05rem);
      letter-spacing: 3px;
      opacity: 0.9;
      margin: 0 auto 30px;
      color: #5c4a2a;
      text-transform: uppercase;
      line-height: 1.6;
    }

    .hero-content .cta {
      display: inline-block;
      padding: 13px 40px;
      background: linear-gradient(135deg, #d4a84b, #b8860b);
      color: #ffffff;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      font-size: 0.8rem;
      border-radius: 40px;
      pointer-events: auto;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 15px 40px rgba(184, 134, 11, 0.4);
    }

    .hero-content .cta:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 50px rgba(184, 134, 11, 0.6);
    }

    /* ---- AMBIENT GLOW (div) ---- */
    .glow {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      pointer-events: none;
      z-index: 1;
    }

    .glow-1 {
      width: 500px;
      height: 500px;
      background: rgba(220, 180, 120, 0.3);
      top: -100px;
      left: -100px;
    }

    .glow-2 {
      width: 600px;
      height: 600px;
      background: rgba(200, 160, 90, 0.2);
      bottom: -200px;
      right: -100px;
    }

    /* ---- Responsive tweaks ---- */
    @media (max-width: 1100px) {
      .card-1 { width: 240px; height: 175px; }
      .card-2 { width: 210px; height: 155px; }
      .card-3 { width: 255px; height: 185px; }
      .card-4 { width: 225px; height: 165px; }
    }

    @media (max-width: 850px) {
      .card-1 { width: 170px; height: 125px; top: 2%; left: 2%; }
      .card-2 { width: 155px; height: 115px; top: 2%; right: 2%; }
      .card-3 { width: 180px; height: 130px; bottom: 2%; left: 2%; }
      .card-4 { width: 165px; height: 120px; bottom: 2%; right: 2%; }
      .card-5 { width: 75px; height: 75px; margin-left: -37.5px; }
      .card-6 { width: 70px; height: 70px; margin-left: -35px; }

      .icon-1 { width: 55px; height: 55px; left: 30%; }
      .icon-2 { width: 50px; height: 50px; right: 30%; }
      .icon-3 { width: 52px; height: 52px; left: 30%; }
      .icon-4 { width: 50px; height: 50px; right: 30%; }

      .hero-content {
        max-width: 380px;
        padding: 0 16px;
      }
    }

    @media (max-width: 550px) {
      .card-1 { width: 120px; height: 90px; top: 2%; left: 2%; }
      .card-2 { width: 110px; height: 82px; top: 2%; right: 2%; }
      .card-3 { width: 130px; height: 95px; bottom: 2%; left: 2%; }
      .card-4 { width: 118px; height: 87px; bottom: 2%; right: 2%; }
      .card-5 { width: 55px; height: 55px; margin-left: -27.5px; }
      .card-6 { width: 52px; height: 52px; margin-left: -26px; }

      .icon-1 { width: 42px; height: 42px; left: 28%; }
      .icon-2 { width: 38px; height: 38px; right: 28%; }
      .icon-3 { width: 40px; height: 40px; left: 28%; }
      .icon-4 { width: 38px; height: 38px; right: 28%; }

      .hero-content {
        max-width: 280px;
      }

      .hero-content .title {
        font-size: 2rem;
      }

      .hero-content .subtitle {
        font-size: 0.6rem;
        letter-spacing: 2px;
      }

      .hero-content .badge {
        font-size: 0.55rem;
        padding: 4px 14px;
      }

      .hero-content .cta {
        padding: 10px 28px;
        font-size: 0.7rem;
      }
    }
  </style>
</head>
<body>

  <!-- HERO SECTION – all children are divs -->
  <div class="hero" id="hero">

    <!-- Ambient glows -->
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <!-- ===== PARALLAX LAYER 1 (slowest – far background) ===== -->
    <div class="layer" data-depth="0.02">
      <div class="float-card card-1">
        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=440&fit=crop" alt="Financial planning documents">
      </div>
      <div class="float-card card-2">
        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=440&fit=crop" alt="Data analysis and charts">
      </div>
      <div class="float-card card-5">
        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=400&h=400&fit=crop" alt="Calculator">
      </div>
      <div class="float-card card-6">
        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=400&fit=crop" alt="Ledger and reports">
      </div>
    </div>

    <!-- ===== PARALLAX LAYER 2 (medium speed – mid background) ===== -->
    <div class="layer" data-depth="0.05">
      <div class="icon-float icon-1">
        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <line x1="12" y1="1" x2="12" y2="23" />
          <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
        </svg>
      </div>
      <div class="icon-float icon-2">
        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="20" x2="18" y2="10" />
          <line x1="12" y1="20" x2="12" y2="4" />
          <line x1="6" y1="20" x2="6" y2="14" />
        </svg>
      </div>
      
   

   

 

  </div>

  <script>
    (function() {
      const hero = document.getElementById('hero');
      const layers = document.querySelectorAll('.layer');

      // ---- Mouse Parallax Effect ----
      let mouseX = 0;
      let mouseY = 0;
 

        requestAnimationFrame(animate);
      }

      animate();

      hero.addEventListener('touchend', () => {
        mouseX = 0;
        mouseY = 0;
      });
    })();
  </script>

</body>
</html>