<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $entry['title'] }}</title>

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

        <div class="title-row">
            <h1 class="title" style="font-size: 3.5rem; letter-spacing: 4px;">{{ $entry['title'] }}</h1>
        </div>

        <div class="row g-4">

            <div class="col-lg-8 col-md-12">
                <div class="yorha-panel mb-4">
                    <div class="panel-header"> ■ RECORD DETAILS </div>
                    <div class="panel-body">

                        @if ($entry['category'] === 'Classified')
                            <p style="margin-bottom: 20px; color: var(--yorha-red);">
                                ACCESS DENIED. This record requires Execution Unit clearance or higher.
                                Summary available below; full contents withheld.
                            </p>
                        @endif

                        <p style="margin-bottom: 30px;">{{ $entry['summary'] }}</p>

                        <a href="{{ route('archives.index') }}" class="yorha-btn-link"><span>&larr; BACK TO RECORDS</span></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ RECORD METADATA </div>
                    <div class="panel-body">
                        <div class="status-grid" style="grid-template-columns: 1fr;">
                            <div class="status-box">
                                <div class="label">Category</div>
                                <div class="value" style="font-size: 1rem; margin-top: 8px;">
                                    @if ($entry['category'] === 'Classified')
                                        <span class="tag tag-bad">{{ $entry['category'] }}</span>
                                    @else
                                        <span class="tag">{{ $entry['category'] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="status-box">
                                <div class="label">Date Logged</div>
                                <div class="value" style="font-size: 1rem;">{{ $entry['date'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>