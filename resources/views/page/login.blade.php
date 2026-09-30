<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coming Soon · Simple Frontend</title>
  <style>
    /* Global reset & base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
      background: linear-gradient(145deg, #0b1120 0%, #1a2639 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      color: #eef2f6;
      line-height: 1.5;
    }

    /* Card container – glassmorphism / soft dark */
    .coming-soon {
      max-width: 780px;
      width: 100%;
      background: rgba(20, 30, 48, 0.75);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 2.5rem;
      padding: 4rem 2.5rem;
      text-align: center;
      box-shadow: 0 25px 50px -8px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.02) inset;
      transition: transform 0.2s ease;
    }

    .coming-soon:hover {
      transform: scale(1.005);
    }

    /* Icon / badge area */
    .badge {
      display: inline-block;
      background: rgba(110, 195, 255, 0.15);
      border: 1px solid rgba(110, 195, 255, 0.3);
      border-radius: 100px;
      padding: 0.5rem 1.5rem;
      font-size: 0.9rem;
      font-weight: 500;
      letter-spacing: 0.3px;
      text-transform: uppercase;
      color: #8ecae6;
      margin-bottom: 2rem;
      backdrop-filter: blur(4px);
    }

    /* Main heading */
    h1 {
      font-size: clamp(2.5rem, 10vw, 5rem);
      font-weight: 700;
      letter-spacing: -0.02em;
      line-height: 1.1;
      margin-bottom: 1.25rem;
      background: linear-gradient(to right, #ffffff, #b0c9e8);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 2px 10px rgba(0, 160, 255, 0.1);
    }

    /* Subtext */
    .subtitle {
      font-size: clamp(1.05rem, 4vw, 1.4rem);
      color: #a6b9d0;
      max-width: 520px;
      margin: 0 auto 2.75rem auto;
      font-weight: 400;
      border-left: 3px solid #2d4b6e;
      padding-left: 1.2rem;
      text-align: left;
      background: linear-gradient(90deg, rgba(110, 195, 255, 0.05), transparent);
      border-radius: 0 8px 8px 0;
    }

    /* Simple email / notify form */
    .notify-form {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem;
      justify-content: center;
      align-items: center;
      max-width: 500px;
      margin: 0 auto 2rem auto;
    }

    .notify-form input {
      flex: 1 1 240px;
      padding: 1rem 1.5rem;
      border-radius: 60px;
      border: 1px solid #2a3a50;
      background: #0e1624;
      color: #ffffff;
      font-size: 1rem;
      outline: none;
      transition: border 0.2s, box-shadow 0.2s;
      font-family: inherit;
    }

    .notify-form input::placeholder {
      color: #5a6f88;
      font-weight: 300;
    }

    .notify-form input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    }

    .notify-form button {
      flex: 0 0 auto;
      background: #ffffff;
      color: #0b1120;
      border: none;
      border-radius: 60px;
      padding: 1rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.15s ease;
      letter-spacing: 0.3px;
      box-shadow: 0 8px 18px -6px rgba(0, 150, 255, 0.3);
      font-family: inherit;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .notify-form button:hover {
      background: #d4e6ff;
      transform: translateY(-2px);
      box-shadow: 0 14px 22px -8px #1e3a5f;
    }

    .notify-form button:active {
      transform: translateY(1px);
      box-shadow: 0 4px 10px -4px #1e3a5f;
    }

    /* Countdown / small detail (not dynamic, just style) */
    .countdown-note {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 1rem;
      color: #6b8aaa;
      font-size: 0.95rem;
      margin-top: 1.8rem;
      border-top: 1px solid rgba(255, 255, 255, 0.05);
      padding-top: 2rem;
      font-weight: 300;
      letter-spacing: 0.3px;
    }

    .countdown-note span {
      background: #1b2a3f;
      padding: 0.2rem 0.9rem;
      border-radius: 30px;
      color: #8ecae6;
      font-weight: 500;
      font-size: 0.85rem;
      border: 1px solid #2a3f5a;
    }

    /* Social / footer micro */
    .social-links {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      margin-top: 1.8rem;
      font-size: 0.9rem;
      color: #4f6885;
    }

    .social-links a {
      color: #6b8aaa;
      text-decoration: none;
      transition: color 0.2s, transform 0.2s;
      display: inline-block;
      font-weight: 400;
      border-bottom: 1px dotted transparent;
      padding-bottom: 2px;
    }

    .social-links a:hover {
      color: #b3d4ff;
      border-bottom-color: #b3d4ff;
      transform: translateY(-1px);
    }

    /* Responsive adjustments */
    @media (max-width: 550px) {
      .coming-soon {
        padding: 2.5rem 1.5rem;
        border-radius: 2rem;
      }

      .subtitle {
        text-align: center;
        border-left: none;
        padding-left: 0;
        background: none;
      }

      .notify-form button {
        width: 100%;
        padding: 1rem;
      }

      .countdown-note {
        flex-direction: column;
        gap: 0.5rem;
      }
    }

    /* Small decorative glow */
    .glow {
      position: fixed;
      width: 60vmax;
      height: 60vmax;
      background: radial-gradient(circle, rgba(30, 100, 200, 0.15) 0%, transparent 70%);
      border-radius: 50%;
      top: -20vmax;
      right: -20vmax;
      pointer-events: none;
      z-index: -1;
      filter: blur(40px);
    }
  </style>
</head>
<body>
  <!-- subtle background glow -->
  <div class="glow"></div>

  <main class="coming-soon">
    <div class="badge">🚧 Under construction</div>
    
    <h1>login</h1>
    
    <p class="subtitle">
Login page
    </p>

    <!-- Simple email capture (no action, just frontend demo) -->
    <form class="notify-form" onsubmit="event.preventDefault(); alert('Thanks! This is a demo — no email stored.');">
      <input type="email" placeholder="your@email.com" aria-label="Email address" required>
      <button type="submit">Notify me</button>
    </form>

    <div class="countdown-note">
      <span>⏳</span> Launching soon — stay tuned
    </div>

    <!-- minimal social / extra links -->
    <div class="social-links">
      <a href="#" aria-label="Twitter">Twitter</a>
      <a href="#" aria-label="GitHub">GitHub</a>
      <a href="#" aria-label="Updates">Updates</a>
    </div>
  </main>
</body>
</html>