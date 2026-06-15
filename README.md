# YoRHa Operations Hub

> "Glory to mankind."

A small personal Laravel project, a fictional NieR: Automata-themed
dashboard for everyone's favorite android resistance group. Built mostly as
an excuse to mess around with routing, controllers, Blade layouts, and shared
partials, while pretending to be Pod 042 for an afternoon.

## Overview

The hub is a mock terminal interface for YoRHa units, with several themed
sections pulling from static in-memory data (no database, no Black Box
required). The **Bunker** page is home base: where you check in, see
who's still standing, and jump off to everything else.

## Pages

| Page | Route | Description |
|---|---|---|
| Bunker (Home) | `/` | Mission control. Facility status, crew roster, resource reserves, and quick links to every other section. |
| Operations | `/operations` | Deployment protocol cards (Scanner, Battle, Execution, etc.) with an access terminal login form. |
| Operation Details | `/operations/{key}` | Full breakdown of a single protocol, clearance status, and a big satisfying DEPLOY button. |
| Missions | `/missions` | The mission log. Available, In Progress, Completed, or Locked, pick your poison. |
| Mission Details | `/missions/{key}` | Mission briefing with an accept action. |
| Inventory | `/inventory` | Items and plug-in chips. Hoard responsibly. |
| Weapons | `/weapons` | The armory. Equip something with a dramatic name. |
| Archives | `/archives` | Records database, including one entry marked "Classified" that you're definitely not supposed to read. |
| Archive Details | `/archives/{key}` | Full record view with metadata. |
| System | `/system` | Unit diagnostics, resource bars, and a system log that's mostly fine, probably. |

## Tech Stack

- **Laravel** (Blade templating, routing, controllers)
- **Bootstrap** grid classes (`container-fluid`, `row`, `col-lg-*`) for layout
- **Bootstrap Icons** (via CDN)
- Custom CSS theme ("YoRHa" palette: tan/beige tones, sharp-edged panels,
  uppercase letter-spaced nav.)
- Vite for asset bundling (`resources/sass/app.scss`, `resources/js/app.js`)

## Project Structure

```
app/Http/YoRHaControllers/
├── OperationController.php
├── BunkerController.php
├── MissionController.php
├── InventoryController.php
├── WeaponController.php
├── ArchiveController.php
└── SystemController.php

resources/views/operations/
├── nav.blade.php            # shared navigation partial
├── styles.blade.php         # shared theme stylesheet
├── bunker.blade.php         # home page
├── operations.blade.php     # operations dashboard
├── show.blade.php           # operation detail
├── missions.blade.php       # mission list
├── missions-show.blade.php  # mission detail
├── inventory.blade.php      # inventory log
├── weapons.blade.php        # weapons available
├── archives.blade.php       # archives dashboard
└── archives-show.blade.php  # archives details

routes/web.php
```

All controllers live under the custom namespace `App\Http\YoRHaControllers`
and extend the default `App\Http\Controllers\Controller`.

## Shared Partials

Every page includes two shared Blade partials from `resources/views/operations/`:

- **`operations.styles`** — the entire YoRHa theme in one stylesheet: colors,
  panels, buttons, tables, progress bars, tags, responsive breakpoints. One
  include, every page stays consistent.
- **`operations.nav`** — the top nav bar. Active-tab highlighting is handled
  server-side via `request()->routeIs('xxx.*')`, so wherever you are, the nav
  always knows.

```php
@include('operations.styles')
...
@include('operations.nav')
```

## Routing

All hub routes live in `routes/web.php` under named route groups
(`operations.*`, `missions.*`, `inventory.*`, `weapons.*`, `archives.*`,
`system.*`, `bunker.index`). The home route (`/`) points to
`BunkerController::index`.

There's also a catch-all fallback route that returns a custom "Page Not
Found" image for anything that doesn't match, it's a bit off-theme, though... 

## Running Locally

```bash
composer install
npm install && npm run dev
php artisan serve
```

Then visit `http://localhost:8000` and report for duty.

## Notes

- Assets referenced via `asset(...)` (`pngegg.png`, `YORHA_clear.svg`,
  `Oops.png`) need to exist in `public/`, or the Bunker's going to look a
  little empty.
- This project is for personal practice/learning purposes! A fan-made,
  non-commercial tribute, not affiliated with Square Enix, PlatinumGames, or
  the NieR: Automata IP. For Glory. For Mankind. For fun.

## Future inclusions

- Databases
- Server deployment for online viewing
- More routes and pages! 