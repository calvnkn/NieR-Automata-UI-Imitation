<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    protected array $weapons = [
        'virtuous_contract' => [
            'name' => 'Virtuous Contract',
            'type' => 'Small Sword',
            'level' => 4,
            'attack' => 142,
            'equipped' => true,
            'description' => 'A small sword carried by 2B. Sleek design built for speed.',
        ],
        'cruel_oath' => [
            'name' => 'Cruel Oath',
            'type' => 'Large Sword',
            'level' => 4,
            'attack' => 210,
            'equipped' => false,
            'description' => 'A heavy blade favored for its raw destructive power.',
        ],
        'phoenix_dagger' => [
            'name' => 'Phoenix Dagger',
            'type' => 'Small Sword',
            'level' => 1,
            'attack' => 88,
            'equipped' => false,
            'description' => 'A lightweight dagger enabling rapid combo chains.',
        ],
        'iron_pipe' => [
            'name' => 'Iron Pipe',
            'type' => 'Large Sword',
            'level' => 1,
            'attack' => 96,
            'equipped' => false,
            'description' => 'A crude but effective makeshift weapon.',
        ],
        'beastbane' => [
            'name' => 'Beastbane',
            'type' => 'Spear',
            'level' => 3,
            'attack' => 134,
            'equipped' => false,
            'description' => 'A spear with extended reach, effective against larger units.',
        ],
        'eml_type_40' => [
            'name' => 'EML Type-40',
            'type' => 'Bracer',
            'level' => 2,
            'attack' => 102,
            'equipped' => true,
            'description' => 'Combat bracers used for rapid strikes and crowd control.',
        ],
    ];

    public function index()
    {
        return view('operations.weapons', [
            'weapons' => $this->weapons,
        ]);
    }

    public function equip(Request $request, string $key)
    {
        $weapon = $this->weapons[$key] ?? null;

        if (!$weapon) {
            abort(404, 'Weapon record not found.');
        }

        return redirect()
            ->route('weapons.index')
            ->with('status', "{$weapon['name']} has been equipped.");
    }
}