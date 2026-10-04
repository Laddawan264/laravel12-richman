<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function index()
    {
        $weights = Weight::orderBy('recorded_at', 'asc')->get();
        return view('weights.index', compact('weights'));
    }

    public function chart()
    {
        $weights = Weight::orderBy('recorded_at', 'asc')->get();
        return view('weights.chart', compact('weights'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric|min:0',
            'recorded_at' => 'required|date',
        ]);

        Weight::create($request->all());

        return redirect()->back();
    }

    public function destroy(int $id)
    {
        Weight::findOrFail($id)->delete();
        return redirect()->back();
    }
}
