<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة خطوط السير</h2>
    </x-slot>

    <div class="p-6">
        @include('partials.alerts')

        <a href="{{ route('bus_routes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ إضافة خط سير</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">الاسم</th>
                    <th class="p-2 border">نقطة البداية</th>
                    <th class="p-2 border">نقطة النهاية</th>
                    <th class="p-2 border">محطات (مخزنة كسلسلة)</th>
                    <th class="p-2 border">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($routes as $r)
                    <tr>
                        <td class="p-2 border">{{ $r->id }}</td>
                        <td class="p-2 border">{{ $r->name }}</td>
                        <td class="p-2 border">{{ $r->start_point }}</td>
                        <td class="p-2 border">{{ $r->end_point }}</td>
                        <td class="p-2 border">{{ $r->stops ?? '-' }}</td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('bus_routes.edit', $r) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">تعديل</a>
                            <form action="{{ route('bus_routes.destroy', $r) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
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
