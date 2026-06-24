<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System - YoRHa</title>

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
                <div class="panel-body" style="padding:15px 25px;">
                    <span class="status-message">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="title-row">
            <h1 class="title"> SYSTEM </h1>
            <span class="title-side">-Unit Diagnostics</span>
        </div>

        <p class="description">
            Internal diagnostics for the active YoRHa unit. Monitor system health,
            resource usage, and recent activity logs.
        </p>

        <div class="row g-4 mb-5">

            <div class="col-lg-6 col-md-12">
                <div class="yorha-panel mb-4">
                    <div class="panel-header"> ■ DIAGNOSTICS </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th> Component </th>
                                <th> Value </th>
                                <th> Status </th>
                            </tr>
                            @foreach ($diagnostics as $diag)
                                <tr>
                                    <td>{{ $diag['label'] }}</td>
                                    <td>{{ $diag['value'] }}</td>
                                    <td>
                                        @php
                                            $tagClass = match($diag['status']) {
                                                'good' => 'tag-good',
                                                'warn' => 'tag-warn',
                                                'bad' => 'tag-bad',
                                                default => '',
                                            };
                                        @endphp
                                        <span class="tag {{ $tagClass }}">
                                            {{ ucfirst($diag['status']) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="yorha-panel">
                    <div class="panel-header"> ■ RESOURCE USAGE </div>
                    <div class="panel-body">
                        @foreach ($resources as $resource)
                            <div class="progress-row">
                                <div class="progress-label">
                                    <span>{{ $resource['label'] }}</span>
                                    <span>{{ $resource['value'] }}%</span>
                                </div>
                                <div class="progress-track">
                                    <div class="progress-fill" style="--bar-width: {{ $resource['value'] }}%;"></div>
                                </div>
                            </div>
                        @endforeach

                        <form method="POST" action="{{ route('system.restart') }}">
                            @csrf
                            <button type="submit" class="yorha-btn"><span> RESTART UNIT </span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="yorha-panel mb-4">
                    <div class="panel-header"> ■ SYSTEM LOG </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th> Time </th>
                                <th> Event </th>
                            </tr>
                            @foreach ($logs as $log)
                                <tr>
                                    <td style="white-space: nowrap;">{{ $log['time'] }}</td>
                                    <td style="text-align:left;">{{ $log['message'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="yorha-panel">
                    <div class="panel-header"> ■ SESSION </div>
                    <div class="panel-body">
                        <p style="margin-bottom: 20px; opacity: .7; letter-spacing: 1px;">
                            Unit {{ session('yorha_unit_id', 'Unknown') }} is currently authenticated.
                            Terminate session to return to title screen.
                        </p>
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit" class="yorha-btn"><span> TERMINATE SESSION </span></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('operations.footer')

</body>

</html>