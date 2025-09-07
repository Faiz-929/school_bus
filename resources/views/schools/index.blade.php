<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة المدارس</h2>
    </x-slot>

    <div class="p-6">
        @include('partials.alerts')

        <a href="{{ route('schools.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ إضافة مدرسة</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">الاسم</th>
                    <th class="p-2 border">العنوان</th>
                    <th class="p-2 border">الهاتف</th>
                    <th class="p-2 border">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td class="p-2 border">{{ $school->id }}</td>
                        <td class="p-2 border">{{ $school->name }}</td>
                        <td class="p-2 border">{{ $school->address }}</td>
                        <td class="p-2 border">{{ $school->phone ?? '-' }}</td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('schools.edit', $school) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">تعديل</a>
                            <form action="{{ route('schools.destroy', $school) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
                                @csrf @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
