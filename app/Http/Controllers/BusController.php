<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::with('driver')->get();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('buses.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|string|max:50',
            'capacity'     => 'required|integer',
            'driver_id'    => 'nullable|exists:drivers,id',
        ]);

        Bus::create($request->all());
        return redirect()->route('buses.index')->with('success', 'تم إضافة الباص بنجاح');
    }

    public function edit(Bus $bus)
    {
        $drivers = Driver::all();
        return view('buses.edit', compact('bus', 'drivers'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'plate_number' => 'required|string|max:50',
            'capacity'     => 'required|integer',
            'driver_id'    => 'nullable|exists:drivers,id',
        ]);

        $bus->update($request->all());
        return redirect()->route('buses.index')->with('success', 'تم تعديل بيانات الباص بنجاح');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'تم حذف الباص بنجاح');
    }
}
