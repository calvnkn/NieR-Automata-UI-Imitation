<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    protected array $diagnostics = [
        'os_version' => ['label' => 'OS Version', 'value' => 'YoRHa-OS v4.12.3', 'status' => 'good'],
        'firmware' => ['label' => 'Firmware', 'value' => 'Up to date', 'status' => 'good'],
        'black_box' => ['label' => 'Black Box', 'value' => 'Nominal', 'status' => 'good'],
        'network_link' => ['label' => 'Bunker Network Link', 'value' => 'Unstable', 'status' => 'warn'],
        'pod_link' => ['label' => 'Pod Support Link', 'value' => 'Connected', 'status' => 'good'],
        'self_destruct' => ['label' => 'Self-Destruct Module', 'value' => 'Armed', 'status' => 'bad'],
    ];

    protected array $resources = [
        'cpu' => ['label' => 'Processing Load', 'value' => 42],
        'memory' => ['label' => 'Memory Usage', 'value' => 67],
        'storage' => ['label' => 'Black Box Storage', 'value' => 81],
        'battery' => ['label' => 'Power Cell', 'value' => 94],
    ];

    protected array $logs = [
        ['time' => '03:42:11', 'message' => 'Pod 042 telemetry link established.'],
        ['time' => '03:40:55', 'message' => 'Combat simulation completed: Rank A.'],
        ['time' => '02:58:09', 'message' => 'Bunker network link degraded - retrying.'],
        ['time' => '02:10:33', 'message' => 'Auto-repair routine executed successfully.'],
        ['time' => '01:05:02', 'message' => 'Unit synchronization with Operator complete.'],
    ];

    public function index()
    {
        return view('operations.system', [
            'diagnostics' => $this->diagnostics,
            'resources' => $this->resources,
            'logs' => $this->logs,
        ]);
    }

    public function restart(Request $request)
    {
        return redirect()
            ->route('system.index')
            ->with('status', 'Unit restart sequence initiated. All systems nominal.');
    }
}