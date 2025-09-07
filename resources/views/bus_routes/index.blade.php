<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة الباصات</h2>
    </x-slot>
    <h1 class="text-xl font-bold mb-4">🗺️ قائمة خطوط السير</h1>

    @include('partials.alerts')

    <a href="{{ route('bus_routes.create') }}" 
    class="bg-blue-500 text-white px-4 py-2 rounded">➕ إضافة خط سير</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">اسم الخط</th>
                <th class="border px-4 py-2">الباص</th>
                <th class="border px-4 py-2">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($routes as $route)
                <tr>
                    <td class="border px-4 py-2">{{ $route->id }}</td>
                    <td class="border px-4 py-2">{{ $route->name }}</td>
                    <td class="border px-4 py-2">{{ $route->bus->plate_number ?? 'بدون' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('bus_routes.edit', $route) }}" class="text-blue-500">✏️ تعديل</a> |
                        <form action="{{ route('bus_routes.destroy', $route) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" 
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">🗑️ حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center">لا توجد خطوط سير</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>
