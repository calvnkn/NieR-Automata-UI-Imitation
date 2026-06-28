<style>
    :root {
        --yorha-bg: #d7d1b8;
        --yorha-panel: #c9c2a8;
        --yorha-dark: #575247;
        --yorha-text: #464137;
        --yorha-light: #ece5ca;
        --yorha-border: #c9c2a8;
        --yorha-green: #2f5a2f;
        --yorha-red: #7a2f2f;
        --yorha-amber: #8a6d1f;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: var(--yorha-bg);
        color: var(--yorha-text);
        font-family: Arial, Helvetica, sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
        box-shadow: inset 0 0 150px rgba(70, 65, 55, .4),
                    inset 0 0 150px rgba(70, 65, 55, .3);
    }

    body::before {
        content: "";
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: -5;
        background:
            repeating-linear-gradient(to right,
                rgba(70, 65, 55, .045) 0px,
                rgba(70, 65, 55, .045) 1px,
                transparent 1px,
                transparent 4px),
            repeating-linear-gradient(to bottom,
                rgba(70, 65, 55, .045) 0px,
                rgba(70, 65, 55, .045) 1px,
                transparent 1px,
                transparent 4px);
    }

    /* ---------- NAV ---------- */
    .yorha-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 40px;
        position: relative;
    }

    .brand {
        display: flex;
        align-items: center;
    }

    .brand img {
        height: 55px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    /* hamburger button — hidden on desktop */
    .nav-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 6px;
        z-index: 10;
    }

    .nav-toggle span {
        display: block;
        width: 26px;
        height: 2px;
        background: var(--yorha-dark);
        transition: .3s;
        transform-origin: center;
    }

    /* X shape when open */
    .nav-toggle-open span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }

    .nav-toggle-open span:nth-child(2) {
        opacity: 0;
    }

    .nav-toggle-open span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }

    .nav-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
    }

    .nav-links a {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px 12px 18px;
        min-width: 150px;
        background: rgba(87, 82, 71, 0.12);
        color: var(--yorha-text);
        text-decoration: none;
        font-size: 1rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-left: 4px solid rgba(87, 82, 71, 0.35);
        overflow: hidden;
        transition: .2s;
    }

    .nav-links a::before {
        content: "◈";
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .nav-links a::after {
        content: "";
        position: absolute;
        top: 0;
        right: -18px;
        width: 40px;
        height: 100%;
        background: inherit;
        transform: skewX(-35deg);
        border-right: 4px solid rgba(87, 82, 71, 0.2);
    }

    .nav-links a:hover {
        background: rgba(87, 82, 71, 0.22);
    }

    .nav-links a.active {
        background: var(--yorha-dark);
        color: var(--yorha-light);
        border-left: 4px solid var(--yorha-light);
    }

    .nav-links a.active::after {
        background: var(--yorha-dark);
    }

    /* ---------- PANELS ---------- */
    .yorha-panel {
        background: var(--yorha-panel);
        border: 4px solid var(--yorha-border);
        box-shadow: 8px 8px 0 rgba(0, 0, 0, .15);
        align-self: start;
        height: auto;
    }

    .row {
        align-items: flex-start;
    }

    .panel-header {
        background: var(--yorha-dark);
        color: var(--yorha-light);
        padding: 15px 20px;
        font-size: 1.1rem;
        letter-spacing: 2px;
    }

    .panel-body {
        padding: 30px;
    }

    /* ---------- FORMS ---------- */
    .access-column {
        max-width: 400px;
    }

    .login-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 3px solid var(--yorha-border);
        background: var(--yorha-light);
        outline: none;
    }

    .login-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-top: 10px;
    }

    .forgot-link {
        color: var(--yorha-dark);
        text-decoration: none;
        font-size: .9rem;
        transition: .2s;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }

    /* ---------- BUTTONS ---------- */
    .yorha-btn {
        background: transparent;
        color: var(--yorha-dark);
        border: 1px solid transparent;
        border-left: none;
        border-right: none;
        padding: .4rem 1rem;
        cursor: pointer;
        letter-spacing: 1px;
        position: relative;
        transition: color .2s, border-color .2s;
        display: inline-block;
        box-sizing: content-box;
        overflow: hidden;
    }

    .yorha-btn::before {
        content: "";
        position: absolute;
        left: 0; top: 3px; bottom: 3px;
        width: 100%;
        background-color: #9d9785;
        transition: background-color .2s;
        z-index: 0;
    }

    .yorha-btn:hover {
        color: var(--yorha-light);
        border-color: var(--yorha-dark);
    }

    .yorha-btn:hover::before {
        background-color: var(--yorha-dark);
    }

    .yorha-btn-link {
        background: transparent;
        color: var(--yorha-dark);
        border: 1px solid transparent;
        border-left: none;
        border-right: none;
        padding: .4rem 1rem;
        cursor: pointer;
        letter-spacing: 1px;
        text-decoration: none;
        display: inline-block;
        position: relative;
        transition: color .2s, border-color .2s;
        box-sizing: content-box;
        overflow: hidden;
    }

    .yorha-btn-link::before {
        content: "";
        position: absolute;
        left: 0; top: 3px; bottom: 3px;
        width: 100%;
        background-color: #9d9785;
        transition: background-color .2s;
        z-index: 0;
    }

    .yorha-btn-link:hover {
        color: var(--yorha-light);
        border-color: var(--yorha-dark);
    }

    .yorha-btn-link:hover::before {
        background-color: var(--yorha-dark);
    }

    /* span sits above ::before */
    .yorha-btn > span,
    .yorha-btn-link > span {
        position: relative;
        z-index: 1;
    }

    .yorha-btn-outline {
        background: transparent;
        color: var(--yorha-dark);
        border: 3px solid var(--yorha-dark);
        padding: 9px 27px;
        cursor: pointer;
        transition: .2s;
        font-weight: bold;
        letter-spacing: 1px;
        text-decoration: none;
        display: inline-block;
    }

    .yorha-btn-outline:hover {
        background: var(--yorha-dark);
        color: var(--yorha-light);
    }

    /* ---------- TITLES ---------- */
    .title-row {
        display: flex;
        align-items: flex-end;
        gap: 18px;
        margin-bottom: 20px;
    }

    .title {
        font-size: 5rem;
        letter-spacing: 8px;
        margin-bottom: 0;
        line-height: 1;
        text-shadow: 8px 8px 0 rgba(0, 0, 0, .15);
    }

    .title-side {
        font-size: 2rem;
        letter-spacing: 4px;
        margin-bottom: 10px;
        color: rgba(70, 65, 55, 1);
        white-space: nowrap;
    }

    .description {
        font-size: 1.1rem;
        margin-bottom: 40px;
        max-width: 700px;
    }

    /* ---------- CARDS ---------- */
    .operation-card {
        background: var(--yorha-panel);
        border: 4px solid var(--yorha-border);
        box-shadow: 8px 8px 0 rgba(0, 0, 0, .15);
        transition: .25s;
        overflow: hidden;
        height: 100%;
    }

    .operation-card:hover {
        transform: translate(-6px, -6px);
        box-shadow: 14px 14px 0 rgba(0, 0, 0, .2);
    }

    .card-header {
        background: var(--yorha-dark);
        color: var(--yorha-light);
        padding: 15px 20px;
        font-size: 1.1rem;
        letter-spacing: 2px;
    }

    .card-body {
        padding: 30px;
    }

    .unit-level {
        font-size: 4rem;
        margin-bottom: 20px;
        color: var(--yorha-dark);
    }

    .operation-card ul {
        list-style: none;
        margin-bottom: 30px;
    }

    .operation-card li {
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, .15);
    }

    .operation-card li:last-child {
        border-bottom: none;
    }

    .card-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .card-actions form {
        margin: 0;
    }

    .btn-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-row form {
        margin: 0;
    }

    /* ---------- STATUS / MESSAGES ---------- */
    .status-message {
        padding: 15px 25px;
        color: var(--yorha-green);
        font-weight: bold;
        letter-spacing: 1px;
    }

    .error-list {
        color: var(--yorha-red);
        margin-bottom: 15px;
        list-style: none;
    }

    .status-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin: 20px 0 30px;
    }

    .status-box {
        border: 2px solid var(--yorha-border);
        padding: 15px;
        text-align: center;
        background: var(--yorha-light);
    }

    .status-box .label {
        font-size: .85rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .status-box .value {
        font-size: 1.4rem;
        font-weight: bold;
    }

    .status-yes,
    .status-good {
        color: var(--yorha-green);
    }

    .status-no,
    .status-bad {
        color: var(--yorha-red);
    }

    .status-warn {
        color: var(--yorha-amber);
    }

    /* ---------- TABLES ---------- */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 18px;
        border-bottom: 1px solid rgba(0, 0, 0, .2);
        text-align: center;
    }

    th:first-child,
    td:first-child {
        text-align: left;
    }

    /* ---------- PROGRESS BARS ---------- */
    .progress-track {
        width: 100%;
        height: 18px;
        background: var(--yorha-light);
        border: 2px solid var(--yorha-border);
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: var(--yorha-dark);
        width: var(--bar-width, 0%);
    }

    .progress-row {
        margin-bottom: 18px;
    }

    .progress-row .progress-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 6px;
        font-size: .95rem;
        letter-spacing: 1px;
    }

    /* ---------- BADGES / TAGS ---------- */
    .tag {
        display: inline-block;
        padding: 4px 12px;
        font-size: .8rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        border: 2px solid var(--yorha-dark);
        background: var(--yorha-light);
    }

    .tag-good {
        border-color: var(--yorha-green);
        color: var(--yorha-green);
    }

    .tag-bad {
        border-color: var(--yorha-red);
        color: var(--yorha-red);
    }

    .tag-warn {
        border-color: var(--yorha-amber);
        color: var(--yorha-amber);
    }

    /* ---------- PATTERN DIVIDER ---------- */
    .pattern {
        border-top: 2px solid var(--yorha-dark);
    }

    .pattern-inner {
        height: 40px;
        background-size: 50px 3px,
            50px 1px, 50px 1px, 50px 1px, 50px 1px,
            50px 1px, 50px 1px, 50px 1px, 50px 1px;
        background-position: 0 0,
            22px 4px, 22px 5px, 22px 6px, 22px 7px,
            28px 12px, 28px 13px, 28px 14px, 28px 15px;
        background-image:
            linear-gradient(90deg, var(--yorha-dark), var(--yorha-dark) 10px, transparent 10px),
            linear-gradient(90deg,
                rgba(70,65,55,.4), rgba(70,65,55,.4) 1px,
                rgba(70,65,55,.8) 1px, rgba(70,65,55,.8) 2px,
                rgba(70,65,55,.9) 2px, rgba(70,65,55,.9) 3px,
                rgba(70,65,55,.4) 3px, rgba(70,65,55,.4) 4px,
                transparent 4px, transparent 12px,
                rgba(70,65,55,.4) 12px, rgba(70,65,55,.4) 13px,
                rgba(70,65,55,.8) 13px, rgba(70,65,55,.8) 14px,
                rgba(70,65,55,.9) 14px, rgba(70,65,55,.9) 15px,
                rgba(70,65,55,.4) 15px, rgba(70,65,55,.4) 16px,
                transparent 16px),
            linear-gradient(90deg,
                rgba(70,65,55,.9), rgba(70,65,55,.9) 1px,
                rgba(70,65,55,1) 1px, rgba(70,65,55,1) 3px,
                rgba(70,65,55,.9) 3px, rgba(70,65,55,.9) 4px,
                transparent 4px, transparent 12px,
                rgba(70,65,55,.9) 12px, rgba(70,65,55,.9) 13px,
                rgba(70,65,55,1) 13px, rgba(70,65,55,1) 15px,
                rgba(70,65,55,.9) 15px, rgba(70,65,55,.9) 16px,
                transparent 16px),
            linear-gradient(90deg,
                rgba(70,65,55,.9), rgba(70,65,55,.9) 1px,
                rgba(70,65,55,1) 1px, rgba(70,65,55,1) 3px,
                rgba(70,65,55,.9) 3px, rgba(70,65,55,.9) 4px,
                transparent 4px, transparent 12px,
                rgba(70,65,55,.9) 12px, rgba(70,65,55,.9) 13px,
                rgba(70,65,55,1) 13px, rgba(70,65,55,1) 15px,
                rgba(70,65,55,.9) 15px, rgba(70,65,55,.9) 16px,
                transparent 16px),
            linear-gradient(90deg,
                rgba(70,65,55,.4), rgba(70,65,55,.4) 1px,
                rgba(70,65,55,.8) 1px, rgba(70,65,55,.8) 2px,
                rgba(70,65,55,.9) 2px, rgba(70,65,55,.9) 3px,
                rgba(70,65,55,.4) 3px, rgba(70,65,55,.4) 4px,
                transparent 4px, transparent 12px,
                rgba(70,65,55,.4) 12px, rgba(70,65,55,.4) 13px,
                rgba(70,65,55,.8) 13px, rgba(70,65,55,.8) 14px,
                rgba(70,65,55,.9) 14px, rgba(70,65,55,.9) 15px,
                rgba(70,65,55,.4) 15px, rgba(70,65,55,.4) 16px,
                transparent 16px),
            linear-gradient(90deg,
                rgba(70,65,55,.4), rgba(70,65,55,.4) 1px,
                rgba(70,65,55,.8) 1px, rgba(70,65,55,.8) 2px,
                rgba(70,65,55,.9) 2px, rgba(70,65,55,.9) 3px,
                rgba(70,65,55,.4) 3px, rgba(70,65,55,.4) 4px,
                transparent 4px),
            linear-gradient(90deg,
                rgba(70,65,55,.9), rgba(70,65,55,.9) 1px,
                rgba(70,65,55,1) 1px, rgba(70,65,55,1) 3px,
                rgba(70,65,55,.9) 3px, rgba(70,65,55,.9) 4px,
                transparent 4px),
            linear-gradient(90deg,
                rgba(70,65,55,.9), rgba(70,65,55,.9) 1px,
                rgba(70,65,55,1) 1px, rgba(70,65,55,1) 3px,
                rgba(70,65,55,.9) 3px, rgba(70,65,55,.9) 4px,
                transparent 4px),
            linear-gradient(90deg,
                rgba(70,65,55,.4), rgba(70,65,55,.4) 1px,
                rgba(70,65,55,.8) 1px, rgba(70,65,55,.8) 2px,
                rgba(70,65,55,.9) 2px, rgba(70,65,55,.9) 3px,
                rgba(70,65,55,.4) 3px, rgba(70,65,55,.4) 4px,
                transparent 4px);
        background-repeat: repeat-x;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 992px) {

        /* show hamburger button */
        .nav-toggle {
            display: flex;
        }

        /* hide links by default on mobile */
        .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--yorha-bg);
            flex-direction: column;
            gap: 0;
            z-index: 100;
            border-bottom: 2px solid var(--yorha-dark);
        }

        /* show links when toggled open */
        .nav-links.nav-open {
            display: flex;
        }

        .nav-links a {
            width: 100%;
            min-width: unset;
            border-left: none;
            border-bottom: 1px solid rgba(87, 82, 71, .15);
            padding: 14px 24px;
        }

        .nav-links a::after {
            display: none;
        }

        .title-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .title {
            font-size: 3rem;
            letter-spacing: 4px;
            line-height: 1.1;
        }

        .title-side {
            font-size: 1.2rem;
            letter-spacing: 2px;
            white-space: normal;
        }

        .unit-level {
            font-size: 2.5rem;
        }

        .status-grid {
            grid-template-columns: 1fr;
        }

        th,
        td {
            padding: 12px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .yorha-nav {
            padding: 18px 20px;
        }

        .container-fluid {
            padding-left: 20px;
            padding-right: 20px;
        }

        .title {
            font-size: 2.2rem;
            letter-spacing: 2px;
        }

        .title-side {
            font-size: 1rem;
        }

        .panel-header,
        .card-header {
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .unit-level {
            font-size: 2rem;
        }

        .login-actions,
        .btn-row,
        .card-actions {
            flex-direction: column;
            align-items: flex-start;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>