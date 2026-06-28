<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mission['name'] }}</title>

    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @include('partials.styles')
</head>

<body>

    @include('partials.nav')

    <div class="container-fluid py-4 px-3 px-md-4 px-lg-5">

        @if (session('status'))
            <div class="yorha-panel mb-4">
                <div class="panel-body" style="padding:15px 25px;">
                    <span class="status-message">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="yorha-panel mb-4">
                <div class="panel-body" style="padding:15px 25px;">
                    <span class="status-message" style="color: var(--yorha-red);">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <div class="title-row">
            <h1 class="title" style="font-size: 3.5rem; letter-spacing: 4px;">{{ $mission['name'] }}</h1>
        </div>

        <div class="row g-3 g-md-4">

            <div class="col-12 col-lg-8">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ MISSION BRIEFING </div>
                    <div class="panel-body">

                        <div style="margin-bottom: 20px;">
                            @php
                                $statusClass = match($mission['status']) {
                                    'Completed'   => 'tag-good',
                                    'Available'   => 'tag-good',
                                    'In Progress' => 'tag-warn',
                                    'Locked'      => 'tag-bad',
                                    default       => '',
                                };
                            @endphp
                            <span class="tag {{ $statusClass }}">{{ $mission['status'] }}</span>
                            <span class="tag">{{ $mission['type'] }}</span>
                            <span class="tag">{{ $mission['difficulty'] }}</span>
                        </div>

                        <p style="margin-bottom: 30px;">{{ $mission['description'] }}</p>

                        <div class="btn-row">
                            @if ($mission['status'] !== 'Completed')
                                <form method="POST" action="{{ route('missions.accept', $key) }}">
                                    @csrf
                                    <button type="submit" class="yorha-btn"><span> ACCEPT MISSION </span></button>
                                </form>
                            @else
                                <span class="yorha-btn" style="opacity:.6; cursor:default;"><span> MISSION COMPLETE </span></span>
                            @endif
                            <a href="{{ route('missions.index') }}" class="yorha-btn-link">
                                <span>&larr; BACK TO LOG</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ OBJECTIVE DATA </div>
                    <div class="panel-body">
                        <div class="status-grid" style="grid-template-columns: 1fr;">
                            <div class="status-box">
                                <div class="label">Location</div>
                                <div class="value" style="font-size: 1.1rem;">{{ $mission['location'] }}</div>
                            </div>
                            <div class="status-box">
                                <div class="label">Reward</div>
                                <div class="value" style="font-size: 1.1rem;">{{ $mission['reward'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('partials.footer')

</body>

</html>