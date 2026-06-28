<nav class="yorha-nav">
    <div class="brand">
        <img src="{{ asset('pngegg.png') }}" alt="YoRHa Logo">
    </div>

    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="nav-links" id="nav-links">
        <a href="{{ route('bunker.index') }}" class="{{ request()->routeIs('bunker.*') ? 'active' : '' }}"> BUNKER </a>
        <a href="{{ route('missions.index') }}" class="{{ request()->routeIs('missions.*') ? 'active' : '' }}"> MISSIONS </a>
        <a href="{{ route('inventory.index') }}" class="{{ request()->routeIs('inventory.*') ? 'active' : '' }}"> INVENTORY </a>
        <a href="{{ route('weapons.index') }}" class="{{ request()->routeIs('weapons.*') ? 'active' : '' }}"> WEAPONS </a>
        <a href="{{ route('operations.index') }}" class="{{ request()->routeIs('operations.*') ? 'active' : '' }}"> OPERATIONS </a>
        <a href="{{ route('archives.index') }}" class="{{ request()->routeIs('archives.*') ? 'active' : '' }}"> ARCHIVES </a>
        <a href="{{ route('system.index') }}" class="{{ request()->routeIs('system.*') ? 'active' : '' }}"> SYSTEM </a>
    </div>
</nav>

<div class="pattern">
    <div class="pattern-inner"></div>
</div>

<script>
    const toggle = document.getElementById('nav-toggle');
    const links  = document.getElementById('nav-links');

    toggle.addEventListener('click', () => {
        links.classList.toggle('nav-open');
        toggle.classList.toggle('nav-toggle-open');
    });
</script>