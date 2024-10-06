<?php

namespace App\Http\Controllers;

use App\Models\Experiment;
use Illuminate\Http\Request;

class ExperimentController extends Controller
{
    public function index()
    {
        return Experiment::all();
    }

    public function store(Request $request)
    {
        $experiment = Experiment::create($request->all());
        return response()->json($experiment, 201);
    }

    public function show($id)
    {
        return Experiment::findOrFail($id);
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
}
