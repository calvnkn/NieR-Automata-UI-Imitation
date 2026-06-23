<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operations - YoRHa</title>

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
                            <a href="{{ route('operations.show', $key) }}" class="yorha-btn-link"><span> DETAILS </span></a>
                            <form action="{{ route('operations.deploy', $key) }}" method="POST">
                                @csrf
                                <button type="submit" class="yorha-btn"><span> DEPLOY </span></button>
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

    @include('operations.footer')
</body>

</html>