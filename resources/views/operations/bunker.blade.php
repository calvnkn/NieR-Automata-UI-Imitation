<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunker - NieR: Automata Operations</title>

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

        <div class="row g-4 align-items-start">

            <div class="col-12">

                <div class="title-row">
                    <h1 class="title"> BUNKER </h1>
                    <span class="title-side">-Resistance Headquarters</span>
                </div>

                <p class="description">
                    The Bunker serves as YoRHa's primary command center in orbit above Earth.
                    Below is the current status of all facilities, crew assignments, and
                    resource reserves, along with quick access to other hub sections.
                </p>

                <div class="row g-4 mb-5">
                    @foreach ($quickLinks as $link)
                        <div class="col-lg-4 col-md-6">
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

                <div class="row g-4 mb-5">

                    <div class="col-lg-8 col-md-12">

                        <div class="yorha-panel mb-4">
                            <div class="panel-header"> ■ FACILITY STATUS </div>
                            <table>
                                <tr>
                                    <th style="padding: 18px;"> Facility </th>
                                    <th style="padding: 18px;"> Status </th>
                                    <th style="padding: 18px;"> Integrity </th>
                                </tr>
                                @foreach ($facilities as $facility)
                                    <tr>
                                        <td style="padding: 18px;">
                                            {{ $facility['name'] }}
                                            <div style="font-size:.85rem; opacity:.75; margin-top:4px;">
                                                {{ $facility['description'] }}
                                            </div>
                                        </td>
                                        <td style="padding: 18px;">
                                            @if ($facility['status'] === 'Operational')
                                                <span class="tag tag-good">{{ $facility['status'] }}</span>
                                            @else
                                                <span class="tag tag-warn">{{ $facility['status'] }}</span>
                                            @endif
                                        </td>
                                        <td style="padding: 18px;">
                                            <div class="progress-track">
                                                <div class="progress-fill" style="--bar-width: {{ $facility['integrity'] }}%;"></div>
                                            </div>
                                            <div style="font-size:.85rem; margin-top:4px;">{{ $facility['integrity'] }}%</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="yorha-panel">
                            <div class="panel-header"> ■ CREW ROSTER </div>
                            <table>
                                <tr>
                                    <th style="padding: 18px;"> Unit </th>
                                    <th style="padding: 18px;"> Role </th>
                                    <th style="padding: 18px;"> Level </th>
                                    <th style="padding: 18px;"> Status </th>
                                </tr>
                                @foreach ($crew as $member)
                                    <tr>
                                        <td style="padding: 18px;">{{ $member['name'] }}</td>
                                        <td style="padding: 18px;">{{ $member['role'] }}</td>
                                        <td style="padding: 18px;">Lv. {{ $member['level'] }}</td>
                                        <td style="padding: 18px;">
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

                    <div class="col-lg-4 col-md-12">
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

        </div>

    </div>

    @include('operations.footer')

</body>

</html>