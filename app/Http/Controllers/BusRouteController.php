<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    public function index()
    {
        $routes = BusRoute::with('bus')->get();
        return view('bus_routes.index', compact('routes'));
    }

    public function create()
    {
        $buses = Bus::all();
        return view('bus_routes.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'details' => 'nullable|string',
            'bus_id'  => 'nullable|exists:buses,id',
        ]);

        BusRoute::create($request->all());
        return redirect()->route('bus_routes.index')->with('success', 'تم إضافة خط السير بنجاح');
    }

    public function edit(BusRoute $busRoute)
    {
        $buses = Bus::all();
        return view('bus_routes.edit', compact('busRoute', 'buses'));
    }

    public function update(Request $request, BusRoute $busRoute)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'details' => 'nullable|string',
            'bus_id'  => 'nullable|exists:buses,id',
        ]);

        $busRoute->update($request->all());
        return redirect()->route('bus_routes.index')->with('success', 'تم تعديل خط السير بنجاح');
    }

    public function destroy(BusRoute $busRoute)
    {
        $busRoute->delete();
        return redirect()->route('bus_routes.index')->with('success', 'تم حذف خط السير بنجاح');
    }
}
