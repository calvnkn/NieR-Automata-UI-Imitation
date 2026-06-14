<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NieR: Automata Operations</title>

    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --yorha-bg: #d7d1b8;
            --yorha-panel: #c9c2a8;
            --yorha-dark: #575247;
            --yorha-text: #464137;
            --yorha-light: #ece5ca;
            --yorha-border: #c9c2a8;
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

        .yorha-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            border-bottom: 4px solid var(--yorha-dark);
        }

        .access-column {
            max-width: 400px;
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

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
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
            padding: 12px 18px;
            letter-spacing: 2px;
            font-size: 1rem;
        }

        .login-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            height: 42px;
            padding: 8px 12px;
            border: none;
            border-radius: 0;
            background: var(--yorha-light);
            box-shadow: inset 0 0 0 2px rgba(0, 0, 0, .06);
        }

        .form-control:focus {
            background: var(--yorha-light);
            box-shadow:
                inset 0 0 0 2px rgba(0, 0, 0, .12),
                0 0 0 2px rgba(87, 82, 71, .15);
        }

        .login-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .forgot-link {
            color: var(--yorha-dark);
            text-decoration: none;
            font-size: 0.85rem;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .yorha-btn {
            background: var(--yorha-dark);
            color: var(--yorha-light);
            border: none;
            padding: 10px 26px;
            min-width: 100px;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .yorha-btn:hover {
            transform: translate(-3px, -3px);
            box-shadow: 5px 5px 0 rgba(0, 0, 0, .2);
        }

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
        }

        .card-actions form {
            margin: 0;
        }

        .yorha-btn-link {
            background: var(--yorha-dark);
            color: var(--yorha-light);
            border: none;
            padding: 12px 30px;
            cursor: pointer;
            transition: .2s;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .yorha-btn-link:hover {
            transform: translate(-3px, -3px);
            box-shadow: 5px 5px 0 rgba(0, 0, 0, .2);
        }

        .status-message {
            padding: 15px 25px;
            color: #2f5a2f;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .error-list {
            color: #7a2f2f;
            margin-bottom: 15px;
            list-style: none;
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

        @media (max-width: 992px) {
            .yorha-nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
                padding: 25px;
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

            th,
            td {
                padding: 12px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
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

            .login-actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-actions {
                flex-direction: column;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>

    @include('operations.nav')
    <div class="container-fluid py-5 px-5">

        <div class="row g-4 align-items-start">

            <div class="col-lg-3 col-md-12 access-column">

                <div class="yorha-panel">
                    <div class="panel-header"> ■ ACCESS TERMINAL </div>

                    <div class="login-body">

                        @if (session('status'))
                        <p class="status-message">{{ session('status') }}</p>
                        @endif

                        @if ($errors->any())
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('operations.login') }}">
                            @csrf

                            <div class="form-group">
                                <label> YoRHa Unit ID </label>
                                <input type="text" name="unit_id" class="form-control" value="{{ old('unit_id') }}">
                            </div>

                            <div class="form-group">
                                <label> Access Key </label>
                                <input type="password" name="access_key" class="form-control">
                            </div>

                            <div class="login-actions">
                                <button type="submit" class="yorha-btn"> LOGIN </button>
                                <a href="#" class="forgot-link"> Recover Access Key </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-9 col-md-12">

                <div class="title-row">
                    <h1 class="title"> OPERATIONS </h1>
                    <span class="title-side">-YoRHa Deployment Protocols</span>
                </div>

                <p class="description">
                    Command has prepared multiple operational support packages for YoRHa units deployed across Earth. Each package provides
                    different levels of combat assistance, intel support, and Bunker resources. Select the most efficient protocol.
                </p>

                <div class="row g-4 mb-5">

                    @foreach ($operations as $key => $op)
                    <div class="col-lg-4 col-md-6">
                        <div class="operation-card">
                            <div class="card-header"> {{ $op['name'] }} </div>
                            <div class="card-body">
                                <div class="unit-level">{{ $op['level'] }}</div>
                                <ul>
                                    @foreach ($op['capabilities'] as $cap)
                                    <li> {{ $cap }} </li>
                                    @endforeach
                                </ul>
                                <div class="card-actions">
                                    <a href="{{ route('operations.show', $key) }}" class="yorha-btn-link"> DETAILS </a>
                                    <form action="{{ route('operations.deploy', $key) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="yorha-btn"> DEPLOY </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="yorha-panel">
                    <div class="panel-header"> OPERATIONAL COMPARISON </div>

                    <table>
                        <tr>
                            <th> Capability </th>
                            <th> Scanner </th>
                            <th> Battle </th>
                            <th> Execution </th>
                        </tr>
                        <tr>
                            <td> Recon Missions </td>
                            <td> ✓ </td>
                            <td> ✓ </td>
                            <td> ✓ </td>
                        </tr>
                        <tr>
                            <td> Pod Support System </td>
                            <td> — </td>
                            <td> ✓ </td>
                            <td> ✓ </td>
                        </tr>
                        <tr>
                            <td> Priority Intel Access </td>
                            <td> —</td>
                            <td> ✓</td>
                            <td> ✓</td>
                        </tr>
                        <tr>
                            <td> Black Box Clearance </td>
                            <td> — </td>
                            <td> — </td>
                            <td> ✓ </td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>

    </div>

</body>

</html>