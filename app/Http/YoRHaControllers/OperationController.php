<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    protected array $operations = [
        'scanner' => [
            'name' => 'SCANNER MODEL',
            'level' => 'Lv. 1',
            'capabilities' => ['Recon Missions', 'Area Scanning', 'Basic Intel Access'],
            'description' => 'Lightweight reconnaissance unit optimized for area scanning and basic intel gathering.',
            'pod_support' => false,
            'priority_intel' => false,
            'black_box' => false,
        ],
        'resistance' => [
            'name' => 'RESISTANCE SUPPORT',
            'level' => 'Lv. 28',
            'capabilities' => ['Camp Assistance', 'Supply Access', 'Field Repairs'],
            'description' => 'Support unit assigned to assist resistance camps with supplies and field repairs.',
            'pod_support' => false,
            'priority_intel' => false,
            'black_box' => false,
        ],
        'battle' => [
            'name' => 'BATTLE UNIT',
            'level' => 'Lv. 42',
            'capabilities' => ['Combat Deployment', 'Pod Tactical Support', 'Priority Missions'],
            'description' => 'Frontline combat unit equipped with Pod tactical support for priority missions.',
            'pod_support' => true,
            'priority_intel' => true,
            'black_box' => false,
        ],
        'operator' => [
            'name' => 'OPERATOR UNIT',
            'level' => 'Lv. 58',
            'capabilities' => ['Bunker Communication', 'Mission Coordination', 'Intel Relay Access'],
            'description' => 'Coordinates Bunker communications and relays intel between command and field units.',
            'pod_support' => true,
            'priority_intel' => true,
            'black_box' => false,
        ],
        'execution' => [
            'name' => 'EXECUTION UNIT',
            'level' => 'Lv. 95',
            'capabilities' => ['Black Box Authority', 'Commander Clearance', 'High-Risk Operations'],
            'description' => 'Elite unit cleared for Black Box authority and high-risk operations.',
            'pod_support' => true,
            'priority_intel' => true,
            'black_box' => true,
        ],
        'commander' => [
            'name' => 'COMMANDER UNIT',
            'level' => 'Lv. 99',
            'capabilities' => ['Strategic Control', 'Global Deployment Access', 'YoRHa Override Authority'],
            'description' => 'Top-tier command unit with global deployment access and override authority.',
            'pod_support' => true,
            'priority_intel' => true,
            'black_box' => true,
        ],
    ];

    public function index()
    {
        return view('operations.operations', [
            'operations' => $this->operations,
        ]);
    }

    public function show(string $key)
    {
        $operation = $this->operations[$key] ?? null;

        if (!$operation) {
            abort(404, 'Operation protocol not found.');
        }

        return view('operations.show', [
            'key' => $key,
            'operation' => $operation,
        ]);
    }

    public function deploy(Request $request, string $key)
    {
        $operation = $this->operations[$key] ?? null;

        if (!$operation) {
            abort(404, 'Operation protocol not found.');
        }

        return redirect()
            ->route('operations.show', $key)
            ->with('status', "Deployment order for {$operation['name']} has been transmitted.");
    }

    public function login(Request $request)
    {
        $request->validate([
            'unit_id'    => 'required|string|max:50',
            'access_key' => 'required|string|min:6',
        ]);

        return redirect()
            ->route('operations.operations')
            ->with('status', 'Access terminal: credentials verified. Welcome back, Unit ' . $request->unit_id . '.');
    }
}