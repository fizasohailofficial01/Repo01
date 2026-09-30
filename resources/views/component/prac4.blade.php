{{-- resources/views/component/prac4.blade.php --}}
<section class="prac4-hero">

  <style>
    /* ============================================================
       SCOPED RESET
    ============================================================ */
    .prac4-hero *,
    .prac4-hero *::before,
    .prac4-hero *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ============================================================
       ROOT SECTION
       ✅ No 100vh, no body override, no overflow hidden
       ✅ Bounded height so it stacks cleanly
    ============================================================ */
    .prac4-hero {
      position: relative;
      width: 100%;
      height: 85vh;
      min-height: 600px;
      max-height: 900px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(
        135deg,
        #d4d9c4 0%,
        #e8e4d9 30%,
        #f0e6dc 60%,
        #e5d5cc 100%
      );
      font-family: 'Segoe UI', system-ui, sans-serif;
      overflow: hidden; /* safe: clips decorative glows inside the section */
      isolation: isolate;
      perspective: 1500px;
      perspective-origin: 50% 50%;
    }

    /* Soft natural texture overlay */
    .prac4-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(circle at 20% 30%, rgba(180, 200, 160, 0.25), transparent 55%),
        radial-gradient(circle at 80% 70%, rgba(220, 190, 170, 0.25), transparent 55%),
        radial-gradient(circle at 50% 50%, rgba(255, 245, 230, 0.15), transparent 70%);
      pointer-events: none;
      z-index: 1;
    }

    /* ============================================================
       CINEMATIC ORBIT SCENE
    ============================================================ */
    .prac4-hero .prac4-scene {
      position: relative;
      width: 100%;
      height: 100%;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      animation: prac4SceneSway 20s infinite ease-in-out;
      z-index: 2;
    }

    @keyframes prac4SceneSway {
      0%, 100% { transform: rotateY(-8deg); }
      50%      { transform: rotateY(8deg); }
    }

    /* ============================================================
       3D CARD
    ============================================================ */
    .prac4-hero .prac4-card {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 260px;
      height: 360px;
      margin: -180px 0 0 -130px;
      border-radius: 22px;
      background: #f0e6dc;
      box-shadow:
        0 30px 70px -20px rgba(80, 70, 50, 0.4),
        0 0 0 1px rgba(200, 190, 170, 0.5),
        inset 0 0 60px rgba(220, 210, 190, 0.2);
      overflow: hidden;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      transform-style: preserve-3d;
      will-change: transform;
    }

    .prac4-hero .prac4-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      border-radius: 22px;
      filter: saturate(1.1) brightness(1.02) contrast(1.03);
    }

    .prac4-hero .prac4-card::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 22px;
      background: linear-gradient(
        160deg,
        rgba(230, 210, 170, 0.15) 0%,
        rgba(200, 220, 190, 0.12) 50%,
        rgba(240, 200, 180, 0.15) 100%
      );
      pointer-events: none;
      mix-blend-mode: soft-light;
    }

    .prac4-hero .prac4-card::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 22px;
      box-shadow: inset 0 0 0 1.5px rgba(220, 210, 180, 0.6);
      pointer-events: none;
      z-index: 2;
    }

    /* ============================================================
       ORBIT ANIMATIONS
    ============================================================ */
    .prac4-hero .prac4-card:nth-child(1) {
      animation: prac4Orbit1 12s infinite ease-in-out;
    }
    .prac4-hero .prac4-card:nth-child(2) {
      animation: prac4Orbit2 12s infinite ease-in-out;
      animation-delay: -3s;
    }
    .prac4-hero .prac4-card:nth-child(3) {
      animation: prac4Orbit3 12s infinite ease-in-out;
      animation-delay: -6s;
    }
    .prac4-hero .prac4-card:nth-child(4) {
      animation: prac4Orbit4 12s infinite ease-in-out;
      animation-delay: -9s;
    }

    @keyframes prac4Orbit1 {
      0%   { transform: translate3d(-380px,  40px, -200px) rotateY(35deg)  rotateZ(-5deg) scale(0.9);  opacity: 0.75; }
      25%  { transform: translate3d(-260px, -60px,  120px) rotateY(15deg)  rotateZ(3deg)  scale(1.05); opacity: 1; }
      50%  { transform: translate3d(-380px,  40px, -200px) rotateY(35deg)  rotateZ(-5deg) scale(0.9);  opacity: 0.75; }
      75%  { transform: translate3d(-260px,  60px,   80px) rotateY(20deg)  rotateZ(-3deg) scale(1);    opacity: 0.95; }
      100% { transform: translate3d(-380px,  40px, -200px) rotateY(35deg)  rotateZ(-5deg) scale(0.9);  opacity: 0.75; }
    }

    @keyframes prac4Orbit2 {
      0%   { transform: translate3d(-160px, -60px, -120px) rotateY(18deg)  rotateZ(4deg)  scale(0.95); opacity: 0.8; }
      25%  { transform: translate3d(-80px,   60px,  180px) rotateY(5deg)   rotateZ(-3deg) scale(1.08); opacity: 1; }
      50%  { transform: translate3d(-160px, -60px, -120px) rotateY(18deg)  rotateZ(4deg)  scale(0.95); opacity: 0.8; }
      75%  { transform: translate3d(-60px,  -50px,  100px) rotateY(10deg)  rotateZ(3deg)  scale(1.02); opacity: 0.98; }
      100% { transform: translate3d(-160px, -60px, -120px) rotateY(18deg)  rotateZ(4deg)  scale(0.95); opacity: 0.8; }
    }

    @keyframes prac4Orbit3 {
      0%   { transform: translate3d(160px,  60px, -140px) rotateY(-18deg) rotateZ(-4deg) scale(0.95); opacity: 0.8; }
      25%  { transform: translate3d(80px,  -60px,  160px) rotateY(-5deg)  rotateZ(3deg)  scale(1.08); opacity: 1; }
      50%  { transform: translate3d(160px,  60px, -140px) rotateY(-18deg) rotateZ(-4deg) scale(0.95); opacity: 0.8; }
      75%  { transform: translate3d(60px,   50px,   80px) rotateY(-10deg) rotateZ(-3deg) scale(1.02); opacity: 0.98; }
      100% { transform: translate3d(160px,  60px, -140px) rotateY(-18deg) rotateZ(-4deg) scale(0.95); opacity: 0.8; }
    }

    @keyframes prac4Orbit4 {
      0%   { transform: translate3d(380px, -40px, -180px) rotateY(-35deg) rotateZ(5deg)  scale(0.9);  opacity: 0.75; }
      25%  { transform: translate3d(260px,  60px,  100px) rotateY(-15deg) rotateZ(-3deg) scale(1.05); opacity: 1; }
      50%  { transform: translate3d(380px, -40px, -180px) rotateY(-35deg) rotateZ(5deg)  scale(0.9);  opacity: 0.75; }
      75%  { transform: translate3d(260px, -60px,   60px) rotateY(-20deg) rotateZ(3deg)  scale(1);    opacity: 0.95; }
      100% { transform: translate3d(380px, -40px, -180px) rotateY(-35deg) rotateZ(5deg)  scale(0.9);  opacity: 0.75; }
    }

    .prac4-hero:hover .prac4-card,
    .prac4-hero:hover .prac4-scene {
      animation-play-state: paused;
    }

    /* ============================================================
       GLOW ORBS
    ============================================================ */
    .prac4-hero .prac4-glow {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 3;
      overflow: hidden;
    }

    .prac4-hero .prac4-glow::before,
    .prac4-hero .prac4-glow::after {
      content: '';
      position: absolute;
      width: 75vmax;
      height: 75vmax;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(230, 200, 150, 0.35), transparent 70%);
      animation: prac4FloatGlow 16s infinite alternate ease-in-out;
    }

    .prac4-hero .prac4-glow::before {
      top: -28vmax;
      left: -22vmax;
    }

    .prac4-hero .prac4-glow::after {
      bottom: -28vmax;
      right: -22vmax;
      animation-delay: -6s;
      background: radial-gradient(circle, rgba(170, 200, 160, 0.3), transparent 70%);
    }

    @keyframes prac4FloatGlow {
      0%   { transform: translate(0, 0) scale(1); }
      100% { transform: translate(14vmax, 10vmax) scale(1.25); }
    }

    /* ============================================================
       FLOATING DOTS
    ============================================================ */
    .prac4-hero .prac4-dots {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 4;
    }

    .prac4-hero .prac4-dots span {
      position: absolute;
      display: block;
      width: 5px;
      height: 5px;
      background: rgba(255, 235, 180, 0.9);
      border-radius: 50%;
      box-shadow:
        0 0 15px rgba(255, 230, 160, 0.9),
        0 0 30px rgba(230, 200, 130, 0.6);
      animation: prac4Twinkle 6s infinite alternate;
    }

    .prac4-hero .prac4-dots span:nth-child(1) { top: 12%; left:  8%; animation-duration: 4.2s; }
    .prac4-hero .prac4-dots span:nth-child(2) { top: 78%; left: 88%; animation-duration: 7.1s; width: 7px; height: 7px; }
    .prac4-hero .prac4-dots span:nth-child(3) { top: 42%; left: 18%; animation-duration: 5.3s; }
    .prac4-hero .prac4-dots span:nth-child(4) { top: 68%; left: 72%; animation-duration: 8.4s; width: 4px; height: 4px; }
    .prac4-hero .prac4-dots span:nth-child(5) { top:  8%; left: 92%; animation-duration: 6.7s; }
    .prac4-hero .prac4-dots span:nth-child(6) { top: 88%; left: 12%; animation-duration: 5.8s; width: 6px; height: 6px; }
    .prac4-hero .prac4-dots span:nth-child(7) { top: 52%; left: 96%; animation-duration: 7.3s; }
    .prac4-hero .prac4-dots span:nth-child(8) { top: 22%; left: 48%; animation-duration: 9.2s; width: 4px; height: 4px; }

    @keyframes prac4Twinkle {
      0%   { opacity: 0.2; transform: scale(0.7); }
      100% { opacity: 1;   transform: scale(1.6); }
    }

    /* ============================================================
       FLOATING LABEL
    ============================================================ */
    .prac4-hero .prac4-label {
      position: absolute;
      bottom: 30px;
      left: 0;
      width: 100%;
      text-align: center;
      color: rgba(90, 80, 55, 0.75);
      font-weight: 300;
      letter-spacing: 10px;
      text-transform: uppercase;
      font-size: 12px;
      z-index: 20;
      text-shadow:
        0 0 25px rgba(255, 240, 200, 0.9),
        0 0 50px rgba(230, 200, 150, 0.5);
      animation: prac4Breathe 5s infinite alternate ease-in-out;
      pointer-events: none;
    }

    @keyframes prac4Breathe {
      0%   { opacity: 0.4; letter-spacing: 10px; }
      100% { opacity: 0.95; letter-spacing: 14px; }
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 900px) {
      .prac4-hero {
        height: 75vh;
        min-height: 520px;
      }
      .prac4-hero .prac4-card {
        width: 200px;
        height: 280px;
        margin: -140px 0 0 -100px;
      }
    }

    @media (max-width: 600px) {
      .prac4-hero {
        height: 70vh;
        min-height: 460px;
      }
      .prac4-hero .prac4-card {
        width: 160px;
        height: 220px;
        margin: -110px 0 0 -80px;
      }
    }
  </style>

  <!-- ============================================================
       CINEMATIC ORBIT SCENE
  ============================================================ -->
  <div class="prac4-scene">

    <div class="prac4-card">
      <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=800&fit=crop" alt="Mountain landscape">
    </div>

    <div class="prac4-card">
      <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=600&h=800&fit=crop" alt="Valley view">
    </div>

    <div class="prac4-card">
      <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=600&h=800&fit=crop" alt="Forest road">
    </div>

    <div class="prac4-card">
      <img src="https://images.unsplash.com/photo-1439066615861-d1af74d74000?w=600&h=800&fit=crop" alt="Lake reflection">
    </div>

  </div>

  <!-- Glow orbs -->
  <div class="prac4-glow"></div>

  <!-- Twinkling dots -->
  <div class="prac4-dots">
    <span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span>
  </div>

  <!-- Floating label -->
  <div class="prac4-label">nature · in motion</div>

</section>