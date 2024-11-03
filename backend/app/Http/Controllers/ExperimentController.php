<?php

namespace App\Http\Controllers;

use App\Models\Experiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperimentController extends Controller
{
    public function index()
    {
        return Experiment::with('template')->get();
    }

    public function store(Request $request)
    {
        $experiment = Experiment::create($request->all());
        return response()->json($experiment, 201);
    }

    public function show($id)
    {
        return Experiment::with('template')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $experiment = Experiment::findOrFail($id);
        $experiment->update($request->all());
        return response()->json($experiment, 200);
    }

    public function destroy($id)
    {
        Experiment::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    //TODO COVER WITH TESTS
    public function build(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required'
        ]);
        $code = $validated['code'];

        // Specify the path to the file
        $scriptPath = base_path('build.sh');
        Storage::put('sketch/sketch.ino', $code);
        //TODO MOVE IT TO DOCKEFILE
        exec("/usr/local/bin/arduino-cli core install arduino:avr");
        exec("bash $scriptPath 2>&1", $output, $returnCode);

        // Save the content to the file
        return response()->json([
            'output' => $output,
            'code' => $returnCode,
            'hex' => $returnCode == 0 ? Storage::get('sketch/build/sketch.ino.hex') : null
        ]);
    }
}
