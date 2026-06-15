<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoRHa - Missions</title>

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
            <h1 class="title"> MISSIONS </h1>
            <span class="title-side">-Active Mission Log</span>
        </div>

        <p class="description">
            Available missions are sourced from Bunker command and field resistance camps.
            Complete missions to earn rewards and unlock further operations.
        </p>

        <div class="row g-4">
            @foreach ($missions as $key => $mission)
                <div class="col-lg-4 col-md-6">
                    <div class="operation-card">
                        <div class="card-header"> {{ $mission['name'] }} </div>
                        <div class="card-body">

                            <div style="margin-bottom: 18px;">
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

                            <ul>
                                <li><strong>Location:</strong> {{ $mission['location'] }}</li>
                                <li><strong>Reward:</strong> {{ $mission['reward'] }}</li>
                            </ul>

                            <div class="card-actions">
                                <a href="{{ route('missions.show', $key) }}" class="yorha-btn-link"> DETAILS </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>

</html>