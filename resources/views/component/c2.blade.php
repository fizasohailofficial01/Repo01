{{-- resources/views/component/features.blade.php --}}

<section class="acc-features">
    <style>
        .acc-features *,
        .acc-features *::before,
        .acc-features *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .acc-features {
            position: relative;
            width: 100%;
            background: #ffffff;
            padding: 4rem 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #0f2547;
        }

        .acc-features__head {
            text-align: center;
            max-width: 620px;
            margin: 0 auto 3rem;
        }

        .acc-features__badge {
            display: inline-block;
            padding: 0.4rem 0.95rem;
            background: rgba(31, 74, 140, 0.07);
            border: 1px solid rgba(31, 74, 140, 0.22);
            border-radius: 40px;
            color: #1f4a8c;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.9px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .acc-features__head h2 {
            font-size: clamp(1.7rem, 3.4vw, 2.4rem);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.8px;
            color: #0b1f3d;
            margin-bottom: 0.9rem;
        }

        .acc-features__head h2 span {
            background: linear-gradient(135deg, #1f4a8c, #3a7bf0, #6aa8ff);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .acc-features__head p {
            font-size: 1rem;
            line-height: 1.6;
            color: #52678a;
        }

        .acc-features__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            perspective: 1200px;
        }

        .acc-feature-card {
            position: relative;
            padding: 2rem 1.6rem;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid #e4ecf8;
            box-shadow: 0 10px 24px -14px rgba(31, 74, 140, 0.25);
            transition: transform 0.15s ease-out, box-shadow 0.3s ease, border-color 0.3s ease;
            transform-style: preserve-3d;
            will-change: transform;
            cursor: pointer;
            overflow: hidden;
        }

        .acc-feature-card:hover {
            border-color: #3a7bf0;
            box-shadow: 0 30px 60px -20px rgba(31, 74, 140, 0.5);
            z-index: 5;
        }

        .acc-feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #3a7bf0, #6aa8ff);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s ease;
        }
        .acc-feature-card:hover::before {
            transform: scaleX(1);
        }

        .acc-feature-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(circle at 50% 0%, rgba(58, 123, 240, 0.12), transparent 70%);
            opacity: 0;
            transition: opacity 0.35s ease;
            pointer-events: none;
        }
        .acc-feature-card:hover::after {
            opacity: 1;
        }

        .acc-feature-card__icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, #eaf1ff, #d9e7ff);
            color: #1f4a8c;
            margin-bottom: 1.2rem;
            transition: transform 0.35s ease, background 0.35s ease;
            transform: translateZ(30px);
        }

        .acc-feature-card__icon svg {
            width: 26px;
            height: 26px;
        }

        .acc-feature-card:hover .acc-feature-card__icon {
            background: linear-gradient(135deg, #3a7bf0, #1f4a8c);
            color: #ffffff;
            transform: translateZ(50px) scale(1.05);
        }

        .acc-feature-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0b1f3d;
            margin-bottom: 0.6rem;
            letter-spacing: -0.2px;
            transform: translateZ(24px);
            transition: color 0.3s ease;
        }

        .acc-feature-card:hover h3 {
            color: #1f4a8c;
        }

        .acc-feature-card p {
            font-size: 0.92rem;
            line-height: 1.6;
            color: #52678a;
            transform: translateZ(16px);
        }

        /* ============================================================
           SCROLL REVEAL — cards animate IN TOGETHER, no stagger
        ============================================================ */
        .acc-feature-card.scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition:
                opacity 0.9s ease-out,
                transform 0.9s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .acc-feature-card.scroll-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (scripting: none) {
            .acc-feature-card.scroll-reveal {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 900px) {
            .acc-features__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .acc-features {
                padding: 3rem 1.2rem;
            }
            .acc-features__grid {
                grid-template-columns: 1fr;
            }
            .acc-feature-card {
                padding: 1.6rem 1.3rem;
            }
        }
    </style>

    {{-- HEADING --}}
    <div class="acc-features__head">
        <div class="acc-features__badge">Features</div>
        <h2>Everything you need to <span>run your books</span></h2>
        <p>Powerful tools built for modern accounting — simple, fast, and reliable.</p>
    </div>

    {{-- CARDS --}}
    <div class="acc-features__grid">

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="2" width="16" height="20" rx="2"/>
                    <line x1="8" y1="6" x2="16" y2="6"/>
                    <line x1="8" y1="10" x2="16" y2="10"/>
                    <line x1="8" y1="14" x2="12" y2="14"/>
                </svg>
            </div>
            <h3>Automated Invoicing</h3>
            <p>Create, send, and track invoices in seconds. Get paid faster with smart reminders.</p>
        </div>

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 3v18h18"/>
                    <path d="M7 14l4-4 4 4 5-5"/>
                </svg>
            </div>
            <h3>Real-time Reports</h3>
            <p>Live dashboards and financial statements updated the moment transactions happen.</p>
        </div>

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L3 7l9 5 9-5-9-5z"/>
                    <path d="M3 12l9 5 9-5"/>
                    <path d="M3 17l9 5 9-5"/>
                </svg>
            </div>
            <h3>Smart Ledgers</h3>
            <p>Auto-categorize every transaction and keep your books clean without manual entry.</p>
        </div>

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4z"/>
                    <path d="M9 12l2 2 4-4"/>
                </svg>
            </div>
            <h3>Tax Ready</h3>
            <p>Stay compliant with built-in tax rules, reports, and one-click filings.</p>
        </div>

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 6v6l4 2"/>
                </svg>
            </div>
            <h3>24/7 Support</h3>
            <p>Real humans, real answers — anytime you need help with your accounting.</p>
        </div>

        <div class="acc-feature-card">
            <div class="acc-feature-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <h3>Team Collaboration</h3>
            <p>Invite your team, assign roles, and work on the same books together, live.</p>
        </div>

    </div>
</section>

{{-- ============================================================
     INLINE SCRIPT — does NOT depend on @stack('scripts')
     ============================================================ --}}
<script>
    (function () {
        function initFeatures() {
            var cards = document.querySelectorAll('.acc-feature-card');
            if (!cards.length) return;

            if (!('IntersectionObserver' in window)) {
                return; // cards stay visible by default
            }

            // Add the hidden state
            cards.forEach(function (card) {
                card.classList.add('scroll-reveal');
            });

            // -------- Reveal the WHOLE GRID together (no stagger) --------
            var grid = document.querySelector('.acc-features__grid');

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        // Reveal every card at the same moment
                        cards.forEach(function (card) {
                            card.classList.add('is-visible');
                        });
                        observer.disconnect();
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            });

            if (grid) {
                observer.observe(grid);
            }

            // Safety net
            setTimeout(function () {
                cards.forEach(function (card) {
                    card.classList.add('is-visible');
                });
            }, 2500);

            // -------- 3D TILT ON HOVER --------
            cards.forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var rect = card.getBoundingClientRect();
                    var x = e.clientX - rect.left;
                    var y = e.clientY - rect.top;

                    var centerX = rect.width / 2;
                    var centerY = rect.height / 2;

                    var rotateY = ((x - centerX) / centerX) * 10;
                    var rotateX = ((centerY - y) / centerY) * 10;

                    card.style.transform =
                        'perspective(900px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateZ(10px) scale(1.04)';
                });

                card.addEventListener('mouseleave', function () {
                    card.style.transform = '';
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFeatures);
        } else {
            initFeatures();
        }
    })();
</script>