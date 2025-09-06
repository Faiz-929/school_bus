<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">✏ تعديل بيانات الطالب</h2>
    </x-slot>

    <div class="p-6 max-w-xl">
        <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            {{-- اسم الطالب --}}
            <div>
                <label class="block">اسم الطالب</label>
                <input type="text" name="name" value="{{ $student->name }}" 
                       class="w-full border rounded p-2" required>
            </div>

            {{-- ولي الأمر --}}
            <div>
                <label class="block">ولي الأمر</label>
                <select name="guardian_id" class="w-full border rounded p-2" required>
                    @foreach($guardians as $guardian)
                        <option value="{{ $guardian->id }}" 
                                {{ $student->guardian_id == $guardian->id ? 'selected' : '' }}>
                            {{ $guardian->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- المدرسة --}}
            <div>
                <label class="block">المدرسة</label>
                <select name="school_id" class="w-full border rounded p-2" required>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" 
                                {{ $student->school_id == $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- الباص --}}
            <div>
                <label class="block">الباص</label>
                <select name="bus_id" class="w-full border rounded p-2">
                    <option value="">-- لا يوجد --</option>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}" 
                                {{ $student->bus_id == $bus->id ? 'selected' : '' }}>
                            {{ $bus->plate_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- زر الحفظ --}}
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded">💾 تحديث</button>
        </form>
    </div>
</x-app-layout>
