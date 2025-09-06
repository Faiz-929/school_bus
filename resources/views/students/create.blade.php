<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">➕ إضافة طالب جديد</h2>
    </x-slot>

    <div class="p-6 max-w-xl">
        <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- اسم الطالب --}}
            <div>
                <label class="block">اسم الطالب</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            {{-- ولي الأمر --}}
            <div>
                <label class="block">ولي الأمر</label>
                <select name="guardian_id" class="w-full border rounded p-2" required>
                    <option value="">-- اختر --</option>
                    @foreach($guardians as $guardian)
                        <option value="{{ $guardian->id }}">{{ $guardian->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- المدرسة --}}
            <div>
                <label class="block">المدرسة</label>
                <select name="school_id" class="w-full border rounded p-2" required>
                    <option value="">-- اختر --</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- الباص (اختياري) --}}
            <div>
                <label class="block">الباص</label>
                <select name="bus_id" class="w-full border rounded p-2">
                    <option value="">-- لا يوجد --</option>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->plate_number }}</option>
                    @endforeach
                </select>
            </div>

            {{-- زر الحفظ --}}
            <button type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded">💾 حفظ</button>
        </form>
    </div>
</x-app-layout>
