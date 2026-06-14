<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $operation['name'] }} - NieR: Automata Operations</title>

    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @include('operations.styles')
</head>

<body>

    @include('operations.nav')
    <div class="container-fluid py-5 px-5">

        @if (session('status'))
            <div class="yorha-panel mb-4">
                <div class="panel-body">
                    <span class="status-message">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="title-row">
            <h1 class="title" style="font-size: 3.5rem; letter-spacing: 6px;">{{ $operation['name'] }}</h1>
        </div>

        <div class="row g-4">

            <div class="col-lg-8 col-md-12">

                <div class="yorha-panel mb-4">
                    <div class="panel-header"> ■ PROTOCOL DETAILS </div>
                    <div class="panel-body">
                        <div class="unit-level">{{ $operation['level'] }}</div>
                        <p style="margin-bottom: 30px;">{{ $operation['description'] }}</p>

                        <h3 class="section-label">CAPABILITIES</h3>
                        <ul>
                            @foreach ($operation['capabilities'] as $cap)
                                <li>{{ $cap }}</li>
                            @endforeach
                        </ul>

                        <div class="btn-row">
                            <form method="POST" action="{{ route('operations.deploy', $key) }}">
                                @csrf
                                <button type="submit" class="yorha-btn"> DEPLOY THIS UNIT </button>
                            </form>
                            <a href="{{ route('operations.index') }}" class="yorha-btn-link"> &larr; BACK </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-12">

                <div class="yorha-panel">
                    <div class="panel-header"> ■ CLEARANCE STATUS </div>
                    <div class="panel-body">
                        <div class="status-grid" style="grid-template-columns: 1fr;">

                            <div class="status-box">
                                <div class="label">Pod Support</div>
                                <div class="value {{ $operation['pod_support'] ? 'status-yes' : 'status-no' }}">
                                    {{ $operation['pod_support'] ? 'ENABLED' : 'LOCKED' }}
                                </div>
                            </div>

                            <div class="status-box">
                                <div class="label">Priority Intel</div>
                                <div class="value {{ $operation['priority_intel'] ? 'status-yes' : 'status-no' }}">
                                    {{ $operation['priority_intel'] ? 'ENABLED' : 'LOCKED' }}
                                </div>
                            </div>

                            <div class="status-box">
                                <div class="label">Black Box Clearance</div>
                                <div class="value {{ $operation['black_box'] ? 'status-yes' : 'status-no' }}">
                                    {{ $operation['black_box'] ? 'ENABLED' : 'LOCKED' }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>