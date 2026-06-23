<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archives - YoRHa</title>

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
            <h1 class="title"> ARCHIVES </h1>
            <span class="title-side">-Records Database</span>
        </div>

        <p class="description">
            Historical records, research logs, and field reports retained by
            the Bunker's data archive. Some entries may require additional
            clearance to view in full.
        </p>

        <div class="yorha-panel">
            <div class="panel-header"> ■ RECORDS </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <th> Title </th>
                        <th> Category </th>
                        <th> Date Logged </th>
                        <th> &nbsp; </th>
                    </tr>
                    @foreach ($entries as $key => $entry)
                        <tr>
                            <td>
                                {{ $entry['title'] }}
                                <div style="font-size:.85rem; opacity:.75; margin-top:4px;">
                                    {{ $entry['summary'] }}
                                </div>
                            </td>
                            <td>
                                @if ($entry['category'] === 'Classified')
                                    <span class="tag tag-bad">{{ $entry['category'] }}</span>
                                @else
                                    <span class="tag">{{ $entry['category'] }}</span>
                                @endif
                            </td>
                            <td>{{ $entry['date'] }}</td>
                            <td>
                                <a href="{{ route('archives.show', $key) }}" class="yorha-btn-link"><span>VIEW</span></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

    @include('operations.footer')
</body>

</html>