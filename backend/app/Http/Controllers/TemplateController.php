<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return Template::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('templates', 'public');
        }
        $template = Template::create($data);

        return response()->json($template, 201);
    }

    public function show($id)
    {
        return Template::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('templates', 'public');
        }
        $template->update($data);
        return response()->json($template, 200);
    }

    public function destroy($id)
    {
        Template::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
