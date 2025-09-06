<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl">📚 قائمة الطلاب</h2>
    </x-slot>

    <div class="p-6">
        {{-- زر إضافة طالب --}}
        <a href="{{ route('students.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded-lg">➕ إضافة طالب</a>

        {{-- جدول عرض الطلاب --}}
        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200 text-right">
                    <th class="p-2">#</th>
                    <th class="p-2">اسم الطالب</th>
                    <th class="p-2">ولي الأمر</th>
                    <th class="p-2">المدرسة</th>
                    <th class="p-2">الباص</th>
                    <th class="p-2">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="border-b">
                        <td class="p-2">{{ $student->id }}</td>
                        <td class="p-2">{{ $student->name }}</td>
                        <td class="p-2">{{ $student->guardian->name ?? '-' }}</td>
                        <td class="p-2">{{ $student->school->name ?? '-' }}</td>
                        <td class="p-2">{{ $student->bus->plate_number ?? '-' }}</td>
                        <td class="p-2 flex gap-2">
                            {{-- زر تعديل --}}
                            <a href="{{ route('students.edit', $student) }}" 
                            class="bg-yellow-400 text-black px-2 py-1 rounded">✏ تعديل</a>
                            {{-- زر حذف --}}
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">🗑 حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
