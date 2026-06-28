# YoRHa - The Bunker

> "Glory to mankind."

A small personal Laravel project, a fictional **NieR: Automata**-themed
command terminal for everyone's favorite android resistance group. Built mostly
as an excuse to mess around with routing, controllers, authentication, Blade
layouts, and modular project structure, while pretending to be Pod 042 for an
afternoon.

## Overview

**The Bunker** is a mock terminal interface for YoRHa units, featuring several
themed sections inspired by *NieR: Automata*. Operators begin at a landing page
where they can register or log in before gaining access to the Bunker—the
application's central hub. From there, every module branches outward:
Operations, Missions, Inventory, Weapons, Archives, and System.

Most of the application's content is currently powered by static in-memory
data, allowing the focus to remain on the interface, routing, and overall
architecture without the complexity of managing every module through a
database.

## Pages

| Page | Route | Description |
|---|---|---|
| Landing | `/` | Welcome screen introducing the project with access to Login and Register. |
| Login | `/login` | Authenticate as a YoRHa operator. |
| Register | `/register` | Create a new operator account. |
| Bunker | `/bunker` | Mission control. Facility status, crew roster, resource reserves, and quick links to every other section. |
| Operations | `/operations` | Deployment protocol cards (Scanner, Battle, Execution, etc.) with an access terminal. |
| Operation Details | `/operations/{key}` | Full breakdown of a single protocol, clearance status, and a big satisfying **DEPLOY** button. |
| Missions | `/missions` | The mission log. Available, In Progress, Completed, or Locked—pick your poison. |
| Mission Details | `/missions/{key}` | Mission briefing with an accept action. |
| Inventory | `/inventory` | Items and Plug-in Chips. Hoard responsibly. |
| Weapons | `/weapons` | The armory. Equip something with a dramatic name. |
| Archives | `/archives` | Records database, including one entry marked **Classified** that you're definitely not supposed to read. |
| Archive Details | `/archives/{key}` | Full record view with metadata. |
| System | `/system` | Unit diagnostics, resource bars, and a system log that's mostly fine... probably. |

## Tech Stack

- **Laravel** (routing, controllers, authentication, Blade templating)
- **Bootstrap** grid classes (`container-fluid`, `row`, `col-lg-*`) for layout
- **Bootstrap Icons** (via CDN)
- Custom CSS theme ("YoRHa" palette: tan/beige tones, sharp-edged panels,
  uppercase letter-spaced navigation)
- **Vite** for asset bundling (`resources/sass/app.scss`,
  `resources/js/app.js`)

## Project Structure

```text
app/
└── Http/
    └── YoRHaControllers/
        ├── Controller.php
        ├── Auth/
        │   └── AuthController.php
        └── Hub/
            ├── ArchiveController.php
            ├── BunkerController.php
            ├── InventoryController.php
            ├── MissionController.php
            ├── OperationController.php
            ├── SystemController.php
            └── WeaponController.php

resources/
└── views/
    ├── archives/
    ├── auth/
    ├── bunker/
    ├── inventory/
    ├── missions/
    ├── operations/
    ├── partials/
    ├── system/
    └── weapons/

routes/
└── web.php
```

Controllers are organized by responsibility:

- **`App\Http\YoRHaControllers\Auth`** — user authentication and session
  management.
- **`App\Http\YoRHaControllers\Hub`** — every module accessible after
  authentication.

All controllers extend the shared custom base controller:

```php
App\Http\YoRHaControllers\Controller
```

## Shared Partials

Common Blade components now live under
`resources/views/partials/`, keeping layouts consistent throughout the
application.

- **`partials.styles`** — the complete YoRHa theme in one stylesheet:
  colors, panels, buttons, tables, progress bars, tags, and responsive
  breakpoints.
- **`partials.nav`** — the primary navigation bar for authenticated pages.
- **`partials.nav-auth`** — simplified navigation used by the Landing,
  Login, and Register pages.
- **`partials.footer`** — shared footer displayed throughout the
  application.

```blade
@include('partials.styles')
...
@include('partials.nav')
```

## Routing

Application routes are defined in `routes/web.php`.

Authentication routes include:

- `/`
- `/login`
- `/register`
- `/logout`

Authenticated modules include:

- `/bunker`
- `/operations`
- `/missions`
- `/inventory`
- `/weapons`
- `/archives`
- `/system`

Named route groups (`operations.*`, `missions.*`, `inventory.*`,
`weapons.*`, `archives.*`, `system.*`, `bunker.*`, and `auth.*`) keep
navigation consistent across the application.

There's also a catch-all fallback route that returns a custom "Page Not
Found" image for anything that doesn't match. It's a little off-theme,
though...

## Running Locally

```bash
composer install
npm install
npm run dev
php artisan serve
```

Then visit `http://localhost:8000` and report for duty.

## Notes

- Assets referenced via `asset(...)` (`pngegg.png`,
  `YORHA_clear.svg`, `Oops.png`) should exist inside `public/`, or
  the Bunker's going to look a little empty.
- Most application modules currently use static in-memory data to keep the
  focus on Laravel architecture and user interface design.
- This project is for personal practice, experimentation, and portfolio
  purposes. A fan-made, non-commercial tribute, not affiliated with Square
  Enix, PlatinumGames, or the *NieR: Automata* IP.

## Future Inclusions

- Database-backed operational modules
- CRUD functionality for missions, archives, inventory, and weapons
- User profiles and operator customization
- Expanded YoRHa terminal pages
- Additional system modules
- Production deployment
