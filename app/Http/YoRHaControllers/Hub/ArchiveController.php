<?php

namespace App\Http\YoRHaControllers\Hub;

use App\Http\YoRHaControllers\Controller;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    protected array $entries = [
        'a001' => [
            'title' => 'Project YoRHa - Origins',
            'category' => 'History',
            'date' => 'Unknown',
            'summary' => 'Records detailing the formation of the YoRHa unit division under direct Council of Humanity oversight.',
        ],
        'a002' => [
            'title' => 'The Bunker - Construction Log',
            'category' => 'Facility',
            'date' => 'Unknown',
            'summary' => 'Engineering logs covering the orbital construction of the YoRHa Bunker.',
        ],
        'a003' => [
            'title' => 'Machine Lifeform Evolution Report',
            'category' => 'Research',
            'date' => 'Recent',
            'summary' => 'Field analysis on increasingly complex behavior patterns observed in machine lifeforms.',
        ],
        'a004' => [
            'title' => 'Resistance Camp Census',
            'category' => 'Field Report',
            'date' => 'Recent',
            'summary' => 'Population and resource tracking across known resistance camps on Earth\'s surface.',
        ],
        'a005' => [
            'title' => 'Black Box Technology Overview',
            'category' => 'Classified',
            'date' => 'Restricted',
            'summary' => 'Restricted technical documentation. Access requires Execution Unit clearance or higher.',
        ],
    ];

    public function index()
    {
        return view('archives.archives', [
            'entries' => $this->entries,
        ]);
    }

    public function show(string $key)
    {
        $entry = $this->entries[$key] ?? null;

        if (!$entry) {
            abort(404, 'Archive entry not found.');
        }

        return view('archives.archives-show', [
            'key' => $key,
            'entry' => $entry,
        ]);
    }
}