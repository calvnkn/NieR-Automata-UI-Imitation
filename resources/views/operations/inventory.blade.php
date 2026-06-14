<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - NieR: Automata Operations</title>

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
            <h1 class="title"> INVENTORY </h1>
            <span class="title-side">-Unit Equipment Log</span>
        </div>

        <p class="description">
            Current consumable items and installed plug-in chips. Plug-in chip
            slots are limited by unit OS capacity.
        </p>

        <div class="row g-4">

            <div class="col-lg-6 col-md-12">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ ITEMS </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th> Item </th>
                                <th> Qty </th>
                            </tr>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        {{ $item['name'] }}
                                        <div style="font-size:.85rem; opacity:.75; margin-top:4px;">
                                            {{ $item['description'] }}
                                        </div>
                                    </td>
                                    <td>{{ $item['quantity'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="yorha-panel">
                    <div class="panel-header"> ■ PLUG-IN CHIPS </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th> Chip </th>
                                <th> Slots </th>
                                <th> Status </th>
                            </tr>
                            @foreach ($plugins as $plugin)
                                <tr>
                                    <td>
                                        {{ $plugin['name'] }}
                                        <div style="font-size:.85rem; opacity:.75; margin-top:4px;">
                                            {{ $plugin['description'] }}
                                        </div>
                                    </td>
                                    <td>{{ $plugin['slots'] }}</td>
                                    <td>
                                        @if ($plugin['equipped'])
                                            <span class="tag tag-good">Equipped</span>
                                        @else
                                            <span class="tag">Stored</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>