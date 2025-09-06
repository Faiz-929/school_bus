<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Guardian;
use App\Models\School;
use App\Models\Bus;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['guardian', 'school', 'bus'])->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $guardians = Guardian::all();
        $schools = School::all();
        $buses = Bus::all();
        return view('students.create', compact('guardians', 'schools', 'buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'guardian_id' => 'required|exists:guardians,id',
            'school_id'   => 'required|exists:schools,id',
            'bus_id'      => 'nullable|exists:buses,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'تم إضافة الطالب بنجاح');
    }

    public function edit(Student $student)
    {
        $guardians = Guardian::all();
        $schools = School::all();
        $buses = Bus::all();
        return view('students.edit', compact('student', 'guardians', 'schools', 'buses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'guardian_id' => 'required|exists:guardians,id',
            'school_id'   => 'required|exists:schools,id',
            'bus_id'      => 'nullable|exists:buses,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'تم تعديل بيانات الطالب بنجاح');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح');
    }
}
