<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;

class BunkerController extends Controller
{
    protected array $facilities = [
        'command_room' => [
            'name' => 'Command Room',
            'status' => 'Operational',
            'integrity' => 100,
            'description' => 'Central hub for mission briefings and Council communications.',
        ],
        'medical_bay' => [
            'name' => 'Medical Bay',
            'status' => 'Operational',
            'integrity' => 92,
            'description' => 'Repair and maintenance station for damaged YoRHa units.',
        ],
        'simulation_room' => [
            'name' => 'Simulation Room',
            'status' => 'Operational',
            'integrity' => 88,
            'description' => 'Combat training simulations for skill calibration.',
        ],
        'server_room' => [
            'name' => 'Server Room',
            'status' => 'Degraded',
            'integrity' => 64,
            'description' => 'Houses the Bunker mainframe; intermittent data link issues detected.',
        ],
        'hangar' => [
            'name' => 'Hangar Bay',
            'status' => 'Operational',
            'integrity' => 97,
            'description' => 'Flight unit dock and dropship maintenance.',
        ],
        'storage' => [
            'name' => 'Storage Bay',
            'status' => 'Operational',
            'integrity' => 100,
            'description' => 'Weapon, item, and material storage for resistance operations.',
        ],
    ];

    protected array $crew = [
        ['name' => '2B', 'role' => 'Battle Unit', 'status' => 'On Standby', 'level' => 42],
        ['name' => '9S', 'role' => 'Scanner Unit', 'status' => 'Deployed', 'level' => 38],
        ['name' => 'A2', 'role' => 'Battle Unit', 'status' => 'Off-Grid', 'level' => 45],
        ['name' => 'Operator 6O', 'role' => 'Operator Unit', 'status' => 'On Duty', 'level' => 58],
        ['name' => 'Operator 21O', 'role' => 'Operator Unit', 'status' => 'On Duty', 'level' => 55],
        ['name' => 'Commander White', 'role' => 'Commander Unit', 'status' => 'On Duty', 'level' => 99],
    ];

    protected array $resources = [
        'energy' => ['label' => 'Energy Reserves', 'value' => 78],
        'data' => ['label' => 'Data Storage', 'value' => 64],
        'materials' => ['label' => 'Repair Materials', 'value' => 91],
        'morale' => ['label' => 'Crew Morale', 'value' => 70],
    ];

    protected array $quickLinks = [
        ['label' => 'Operations', 'description' => 'View deployment protocols and unit clearance levels.', 'route' => 'operations.index'],
        ['label' => 'Missions', 'description' => 'Check active mission log and accept new assignments.', 'route' => 'missions.index'],
        ['label' => 'Inventory', 'description' => 'Review items and plug-in chip loadout.', 'route' => 'inventory.index'],
        ['label' => 'Weapons', 'description' => 'Browse the armory and manage equipped weapons.', 'route' => 'weapons.index'],
        ['label' => 'Archives', 'description' => 'Access historical records and field reports.', 'route' => 'archives.index'],
        ['label' => 'System', 'description' => 'Run unit diagnostics and view system logs.', 'route' => 'system.index'],
    ];

    public function index()
    {
        return view('operations.bunker', [
            'facilities' => $this->facilities,
            'crew' => $this->crew,
            'resources' => $this->resources,
            'quickLinks' => $this->quickLinks,
        ]);
    }
}