<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardians.index', compact('guardians'));
    }

    public function create()
    {
        return view('guardians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Guardian::create($request->all());
        return redirect()->route('guardians.index')->with('success', 'تم إضافة ولي الأمر بنجاح');
    }

    public function edit(Guardian $guardian)
    {
        return view('guardians.edit', compact('guardian'));
    }

    public function update(Request $request, Guardian $guardian)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $guardian->update($request->all());
        return redirect()->route('guardians.index')->with('success', 'تم تعديل بيانات ولي الأمر بنجاح');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('guardians.index')->with('success', 'تم حذف ولي الأمر بنجاح');
    }
}
