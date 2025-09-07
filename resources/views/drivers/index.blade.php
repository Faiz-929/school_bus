<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إدارة السائقين</h2>
    </x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('drivers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">➕ إضافة سائق جديد</a>
        </div>

        <table class="w-full border text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">الاسم</th>
                    <th class="border p-2">الهاتف</th>
                    <th class="border p-2">رقم الرخصة</th>
                    <th class="border p-2">الإيميل</th>
                    <th class="border p-2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($drivers as $driver)
                    <tr>
                        <td class="border p-2">{{ $driver->id }}</td>
                        <td class="border p-2">{{ $driver->name }}</td>
                        {{-- <td class="border p-2">{{ $driver->phone }}</td> --}}
                        <td class="border p-2">{{ $driver->license_number ?? '-' }}</td>
                        <td class="border p-2">{{ $driver->email ?? '-' }}</td>
                        <td class="border p-2">
                            <a href="{{ route('drivers.edit', $driver) }}" class="text-blue-600">✏️ تعديل</a>
                            <form action="{{ route('drivers.destroy', $driver) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('هل أنت متأكد من الحذف؟')" class="text-red-600 ml-2">🗑️ حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3">لا يوجد سائقين حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
