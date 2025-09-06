<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة أولياء الأمور</h2>
    </x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('guardians.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ إضافة ولي أمر</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">الاسم</th>
                    <th class="p-2 border">الهاتف</th>
                    <th class="p-2 border">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guardians as $guardian)
                    <tr>
                        <td class="p-2 border">{{ $guardian->name }}</td>
                        <td class="p-2 border">{{ $guardian->phone }}</td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('guardians.edit', $guardian) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">تعديل</a>
                            <form action="{{ route('guardians.destroy', $guardian) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
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
