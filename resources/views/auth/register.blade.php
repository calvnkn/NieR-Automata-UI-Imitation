<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Registration</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('YORHA_clear.svg') }}">

    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])

    @include('partials.styles')
</head>

<body>

    @include('partials.nav-auth')

    <div class="container-fluid py-5 px-5">

        <div class="row justify-content-center" style="min-height: 100vh; align-items: center;">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div style="text-align: center; margin-bottom: 40px;">
                    <img src="{{ asset('pngegg.png') }}" alt="YoRHa" style="height: 60px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;">
                    <div class="title" style="font-size: 2.5rem; letter-spacing: 6px;">UNIT REGISTRATION</div>
                    <div style="letter-spacing: 3px; opacity: .6; margin-top: 8px; font-size: .85rem;">New YoRHa Unit Initialization</div>
                </div>

                @if ($errors->any())
                    <div class="yorha-panel mb-4">
                        <div class="panel-body" style="padding: 15px 20px;">
                            <ul class="error-list" style="margin: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="yorha-panel">
                    <div class="panel-header"> ■ UNIT INITIALIZATION </div>
                    <div class="panel-body">

                        <form method="POST" action="{{ route('auth.register.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label>YoRHa Unit ID</label>
                                <input type="text" name="unit_id" class="form-control"
                                    value="{{ old('unit_id') }}" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Unit Type</label>
                                <select name="unit_type" class="form-control">
                                    <option value="" disabled {{ old('unit_type') ? '' : 'selected' }}>— Select Unit Type —</option>
                                    <option value="scanner"    {{ old('unit_type') == 'scanner'    ? 'selected' : '' }}>Scanner Model</option>
                                    <option value="battle"     {{ old('unit_type') == 'battle'     ? 'selected' : '' }}>Battle Unit</option>
                                    <option value="operator"   {{ old('unit_type') == 'operator'   ? 'selected' : '' }}>Operator Unit</option>
                                    <option value="resistance" {{ old('unit_type') == 'resistance' ? 'selected' : '' }}>Resistance Support</option>
                                    <option value="execution"  {{ old('unit_type') == 'execution'  ? 'selected' : '' }}>Execution Unit</option>
                                    <option value="commander"  {{ old('unit_type') == 'commander'  ? 'selected' : '' }}>Commander Unit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Access Key</label>
                                <input type="password" name="access_key" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Confirm Access Key</label>
                                <input type="password" name="access_key_confirmation" class="form-control">
                            </div>

                            <div class="btn-row" style="justify-content: space-between; align-items: center;">
                                <button type="submit" class="yorha-btn"><span>INITIALIZE UNIT</span></button>
                                <a href="{{ route('landing') }}" class="forgot-link">← Return to Title</a>
                            </div>
                        </form>

                    </div>
                </div>

                <div style="text-align: center; margin-top: 20px; font-size: .85rem; letter-spacing: 1px; opacity: .6;">
                    Already registered? <a href="{{ route('auth.login') }}" style="color: var(--yorha-text); text-decoration: underline;">Login here</a>
                </div>

            </div>

        </div>

    </div>

    @include('partials.footer')

</body>

</html>