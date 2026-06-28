<?php

namespace App\Http\YoRHaControllers\Hub;

use App\Http\YoRHaControllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    protected array $missions = [
        'm001' => [
            'name' => 'Investigate Forest Kingdom Disturbance',
            'type' => 'Main',
            'location' => 'Forest Kingdom',
            'difficulty' => 'Moderate',
            'status' => 'Available',
            'reward' => '1,200 G + Repair Kit',
            'description' => 'Strange machine activity has been reported near the Forest Castle. Investigate the source.',
        ],
        'm002' => [
            'name' => 'Clear Machine Lifeforms - Desert Zone',
            'type' => 'Side',
            'location' => 'Desert Zone',
            'difficulty' => 'Easy',
            'status' => 'Available',
            'reward' => '600 G',
            'description' => 'A small cluster of machine lifeforms is harassing resistance supply lines in the desert.',
        ],
        'm003' => [
            'name' => 'Escort Resistance Convoy',
            'type' => 'Side',
            'location' => 'Resistance Camp',
            'difficulty' => 'Easy',
            'status' => 'Completed',
            'reward' => '450 G + Repair Materials',
            'description' => 'Escort a supply convoy safely from the Resistance Camp to the City Ruins.',
        ],
        'm004' => [
            'name' => 'Eliminate Goliath-Class Unit',
            'type' => 'Main',
            'location' => 'Factory',
            'difficulty' => 'Hard',
            'status' => 'In Progress',
            'reward' => '3,000 G + Plug-in Chip',
            'description' => 'A Goliath-class machine lifeform has been spotted near the Factory. Engage with caution.',
        ],
        'm005' => [
            'name' => 'Recover Black Box Data',
            'type' => 'Main',
            'location' => 'Copied City',
            'difficulty' => 'Very Hard',
            'status' => 'Locked',
            'reward' => '5,000 G + Classified Data',
            'description' => 'Retrieve Black Box data from a destroyed YoRHa unit in the Copied City. Requires Execution Unit clearance.',
        ],
        'm006' => [
            'name' => 'Amusement Park Anomaly',
            'type' => 'Side',
            'location' => 'Amusement Park',
            'difficulty' => 'Moderate',
            'status' => 'Available',
            'reward' => '1,000 G',
            'description' => 'Recreational machine lifeforms are behaving unusually. Determine the cause.',
        ],
    ];

    public function index()
    {
        return view('missions.missions', [
            'missions' => $this->missions,
        ]);
    }

    public function show(string $key)
    {
        $mission = $this->missions[$key] ?? null;

        if (!$mission) {
            abort(404, 'Mission record not found.');
        }

        return view('missions.missions-show', [
            'key' => $key,
            'mission' => $mission,
        ]);
    }

    public function accept(Request $request, string $key)
    {
        $mission = $this->missions[$key] ?? null;

        if (!$mission) {
            abort(404, 'Mission record not found.');
        }

        if ($mission['status'] === 'Locked') {
            return redirect()
                ->route('missions.show', $key)
                ->with('error', 'This mission is locked. Required clearance not met.');
        }

        return redirect()
            ->route('missions.show', $key)
            ->with('status', "Mission \"{$mission['name']}\" has been accepted and added to your log.");
    }
}