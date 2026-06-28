<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunker - YoRHa</title>

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

        <div class="title-row">
            <h1 class="title"> BUNKER </h1>
            <span class="title-side">-Resistance Headquarters</span>
        </div>

        <p class="description">
            The Bunker serves as YoRHa's primary command center in orbit above Earth.
            Below is the current status of all facilities, crew assignments, and
            resource reserves, along with quick access to other hub sections.
        </p>

        {{-- Quick links grid: 3 cols on lg, 2 on md, 1 on sm --}}
        <div class="row g-3 g-md-4 mb-4 mb-md-5">
            @foreach ($quickLinks as $link)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="operation-card">
                        <div class="card-header"> {{ strtoupper($link['label']) }} </div>
                        <div class="card-body">
                            <p style="margin-bottom: 24px;">{{ $link['description'] }}</p>
                            <div class="card-actions">
                                <a href="{{ route($link['route']) }}" class="yorha-btn-link"><span> OPEN </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-3 g-md-4 mb-4 mb-md-5">

            {{-- Tables: full width on md and below, 8 cols on lg --}}
            <div class="col-12 col-lg-8">

                <div class="yorha-panel mb-3 mb-md-4">
                    <div class="panel-header"> ■ FACILITY STATUS </div>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th> Facility </th>
                                <th> Status </th>
                                <th> Integrity </th>
                            </tr>
                            @foreach ($facilities as $facility)
                                <tr>
                                    <td>
                                        {{ $facility['name'] }}
                                        <div style="font-size:.85rem; opacity:.75; margin-top:4px;">
                                            {{ $facility['description'] }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($facility['status'] === 'Operational')
                                            <span class="tag tag-good">{{ $facility['status'] }}</span>
                                        @else
                                            <span class="tag tag-warn">{{ $facility['status'] }}</span>
                                        @endif
                                    </td>
                                    <td style="min-width: 120px;">
                                        <div class="progress-track">
                                            <div class="progress-fill" style="--bar-width: {{ $facility['integrity'] }}%;"></div>
                                        </div>
                                        <div style="font-size:.85rem; margin-top:4px;">{{ $facility['integrity'] }}%</div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="yorha-panel">
                    <div class="panel-header"> ■ CREW ROSTER </div>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th> Unit </th>
                                <th> Role </th>
                                <th> Level </th>
                                <th> Status </th>
                            </tr>
                            @foreach ($crew as $member)
                                <tr>
                                    <td>{{ $member['name'] }}</td>
                                    <td>{{ $member['role'] }}</td>
                                    <td>Lv. {{ $member['level'] }}</td>
                                    <td>
                                        @php
                                            $tagClass = match($member['status']) {
                                                'On Duty', 'On Standby' => 'tag-good',
                                                'Deployed'              => 'tag-warn',
                                                default                 => 'tag-bad',
                                            };
                                        @endphp
                                        <span class="tag {{ $tagClass }}">{{ $member['status'] }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>

            {{-- Resources: full width on md and below, 4 cols on lg --}}
            <div class="col-12 col-lg-4">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ RESOURCE RESERVES </div>
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
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('partials.footer')

</body>

</html>