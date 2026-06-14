<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    protected array $items = [
        ['name' => 'Repair Kit (Small)', 'quantity' => 5, 'description' => 'Restores a small amount of unit HP.'],
        ['name' => 'Repair Kit (Large)', 'quantity' => 2, 'description' => 'Restores a large amount of unit HP.'],
        ['name' => 'Recovery Item S', 'quantity' => 8, 'description' => 'Restores HP gradually over time.'],
        ['name' => 'Machine Oil', 'quantity' => 12, 'description' => 'Common crafting material recovered from machine lifeforms.'],
        ['name' => 'Broken Cable', 'quantity' => 7, 'description' => 'Salvaged wiring used in equipment upgrades.'],
        ['name' => 'Black Box Fragment', 'quantity' => 1, 'description' => 'Classified component. Origin unknown.'],
    ];

    protected array $plugins = [
        ['name' => 'OS Chip', 'slots' => 2, 'equipped' => true, 'description' => 'Required for unit operation. Cannot be removed.'],
        ['name' => 'Auto-Use Items [S]', 'slots' => 2, 'equipped' => true, 'description' => 'Automatically consumes recovery items when HP is low.'],
        ['name' => 'Attack Up', 'slots' => 3, 'equipped' => true, 'description' => 'Increases melee attack power.'],
        ['name' => 'Critical Up', 'slots' => 3, 'equipped' => false, 'description' => 'Increases critical hit rate.'],
        ['name' => 'Downloadable Data', 'slots' => 4, 'equipped' => false, 'description' => 'Reveals nearby map data automatically.'],
    ];

    public function index()
    {
        return view('operations.inventory', [
            'items' => $this->items,
            'plugins' => $this->plugins,
        ]);
    }
}