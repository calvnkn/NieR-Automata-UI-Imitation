<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NieR:Automata</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('YORHA_clear.svg') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0a0a0a;
            color: #c8c2aa;
            font-family: 'Share Tech Mono', monospace;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            cursor: default;
            user-select: none;
        }

        /* =====================
           SHARED
        ===================== */
        .screen {
            position: fixed;
            inset: 0;
            display: flex;
            flex-direction: column;
            opacity: 0;
            pointer-events: none;
            transition: opacity .8s ease;
        }

        .screen.active {
            opacity: 1;
            pointer-events: all;
        }

        .screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        /* =====================
           SCREEN 1: LOADING
        ===================== */
        #screen-loading {
            background: #0d0d0d;
            background-image:
                linear-gradient(rgba(200,194,170,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,194,170,.025) 1px, transparent 1px);
            background-size: 4px 4px;
        }

        .loading-top {
            padding: 28px 36px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .loading-label {
            font-size: .95rem;
            letter-spacing: .35rem;
            text-transform: uppercase;
            color: #c8c2aa;
        }

        .loading-label span {
            color: #e05555;
            margin-right: 4px;
        }

        .loading-sub {
            font-size: .75rem;
            letter-spacing: .2rem;
            color: rgba(200,194,170,.5);
            text-transform: uppercase;
        }

        .loading-center {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20px;
        }

        .yorha-watermark {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            opacity: .12;
        }

        .yorha-watermark-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        .yorha-watermark-text {
            font-size: 2.2rem;
            letter-spacing: .6rem;
            color: #c8c2aa;
        }

        .yorha-watermark-sub {
            font-size: .7rem;
            letter-spacing: .25rem;
            color: #c8c2aa;
            font-style: italic;
        }

        .loading-bottom {
            padding: 28px 36px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .loading-spinner {
            width: 22px;
            height: 22px;
            border: 2px solid rgba(200,194,170,.15);
            border-top-color: rgba(200,194,170,.6);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-bar-wrap {
            width: 200px;
            height: 2px;
            background: rgba(200,194,170,.15);
            overflow: hidden;
        }

        .loading-bar-fill {
            height: 100%;
            background: rgba(200,194,170,.7);
            width: 0%;
            animation: loadfill 3s ease forwards;
        }

        @keyframes loadfill {
            0%   { width: 0%; }
            30%  { width: 35%; }
            60%  { width: 68%; }
            85%  { width: 89%; }
            100% { width: 100%; }
        }

        /* =====================
           SCREEN 2: TRANSITION
        ===================== */
        #screen-transition {
            background: #080808;
            background-image:
                linear-gradient(rgba(200,194,170,.018) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,194,170,.018) 1px, transparent 1px);
            background-size: 3px 3px;
            align-items: center;
            justify-content: center;
        }

        .transition-lines {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .transition-line {
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(200,194,170,.12);
        }

        .transition-line:nth-child(1) { top: 42%; }
        .transition-line:nth-child(2) { top: 44%; }
        .transition-line:nth-child(3) { top: 56%; }
        .transition-line:nth-child(4) { top: 58%; }

        .transition-title {
            font-size: 1.1rem;
            letter-spacing: .9rem;
            text-transform: uppercase;
            color: #c8c2aa;
            text-align: center;
            position: relative;
            animation: glitch-in 1.2s ease forwards;
        }

        .transition-title .ch-r { color: #e05555; position: absolute; left: 0; right: 0; animation: glitch-r .15s steps(1) infinite; }
        .transition-title .ch-b { color: #5599e0; position: absolute; left: 0; right: 0; animation: glitch-b .2s steps(1) infinite; }

        @keyframes glitch-in {
            0%   { opacity: 0; transform: translateX(-6px); }
            20%  { opacity: 1; }
            100% { opacity: 1; transform: translateX(0); }
        }

        @keyframes glitch-r {
            0%   { clip-path: inset(30% 0 50% 0); transform: translateX(3px); opacity: .7; }
            50%  { clip-path: inset(60% 0 20% 0); transform: translateX(-2px); opacity: .5; }
            100% { clip-path: inset(10% 0 70% 0); transform: translateX(2px); opacity: .6; }
        }

        @keyframes glitch-b {
            0%   { clip-path: inset(50% 0 30% 0); transform: translateX(-3px); opacity: .5; }
            50%  { clip-path: inset(20% 0 60% 0); transform: translateX(2px); opacity: .7; }
            100% { clip-path: inset(70% 0 10% 0); transform: translateX(-2px); opacity: .4; }
        }

        /* =====================
           SCREEN 3: TITLE
        ===================== */
        #screen-title {
            background: #1a1610;
            background-image: url('{{ asset('Nier-Title-Screen-No-Text.png') }}');
            background-size: cover;
            background-position: center;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
        }

        #screen-title::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(10, 8, 5, .35);
        }

        .title-logo {
            position: relative;
            z-index: 1;
            margin-top: 12vh;
            text-align: center;
        }

        .title-logo img {
            height: 110px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 24px rgba(0,0,0,.7));
            animation: logo-fade 1.2s ease forwards;
            opacity: 0;
        }

        @keyframes logo-fade {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .title-menu {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            margin-bottom: 18vh;
            animation: menu-fade 1s ease .4s forwards;
            opacity: 0;
        }

        @keyframes menu-fade {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .title-menu-item {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0;
            width: 280px;
            justify-content: center;
        }

        .title-menu-item a,
        .title-menu-item button {
            display: block;
            width: 100%;
            text-align: center;
            color: #c8c2aa;
            text-decoration: none;
            font-family: 'Share Tech Mono', monospace;
            font-size: 1.05rem;
            letter-spacing: .25rem;
            text-transform: uppercase;
            padding: 10px 0;
            background: transparent;
            border: none;
            cursor: pointer;
            position: relative;
            transition: color .2s;
        }

        .title-menu-item::before,
        .title-menu-item::after {
            content: "";
            position: absolute;
            top: 50%;
            height: 1px;
            width: 0;
            background: rgba(200,194,170,.6);
            transition: width .3s ease;
        }

        .title-menu-item::before { right: 100%; }
        .title-menu-item::after  { left: 100%; }

        .title-menu-item:hover::before,
        .title-menu-item:hover::after {
            width: 60px;
        }

        .title-menu-item:hover a,
        .title-menu-item:hover button {
            color: #fff;
        }

        /* small dot endpoints on the lines */
        .title-menu-item:hover::before {
            box-shadow: -4px 0 0 0 rgba(200,194,170,.6);
        }

        .title-menu-item:hover::after {
            box-shadow: 4px 0 0 0 rgba(200,194,170,.6);
        }

        .title-copyright {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: .65rem;
            letter-spacing: .15rem;
            color: rgba(200,194,170,.4);
            z-index: 1;
        }
    </style>
</head>

<body>

    <div class="screen active" id="screen-loading">

        <div class="loading-top">
            <div>
                <div class="loading-label"><span>L</span>OADING</div>
                <div class="loading-sub">— Booting System.</div>
            </div>
        </div>

        <div class="loading-center">
            <div class="yorha-watermark">
                <img class="yorha-watermark-logo" src="{{ asset('YORHA_clear.svg') }}" alt="YoRHa">
                <div class="yorha-watermark-text">YoRHa</div>
                <div class="yorha-watermark-sub">For the Glory of Mankind</div>
            </div>
        </div>

        <div class="loading-bottom">
            <div class="loading-bar-wrap">
                <div class="loading-bar-fill"></div>
            </div>
            <div class="loading-spinner"></div>
        </div>

    </div>

    <div class="screen" id="screen-transition">

        <div class="transition-lines">
            <div class="transition-line"></div>
            <div class="transition-line"></div>
            <div class="transition-line"></div>
            <div class="transition-line"></div>
        </div>

        <div class="transition-title">
            <span class="ch-r" aria-hidden="true">N i e R : A u t o m a t a</span>
            <span class="ch-b" aria-hidden="true">N i e R : A u t o m a t a</span>
            N i e R : A u t o m a t a
        </div>

    </div>

    <div class="screen" id="screen-title">

        <div class="title-logo">
            <img src="{{ asset('pngegg.png') }}" alt="NieR:Automata YoRHa Operations">
        </div>

        <nav class="title-menu">
            <div class="title-menu-item">
                <a href="{{ route('auth.login') }}">Login</a>
            </div>
            <div class="title-menu-item">
                <a href="{{ route('auth.register') }}">Register</a>
            </div>
        </nav>

        <div class="title-copyright">
            © 2017 SQUARE ENIX CO., LTD. All Rights Reserved. | Fan-made project, not affiliated with Square Enix or PlatinumGames.
        </div>

    </div>

    <script>
        const loading    = document.getElementById('screen-loading');
        const transition = document.getElementById('screen-transition');
        const title      = document.getElementById('screen-title');

        function switchTo(from, to, delay) {
            setTimeout(() => {
                from.classList.add('fade-out');
                from.classList.remove('active');
                setTimeout(() => {
                    from.style.display = 'none';
                    to.classList.add('active');
                }, 800);
            }, delay);
        }

        // Loading → Transition after 3.5s
        switchTo(loading, transition, 3500);

        // Transition → Title after 3.5s + 2.5s
        switchTo(transition, title, 6000);
    </script>

</body>

</html>