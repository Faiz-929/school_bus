<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة الباصات</h2>
    </x-slot>

    <div class="p-6">
        @include('partials.alerts')

        <a href="{{ route('buses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ إضافة باص</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">لوحة</th>
                    <th class="p-2 border">السعة</th>
                    <th class="p-2 border">السائق</th>
                    <th class="p-2 border">خط السير</th>
                    <th class="p-2 border">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buses as $bus)
                    <tr>
                        <td class="p-2 border">{{ $bus->id }}</td>
                        <td class="p-2 border">{{ $bus->plate_number }}</td>
                        <td class="p-2 border">{{ $bus->capacity }}</td>
                        <td class="p-2 border">{{ $bus->driver->name ?? '-' }}</td>
                        <td class="p-2 border">{{ $bus->busRoute->name ?? '-' }}</td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('buses.edit', $bus) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">تعديل</a>
                            <form action="{{ route('buses.destroy', $bus) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
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
