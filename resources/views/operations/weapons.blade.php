<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoRHa - Systems</title>

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
            <h1 class="title"> WEAPONS </h1>
            <span class="title-side">-Armory Catalog</span>
        </div>

        <p class="description">
            Weapon proficiency increases with use, raising attack power and
            unlocking additional combat arts. Equip a weapon to assign it to
            your active loadout.
        </p>

        <div class="row g-4">
            @foreach ($weapons as $key => $weapon)
                <div class="col-lg-4 col-md-6">
                    <div class="operation-card">
                        <div class="card-header"> {{ $weapon['name'] }} </div>
                        <div class="card-body">

                            <div class="unit-level">Lv. {{ $weapon['level'] }}</div>

                            <ul>
                                <li><strong>Type:</strong> {{ $weapon['type'] }}</li>
                                <li><strong>Attack:</strong> {{ $weapon['attack'] }}</li>
                                <li>{{ $weapon['description'] }}</li>
                            </ul>

                            <div class="card-actions">
                                @if ($weapon['equipped'])
                                    {{-- Same padding as yorha-btn so height matches --}}
                                    <span class="tag tag-good"
                                          style="padding: 12px 30px; font-size: 1rem; letter-spacing: 1px;">
                                        EQUIPPED
                                    </span>
                                @else
                                    <form action="{{ route('weapons.equip', $key) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="yorha-btn"> EQUIP </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>

</html>