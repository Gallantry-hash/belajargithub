        <style>
            :root {
                --ink: #0b1526;
                --ink-soft: #33405a;
                --muted: #64748b;
                --line: rgba(11, 21, 38, 0.1);
                --surface: #ffffff;
                --canvas: #f6f8fc;
                --brand: #1d4ed8;
                --brand-strong: #1e40af;
                --amber: #f59e0b;
                --success: #15803d;
                --radius-lg: 22px;
                --radius-md: 14px;
                --shadow-sm: 0 1px 2px rgba(11, 21, 38, 0.06);
                --shadow-lg: 0 30px 60px -32px rgba(11, 21, 38, 0.45);
                --font: "Instrument Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                font-family: var(--font);
                color: var(--ink);
                background-color: var(--canvas);
                background-image:
                    radial-gradient(900px 420px at 88% -8%, rgba(245, 158, 11, 0.16), transparent 70%),
                    radial-gradient(760px 420px at 4% 0%, rgba(29, 78, 216, 0.12), transparent 68%);
                line-height: 1.6;
                -webkit-font-smoothing: antialiased;
            }

            .container {
                width: 100%;
                max-width: 1140px;
                margin: 0 auto;
                padding: 0 24px;
            }

            /* ---------- Header ---------- */

            .site-header {
                position: sticky;
                top: 0;
                z-index: 40;
                background: rgba(246, 248, 252, 0.82);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border-bottom: 1px solid var(--line);
            }

            .site-header__inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                height: 72px;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-weight: 700;
                font-size: 1.125rem;
                letter-spacing: -0.01em;
                color: var(--ink);
                text-decoration: none;
            }

            .brand__mark {
                display: grid;
                place-items: center;
                width: 38px;
                height: 38px;
                border-radius: 11px;
                background: linear-gradient(150deg, #1d4ed8, #0b2a6b);
                color: #fff;
                box-shadow: 0 8px 18px -10px rgba(29, 78, 216, 0.9);
            }

            .brand__mark svg {
                width: 20px;
                height: 20px;
            }

            .site-nav {
                display: flex;
                align-items: center;
                gap: 30px;
                font-size: 0.9375rem;
                font-weight: 500;
            }

            .site-nav a {
                color: var(--ink-soft);
                text-decoration: none;
                transition: color 0.18s ease;
            }

            .site-nav a:hover {
                color: var(--brand);
            }

            .header-note {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 7px 14px;
                border: 1px solid var(--line);
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.7);
                font-size: 0.8125rem;
                font-weight: 600;
                color: var(--ink-soft);
                white-space: nowrap;
            }

            .header-note .dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #16a34a;
                box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.15);
            }

            /* ---------- Hero ---------- */

            .hero {
                padding: 68px 0 76px;
            }

            .hero__grid {
                display: grid;
                grid-template-columns: 1.05fr 0.95fr;
                align-items: center;
                gap: 56px;
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                padding: 7px 14px 7px 9px;
                border-radius: 999px;
                background: rgba(29, 78, 216, 0.08);
                border: 1px solid rgba(29, 78, 216, 0.16);
                color: var(--brand-strong);
                font-size: 0.8125rem;
                font-weight: 600;
                letter-spacing: 0.01em;
            }

            .eyebrow span.badge {
                padding: 2px 8px;
                border-radius: 999px;
                background: var(--brand);
                color: #fff;
                font-size: 0.6875rem;
                letter-spacing: 0.04em;
                text-transform: uppercase;
            }

            .hero h1 {
                margin: 22px 0 18px;
                font-size: clamp(2.25rem, 4.6vw, 3.5rem);
                line-height: 1.08;
                letter-spacing: -0.035em;
                font-weight: 700;
            }

            .hero h1 .highlight {
                position: relative;
                color: var(--brand-strong);
                white-space: nowrap;
            }

            .hero h1 .highlight::after {
                content: "";
                position: absolute;
                left: 2px;
                right: 2px;
                bottom: 0.06em;
                height: 0.28em;
                border-radius: 3px;
                background: rgba(245, 158, 11, 0.38);
                z-index: -1;
            }

            .hero__lead {
                margin: 0;
                max-width: 34rem;
                font-size: 1.0625rem;
                color: var(--muted);
            }

            .hero__actions {
                display: flex;
                flex-wrap: wrap;
                gap: 14px;
                margin-top: 30px;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 15px 24px;
                border-radius: var(--radius-md);
                border: 1px solid transparent;
                font-family: inherit;
                font-size: 1rem;
                font-weight: 600;
                line-height: 1.2;
                cursor: pointer;
                text-decoration: none;
                transition: transform 0.16s ease, box-shadow 0.16s ease, background 0.16s ease, border-color 0.16s ease;
            }

            .btn svg {
                width: 18px;
                height: 18px;
                flex: none;
            }

            .btn:focus-visible {
                outline: 3px solid rgba(29, 78, 216, 0.35);
                outline-offset: 3px;
            }

            .btn--primary {
                background: linear-gradient(180deg, #2563eb, #1d4ed8);
                color: #fff;
                box-shadow: 0 14px 26px -14px rgba(29, 78, 216, 0.95), inset 0 1px 0 rgba(255, 255, 255, 0.18);
            }

            .btn--primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 32px -16px rgba(29, 78, 216, 0.95), inset 0 1px 0 rgba(255, 255, 255, 0.22);
            }

            .btn--secondary {
                background: var(--surface);
                color: var(--ink);
                border-color: rgba(11, 21, 38, 0.14);
                box-shadow: var(--shadow-sm);
            }

            .btn--secondary:hover {
                transform: translateY(-2px);
                border-color: rgba(11, 21, 38, 0.26);
                background: #fbfcfe;
                box-shadow: 0 14px 24px -18px rgba(11, 21, 38, 0.6);
            }

            .btn:active {
                transform: translateY(0);
            }

            .hero__meta {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                margin-top: 26px;
                padding: 0;
                list-style: none;
                font-size: 0.875rem;
                color: var(--muted);
            }

            .hero__meta li {
                display: inline-flex;
                align-items: center;
                gap: 7px;
            }

            .hero__meta svg {
                width: 15px;
                height: 15px;
                color: #16a34a;
                flex: none;
            }

            /* ---------- Mock dashboard ---------- */

            .preview {
                position: relative;
            }

            .preview__glow {
                position: absolute;
                inset: 8% 4% 6%;
                border-radius: 32px;
                background: linear-gradient(150deg, rgba(29, 78, 216, 0.22), rgba(245, 158, 11, 0.18));
                filter: blur(34px);
                z-index: 0;
            }

            .card {
                position: relative;
                z-index: 1;
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-lg);
                overflow: hidden;
            }

            .card__bar {
                display: flex;
                align-items: center;
                gap: 7px;
                padding: 14px 18px;
                background: #f8fafc;
                border-bottom: 1px solid var(--line);
            }

            .card__bar .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #dbe2ee;
            }

            .card__bar .dot:first-child {
                background: #fda4af;
            }

            .card__bar .dot:nth-child(2) {
                background: #fcd34d;
            }

            .card__bar .dot:nth-child(3) {
                background: #86efac;
            }

            .card__bar .url {
                margin-left: 10px;
                padding: 4px 12px;
                border-radius: 999px;
                background: #eef2f9;
                color: var(--muted);
                font-size: 0.75rem;
            }

            .card__body {
                padding: 20px 20px 8px;
            }

            .card__head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin-bottom: 16px;
            }

            .card__head h2 {
                margin: 0;
                font-size: 1rem;
                letter-spacing: -0.01em;
            }

            .card__head span {
                font-size: 0.75rem;
                color: var(--muted);
            }

            .rows {
                display: grid;
                gap: 8px;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .row {
                display: grid;
                grid-template-columns: 1fr auto auto;
                align-items: center;
                gap: 12px;
                padding: 11px 12px;
                border-radius: 12px;
                background: #f9fbfe;
                border: 1px solid rgba(11, 21, 38, 0.05);
            }

            .row__item {
                display: flex;
                align-items: center;
                gap: 10px;
                min-width: 0;
            }

            .row__icon {
                display: grid;
                place-items: center;
                width: 32px;
                height: 32px;
                flex: none;
                border-radius: 9px;
                background: #e8eeff;
                color: var(--brand);
            }

            .row__icon svg {
                width: 16px;
                height: 16px;
            }

            .row__name {
                display: block;
                font-size: 0.8125rem;
                font-weight: 600;
                color: var(--ink);
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .row__cat {
                display: block;
                font-size: 0.6875rem;
                color: var(--muted);
            }

            .row__qty {
                font-size: 0.75rem;
                font-weight: 600;
                color: var(--ink-soft);
                white-space: nowrap;
            }

            .chip {
                padding: 3px 9px;
                border-radius: 999px;
                font-size: 0.6875rem;
                font-weight: 600;
                white-space: nowrap;
            }

            .chip--ok {
                background: #e7f8ee;
                color: var(--success);
            }

            .chip--low {
                background: #fff3d9;
                color: #b45309;
            }

            .card__foot {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 16px 20px 20px;
                font-size: 0.75rem;
                color: var(--muted);
            }

            .card__foot .progress {
                flex: 1;
                height: 7px;
                border-radius: 999px;
                background: #eef2f9;
                overflow: hidden;
                max-width: 150px;
            }

            .card__foot .progress span {
                display: block;
                width: 72%;
                height: 100%;
                border-radius: inherit;
                background: linear-gradient(90deg, #2563eb, #60a5fa);
            }

            .floating {
                position: absolute;
                z-index: 2;
                display: flex;
                align-items: center;
                gap: 11px;
                padding: 12px 16px 12px 12px;
                border-radius: var(--radius-md);
                background: #fff;
                border: 1px solid var(--line);
                box-shadow: 0 18px 34px -22px rgba(11, 21, 38, 0.65);
                font-size: 0.8125rem;
                font-weight: 600;
            }

            .floating--saved {
                right: -18px;
                bottom: 28px;
            }

            .floating__icon {
                display: grid;
                place-items: center;
                width: 32px;
                height: 32px;
                flex: none;
                border-radius: 50%;
                background: #e7f8ee;
                color: var(--success);
            }

            .floating__icon svg {
                width: 16px;
                height: 16px;
            }

            .floating small {
                display: block;
                font-size: 0.6875rem;
                font-weight: 500;
                color: var(--muted);
            }

            /* ---------- Sections ---------- */

            .section {
                padding: 72px 0;
            }

            .section--tight {
                padding-top: 0;
            }

            .section__head {
                max-width: 620px;
                margin-bottom: 40px;
            }

            .section__label {
                display: inline-block;
                margin-bottom: 10px;
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--brand);
            }

            .section__head h2 {
                margin: 0 0 12px;
                font-size: clamp(1.6rem, 2.6vw, 2.125rem);
                line-height: 1.2;
                letter-spacing: -0.025em;
            }

            .section__head p {
                margin: 0;
                color: var(--muted);
                font-size: 1rem;
            }

            .cards {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            }

            .feature {
                padding: 24px;
                border-radius: var(--radius-lg);
                background: var(--surface);
                border: 1px solid var(--line);
                box-shadow: var(--shadow-sm);
                transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            }

            .feature:hover {
                transform: translateY(-4px);
                border-color: rgba(29, 78, 216, 0.28);
                box-shadow: 0 22px 34px -26px rgba(11, 21, 38, 0.7);
            }

            .feature__icon {
                display: grid;
                place-items: center;
                width: 44px;
                height: 44px;
                margin-bottom: 18px;
                border-radius: 12px;
                background: linear-gradient(150deg, rgba(29, 78, 216, 0.14), rgba(29, 78, 216, 0.06));
                color: var(--brand-strong);
            }

            .feature__icon svg {
                width: 22px;
                height: 22px;
            }

            .feature h3 {
                margin: 0 0 8px;
                font-size: 1rem;
                letter-spacing: -0.01em;
            }

            .feature p {
                margin: 0;
                font-size: 0.875rem;
                color: var(--muted);
            }

            .steps {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 20px;
                counter-reset: step;
            }

            .step {
                position: relative;
                padding: 26px 24px;
                border-radius: var(--radius-lg);
                background: rgba(255, 255, 255, 0.7);
                border: 1px solid var(--line);
            }

            .step__number {
                display: grid;
                place-items: center;
                width: 36px;
                height: 36px;
                margin-bottom: 16px;
                border-radius: 10px;
                background: var(--ink);
                color: #fff;
                font-size: 0.875rem;
                font-weight: 700;
            }

            .step h3 {
                margin: 0 0 6px;
                font-size: 1rem;
            }

            .step p {
                margin: 0;
                font-size: 0.875rem;
                color: var(--muted);
            }

            /* ---------- CTA ---------- */

            .cta {
                position: relative;
                overflow: hidden;
                padding: 52px;
                border-radius: 28px;
                background:
                    radial-gradient(560px 240px at 88% 0%, rgba(245, 158, 11, 0.28), transparent 70%),
                    radial-gradient(520px 260px at 8% 100%, rgba(59, 130, 246, 0.35), transparent 70%),
                    #0b1526;
                color: #fff;
                display: grid;
                grid-template-columns: 1.15fr auto;
                align-items: center;
                gap: 32px;
                box-shadow: 0 36px 70px -46px rgba(11, 21, 38, 0.9);
            }

            .cta h2 {
                margin: 0 0 10px;
                font-size: clamp(1.6rem, 2.6vw, 2.125rem);
                line-height: 1.2;
                letter-spacing: -0.025em;
            }

            .cta p {
                margin: 0;
                max-width: 34rem;
                color: rgba(255, 255, 255, 0.72);
                font-size: 0.9375rem;
            }

            .cta__actions {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
            }

            .btn--light {
                background: #fff;
                color: var(--ink);
                box-shadow: 0 14px 26px -16px rgba(0, 0, 0, 0.9);
            }

            .btn--light:hover {
                transform: translateY(-2px);
                background: #f4f7fd;
            }

            .btn--ghost {
                background: rgba(255, 255, 255, 0.06);
                color: #fff;
                border-color: rgba(255, 255, 255, 0.28);
            }

            .btn--ghost:hover {
                transform: translateY(-2px);
                background: rgba(255, 255, 255, 0.14);
                border-color: rgba(255, 255, 255, 0.5);
            }

            .btn--light:focus-visible,
            .btn--ghost:focus-visible {
                outline-color: rgba(255, 255, 255, 0.7);
            }

            /* ---------- Footer ---------- */

            .site-footer {
                margin-top: 80px;
                padding: 28px 0 36px;
                border-top: 1px solid var(--line);
                font-size: 0.8125rem;
                color: var(--muted);
            }

            .site-footer__inner {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
            }

            /* ---------- Toast ---------- */

            .toast {
                position: fixed;
                left: 50%;
                bottom: 28px;
                z-index: 60;
                display: flex;
                align-items: center;
                gap: 11px;
                padding: 13px 20px 13px 14px;
                border-radius: var(--radius-md);
                background: #0b1526;
                color: #fff;
                font-size: 0.875rem;
                font-weight: 500;
                box-shadow: 0 24px 46px -22px rgba(11, 21, 38, 0.85);
                opacity: 0;
                transform: translate(-50%, 14px);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s ease;
                max-width: calc(100vw - 32px);
            }

            .toast.is-visible {
                opacity: 1;
                transform: translate(-50%, 0);
            }

            .toast__icon {
                display: grid;
                place-items: center;
                width: 28px;
                height: 28px;
                flex: none;
                border-radius: 8px;
                background: rgba(245, 158, 11, 0.18);
                color: #fbbf24;
            }

            .toast__icon svg {
                width: 16px;
                height: 16px;
            }

            /* ---------- Responsive ---------- */

            @media (max-width: 960px) {
                .hero__grid {
                    grid-template-columns: 1fr;
                    gap: 44px;
                }

                .hero {
                    padding: 48px 0 60px;
                }

                .cards {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .cta {
                    grid-template-columns: 1fr;
                    padding: 40px 32px;
                }

                .floating--saved {
                    right: 10px;
                    bottom: -18px;
                }
            }

            @media (max-width: 760px) {
                .site-nav {
                    display: none;
                }

                .header-note {
                    display: none;
                }

                .steps {
                    grid-template-columns: 1fr;
                }

                .hero__actions .btn {
                    width: 100%;
                }
            }

            @media (max-width: 600px) {
                .cards {
                    grid-template-columns: 1fr;
                }

                .section {
                    padding: 52px 0;
                }

                .row {
                    grid-template-columns: 1fr auto;
                }

                .row__qty {
                    display: none;
                }

                .site-header__inner {
                    height: 64px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                html {
                    scroll-behavior: auto;
                }

                *,
                *::before,
                *::after {
                    transition-duration: 0.01ms !important;
                    animation-duration: 0.01ms !important;
                }
            }

            /* ---------- Sub pages (data pegawai) ---------- */

            .page {
                padding: 48px 0 88px;
            }

            .page__head {
                display: flex;
                flex-wrap: wrap;
                align-items: flex-end;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 28px;
            }

            .page__title {
                margin: 0 0 8px;
                font-size: clamp(1.75rem, 1.2rem + 1.8vw, 2.5rem);
                letter-spacing: -0.02em;
            }

            .page__lead {
                margin: 0;
                max-width: 56ch;
                color: var(--ink-soft);
                line-height: 1.6;
            }

            .crumbs {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 14px;
                font-size: 0.875rem;
                color: var(--muted);
            }

            .crumbs a {
                color: var(--brand);
                font-weight: 600;
                text-decoration: none;
            }

            .crumbs a:hover {
                text-decoration: underline;
            }

            .card {
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-sm);
                padding: 28px;
            }

            .alert {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                margin-bottom: 22px;
                padding: 14px 18px;
                border-radius: var(--radius-md);
                font-size: 0.9375rem;
                line-height: 1.5;
            }

            .alert--success {
                background: #ecfdf3;
                border: 1px solid #bbf7d0;
                color: #14532d;
            }

            .alert--error {
                background: #fef2f2;
                border: 1px solid #fecaca;
                color: #991b1b;
            }

            .alert ul {
                margin: 6px 0 0;
                padding-left: 18px;
            }

            .form-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px 24px;
            }

            .field {
                display: flex;
                flex-direction: column;
                gap: 7px;
            }

            .field--full {
                grid-column: 1 / -1;
            }

            .field label {
                font-size: 0.875rem;
                font-weight: 600;
                color: var(--ink);
            }

            .field label .optional {
                font-weight: 500;
                color: var(--muted);
            }

            .field input,
            .field textarea {
                width: 100%;
                padding: 12px 14px;
                border: 1px solid rgba(11, 21, 38, 0.16);
                border-radius: 12px;
                background: #fff;
                font-family: inherit;
                font-size: 0.9375rem;
                color: var(--ink);
                transition: border-color 0.16s ease, box-shadow 0.16s ease;
            }

            .field textarea {
                min-height: 110px;
                resize: vertical;
            }

            .field input:focus,
            .field textarea:focus {
                outline: none;
                border-color: var(--brand);
                box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.15);
            }

            .field input.is-invalid,
            .field textarea.is-invalid {
                border-color: #dc2626;
                box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12);
            }

            .field__error {
                margin: 0;
                font-size: 0.8125rem;
                color: #b91c1c;
            }

            .form-actions {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 12px;
                margin-top: 26px;
                padding-top: 22px;
                border-top: 1px solid var(--line);
            }

            .btn--outline {
                background: #fff;
                border-color: rgba(11, 21, 38, 0.16);
                color: var(--ink);
            }

            .btn--outline:hover {
                border-color: rgba(11, 21, 38, 0.3);
                background: #f8fafc;
            }

            .table-wrap {
                overflow-x: auto;
            }

            .data-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 0.9375rem;
            }

            .data-table th,
            .data-table td {
                padding: 14px 16px;
                text-align: left;
                border-bottom: 1px solid var(--line);
                vertical-align: top;
            }

            .data-table th {
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                color: var(--muted);
                background: #f8fafc;
                white-space: nowrap;
            }

            .data-table tbody tr:last-child td {
                border-bottom: none;
            }

            .data-table td strong {
                font-weight: 600;
            }

            .data-table .cell-muted {
                color: var(--muted);
            }

            .chip {
                display: inline-flex;
                align-items: center;
                padding: 4px 10px;
                border-radius: 999px;
                background: rgba(29, 78, 216, 0.1);
                color: var(--brand-strong);
                font-size: 0.75rem;
                font-weight: 600;
                white-space: nowrap;
            }

            .empty-state {
                padding: 44px 24px;
                text-align: center;
                color: var(--muted);
            }

            .empty-state h3 {
                margin: 0 0 8px;
                color: var(--ink);
                font-size: 1.0625rem;
            }

            .empty-state p {
                margin: 0 0 18px;
                font-size: 0.9375rem;
            }

            @media (max-width: 720px) {
                .form-grid {
                    grid-template-columns: minmax(0, 1fr);
                }

                .card {
                    padding: 22px 18px;
                }

                .page {
                    padding: 32px 0 64px;
                }
            }
        </style>
