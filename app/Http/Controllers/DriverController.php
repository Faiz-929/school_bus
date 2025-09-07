<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'license_number' => 'nullable|string|max:50',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.index')->with('success', 'تم إضافة السائق بنجاح');
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'license_number' => 'nullable|string|max:50',
        ]);

        $driver->update($request->all());
        return redirect()->route('drivers.index')->with('success', 'تم تعديل بيانات السائق بنجاح');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'تم حذف السائق بنجاح');
    }
}
